<?php

class BlastCustomer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BlastModel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
        // if ($this->session->level != 'super admin') {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $this->load->view('blast/blast_customer');
    }
    
    public function addBlast() {
        $data['jenis'] = $this->BlastModel->getJenisPaket();
        $this->load->view('blast/add', $data);
    }

    function insert() {
        $insert = $this->BlastModel->insertGlobalHold();

        redirect('BlastCustomer');
    }

    function verified($id_blast) {
        $post = $this->BlastModel->getDetailBlast($id_blast);
        $detail_trans = $this->BlastModel->getAllCust($post->start_hold_date, $post->end_hold_date, $post->jenis_paket);
        
                // var_dump($detail_trans);die;
        for ($i=0; $i < count($detail_trans) ; $i++) { 
            
            if ($post->start_hold_date != "1970-01-01" && $post->end_hold_date != "1970-01-01") {
                
                $getDetailTrans = $this->BlastModel->getTransaksiDetail($detail_trans[$i]['id_transaksi_detail'], $post->start_hold_date, $post->end_hold_date);

                $last_date_send = $this->BlastModel->lastDateDelivery($detail_trans[$i]['id_transaksi_detail']);
                
                $start_date = date('Y-m-d', strtotime($last_date_send. '+ 1 days'));
                $jadwal_kirim = $this->BlastModel->getJadwalKirim($detail_trans[$i]['id_transaksi_detail']);
            
                $startDate = $start_date;
                $endDate = date('Y-m-d', strtotime($startDate. '+ 3 days'));
                $libur = $this->db->select('date_holiday')->get_where('ms_holiday', ['date_holiday >=' => date('Y-m-d', strtotime($endDate))])->result_array();
                $jadwal = explode(", ", $jadwal_kirim->jadwal_pengiriman);
                $matchingDates = [];
                $jml = count($getDetailTrans->result());
                do {
                    if (in_array(date('l', strtotime($startDate)),$jadwal)) {
                        $getlibur = $this->db->select('date_holiday')->where('date_holiday', $startDate)->get('ms_holiday')->num_rows();
                        if ($getlibur == 0) {
                            $matchingDates[] = date('Y-m-d', strtotime($startDate));
    
                            // insert new date
                            $data_pengiriman = $getDetailTrans->result_array();
                            for ($x=0; $x < count($getDetailTrans->result()) ; $x++) {
                                $data_insert = array(
                                    'id_transaksi' => $data_pengiriman[$x]['id_transaksi'],
                                    'id_customer' => $data_pengiriman[$x]['id_customer'],
                                    'tgl_pengiriman' => $startDate,
                                    'id_transaksi_detail' => $data_pengiriman[$x]['id_transaksi_detail'],
                                    'detail_paket' => $data_pengiriman[$x]['detail_paket'],
                                    'jml_pack_dikirim' => $data_pengiriman[$x]['jml_pack_dikirim'],
                                    'jml_lunch' => $data_pengiriman[$x]['jml_lunch'],
                                    'jml_dinner' => $data_pengiriman[$x]['jml_dinner'],
                                    'jenis_paket' => $data_pengiriman[$x]['jenis_paket'],
                                );
                                $this->db->insert('tbl_transaksi_pengiriman', $data_insert);
                                $delete = $this->BlastModel->updatePengiriman($data_pengiriman[$x]['id_transaksi'], $data_pengiriman[$x]['id_transaksi_detail'], $data_pengiriman[$x]['tgl_pengiriman']);
                            }
                        }
                    } 
                    // else {
                        if (count($matchingDates) !=  $jml) {
                            $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                        } 
                        else{
                            break;
                        }
                    // }
                    $startDate = date('Y-m-d', strtotime('+1 day'.$startDate));
                } while ($startDate <= $endDate);
            }
            // var_dump($getDetailTrans->result());die;

            $detail_blast_insert = array(
                'id_blast' => $id_blast,
                'id_customer' => $detail_trans[$i]['id_customer'],
            );
            $this->db->insert('tbl_detail_blast', $detail_blast_insert);
            
        }
        $this->BlastModel->updateGlobalHold($id_blast);

        redirect('BlastCustomer');
    }

    function getListBlast() {
        $list = $this->BlastModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        foreach ($list as $key) {
            $no++;
            $row = array();

            $row[] = $key['id_blast'];
            $row[] = date('d F Y', strtotime($key['tanggal_blast']));
            $row[] = $key['jenis_paket'];
            if ($key['start_hold_date'] != null) {
                $row[] = date('d F Y', strtotime($key['start_hold_date']));
                $row[] = date('d F Y', strtotime($key['end_hold_date']));
            } else {
                $row[] = "-";
                $row[] = "-";
            }
            $row[] = $key['jenis_blast'];
            $row[] = $key['status_blast'];
            if ($key['status_blast'] == "Not Confirm") {
                $row[] = '<a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                            class="fas fa-eye"></i></a>
                        <a href="'.site_url('BlastCustomer/edit/'.$key['id_blast']).'" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                            class="fas fa-pencil-alt"></i></a>
                        <a href="'.site_url('BlastCustomer/verified/'.$key['id_blast']).'" class="btn btn-primary" data-toggle="tooltip" title="Verified"><i
                        class="fas fa-check"></i></a>';
            } else {
                $row[] = '<a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                            class="fas fa-eye"></i></a>
                        <a href="'.site_url('BlastCustomer/exportExcel/'.$key['id_blast']).'" id="'.$key['id_blast'].'" class="btn btn-success" data-toggle="tooltip" title="Blast"><i
                            class="fas fa-paper-plane"></i></a>';
            }

            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->BlastModel->count_all(),
            "recordsFiltered" => $this->BlastModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    public function exportExcel($id_blast)
    {
        // create file name
        // $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('Excel');
        $detail_blast = $this->BlastModel->getDetailBlast($id_blast);
        $listInfo = $this->BlastModel->exportList($id_blast);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        // if ($detail_blast->jenis_blast == "Hold Event"){
        //     if($detail_blast->start_hold_date == $detail_blast->end_hold_date) {
        //         $isi_pesan = $detail_blast->whatsapp_message." Pada Tanggal ". date('d F Y', strtotime($detail_blast->start_hold_date));
        //     } else {
        //         $isi_pesan = $detail_blast->whatsapp_message." Pada Tanggal ". date('d F Y', strtotime($detail_blast->start_hold_date))." - ".date('d F Y', strtotime($detail_blast->end_hold_date));
        //     }
        // } else {
        //     $isi_pesan = $detail_blast->whatsapp_message;
        // }
        
        // var_dump($isi_pesan);die;
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Customer Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nomor WhatsApp');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Isi Pesan');
        // $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
        // $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
        // $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');       
        // set Row
        $rowCount = 2;
        
        foreach ($listInfo as $list) {
            $nomor_whatsapp = substr($list->telepon_1, 1);
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->nama_customer);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "62".$nomor_whatsapp);
            if ($detail_blast->jenis_blast == "Hold Event"){
                if($detail_blast->start_hold_date == $detail_blast->end_hold_date) {
                    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $detail_blast->whatsapp_message." Pada Tanggal ". date('d F Y', strtotime($detail_blast->start_hold_date)));
                } else {
                    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $detail_blast->whatsapp_message." Pada Tanggal ". date('d F Y', strtotime($detail_blast->start_hold_date))." - ".date('d F Y', strtotime($detail_blast->end_hold_date)));
                }
            } else {
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $detail_blast->whatsapp_message);
            }
            
            // $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $isi_pesan);
            // $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dob);
            // $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->contact_no);
            $rowCount++;
        }
        
        $filename = "Blast-". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        // var_dump($objWriter);die;
        $objWriter->save('php://output'); 
        // redirect('BlastCustomer');
    }

    function edit($id_blast) {
        $data['detail'] = $this->BlastModel->getDetailBlast($id_blast);
        $data['jenis'] = $this->BlastModel->getJenisPaket();
        // var_dump($data['blast']);die;
        $this->load->view('blast/edit', $data);
    }

    function update($id_blast) {
        $post = $this->input->post();

        if ($post['start_date_periode'] == "" && $post['end_date_periode'] == "" && $post['jenis_blast'] == "Hold Event") {
            $this->session->set_flashdata('empty', 'Periksa Kembali Tanggal Start Hold dan End Hold !');
            redirect('BlastCustomer/edit/'.$id_blast);
        } else {
            // $start_hold = null;
            // $end_hold = null;
            // var_dump($post);die;
            $this->BlastModel->updateDataBlast($id_blast);
            redirect('BlastCustomer/');
        }
    }
}
