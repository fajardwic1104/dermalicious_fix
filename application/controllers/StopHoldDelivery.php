<?php

final class StopHoldDelivery extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('StopHoldDeliveryModel');
    }

    public function addStop($id_trans, $id_detail) {
        $data['transaksi'] = $this->StopHoldDeliveryModel->getDataTrans($id_trans, $id_detail);
        $data['last_hold'] = date('Y-m-d', strtotime($this->StopHoldDeliveryModel->getLastHold($id_trans, $id_detail).'+1 days'));
        // var_dump($last_hold);die;
        
        $this->load->view('stop_delivery/add', $data);
    }
    
    public function insertHoldDeliv() {
        $post = $this->input->post();
        $add_hold = $this->StopHoldDeliveryModel->insertHold();
        $detail_transaksi = $this->StopHoldDeliveryModel->getDetailTransaksi($post['id_trans'], $post['id_trans_detail']);
        // if ($add_hold) {
            // $date_hold = 
            foreach ($detail_transaksi as $key) {
                $libur = $this->db->select('date_holiday')->get_where('ms_holiday', ['date_holiday >=' => date('Y-m-d', strtotime($post['end_hold']))])->result_array();
                $data_kirim = $this->db->order_by('tgl_pengiriman', 'desc')->get_where('tbl_transaksi_pengiriman', ['id_transaksi' => $post['id_trans'], 'id_transaksi_detail' => $post['id_trans_detail'], 'tgl_pengiriman >=' => date('Y-m-d', strtotime($post['start_hold'])), 'id_transaksi_detail' => $key['id_transaksi_detail']]);
                $date_hold = $this->db->get_where('tbl_transaksi_pengiriman', ['id_transaksi' => $post['id_trans'], 'tgl_pengiriman >=' => date('Y-m-d', strtotime($post['start_hold'])), 'tgl_pengiriman <=' => date('Y-m-d', strtotime($post['end_hold'])), 'id_transaksi_detail' => $key['id_transaksi_detail']])->result_array();
                
                $array_date = array();
                
                $interval = new DateInterval('P1D');
                
                $contiue_date = date('Y-m-d', strtotime($data_kirim->row()->tgl_pengiriman. '+ 1 days'));
                $hitungan_hari= count($date_hold) - 1;
                $realEnd = new DateTime(date('Y-m-d', strtotime($contiue_date. '+ '.$hitungan_hari.' days')));
                $realEnd->add($interval);

                $period_continue = new DatePeriod(new DateTime($contiue_date), $interval, $realEnd);
                $jadwal_kirim = explode(", ", $key['jadwal_pengiriman']);
            
                // $array_hold = array();
                foreach($date_hold as $date) {
                    // $array_date[] = $date->format('Y-m-d');
                    $array_date[] = $date['tgl_pengiriman'];
                }
                
                $startDate = date($contiue_date);
                $endDate = date('Y-m-d', strtotime('+3 day'. $startDate));
                // $array_contiue = array();
                // // foreach ($period_continue as $data) {
                //     // $array_contiue[] = $data->format('Y-m-d');
                //     $array_contiue[] = $contiue_date;
                // } 
                // var_dump($jadwal_kirim);die;

                $array_holiday = array();
                foreach ($libur as $key) {
                    $array_holiday[] = $key['date_holiday'];
                }
                
                $matchingDates = [];
                $i = 0;
                do {
                    if (in_array(date('l', strtotime($startDate)),$jadwal_kirim)) {
                        $getlibur = $this->db->select('date_holiday')->where('date_holiday', $startDate)->get('ms_holiday')->num_rows();
                        if ($getlibur == 0) {
                            $matchingDates[] = date('Y-m-d', strtotime($startDate));
                            $data = array(
                                'id_transaksi' => $post['id_trans'],
                                'id_customer' => $data_kirim->row()->id_customer,
                                'tgl_pengiriman' => $startDate,
                                'id_transaksi_detail' => $data_kirim->row()->id_transaksi_detail,
                                'id_customer' => $data_kirim->row()->id_customer,
                                'detail_paket' => $data_kirim->row()->detail_paket,
                                'jml_pack_dikirim' => $data_kirim->row()->jml_pack_dikirim,
                                'jml_lunch' =>$data_kirim->row()->jml_lunch,
                                'jml_dinner' => $data_kirim->row()->jml_dinner,
                                'jenis_paket' => $data_kirim->row()->jenis_paket
                            );
                            
                            $this->db->insert('tbl_transaksi_pengiriman', $data);
                            
                            // foreach ($date_hold as $hold) {
                                $delete = $this->StopHoldDeliveryModel->deletePengiriman($post['id_trans'], $data_kirim->row()->id_transaksi_detail, $array_date[$i]);
                                // var_dump($delete);die;
                                // if ($delete == true) {
                                //     $i++;
                                // }
                        }
                    }
                    if (count($matchingDates) <  count($array_date)) {
                        $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                        $i++;
                        // var_dump( $startDate);die;
                    } 
                    else{
                        break;
                    }
                    $startDate = date('Y-m-d', strtotime('+1 day'.$startDate));
                    // var_dump( $startDate);die;
                } while ($startDate <= $endDate);
                // var_dump( $matchingDates);die;
                // $array_pengiriman = array();
                // foreach ($variable as $key => $value) {
                //     # code...
                // }

                // $last_day = array();
                // $last_day[] = date('Y-m-d', strtotime($data_kirim->row()->tgl_pengiriman. '+ 1 days'));
                // $insert = array();
                // for ($i=0; $i < count($array_date); $i++) {
                //     // if (in_array($array_date[$i], $array_pengiriman)) {
                //         if (!in_array($array_contiue[$i],$array_holiday)) {
                //             if (count($array_contiue) <= count($array_date)) {
                //                 $array_contiue[] =  date('Y-m-d', strtotime($array_contiue[$i]. "+ 1 days"));
                //                 // var_dump($array_date[$i]);die;
                //             }
                //             $data = array(
                //                 'id_transaksi' => $post['id_trans'],
                //                 'id_customer' => $data_kirim->row()->id_customer,
                //                 'tgl_pengiriman' => $array_contiue[$i],
                //                 'id_transaksi_detail' => $data_kirim->row()->id_transaksi_detail,
                //                 'id_customer' => $data_kirim->row()->id_customer,
                //                 'detail_paket' => $data_kirim->row()->detail_paket,
                //                 'jml_pack_dikirim' => $data_kirim->row()->jml_pack_dikirim,
                //                 'jml_lunch' =>$data_kirim->row()->jml_lunch,
                //                 'jml_dinner' => $data_kirim->row()->jml_dinner,
                //                 'jenis_paket' => $data_kirim->row()->jenis_paket
                //             );
                //             // var_dump($array_hold[$i]);die;
                //             // $insert[] = $this->db->insert('tbl_transaksi_pengiriman', $data);
                            
                //             // $delete = $this->StopHoldDeliveryModel->deletePengiriman($post['id_trans'], $data_kirim->row()->id_transaksi_detail, $array_date[$i]);
                            
                //         } else {
                //             var_dump($array_contiue[$i]);die;
                //             $array_contiue[$i] =  date('Y-m-d', strtotime($array_contiue[$i]. "+ 1 days"));
                //             // var_dump($array_contiue);die;
                //             // if (!in_array($array_contiue[$i],$array_holiday)) {
                //             //     $array_contiue[] =  date('Y-m-d', strtotime($array_contiue[$i]. "+ 1 days"));
                //             //     $data = array(
                //             //         'id_transaksi' => $post['id_trans'],
                //             //         'id_customer' => $data_kirim->row()->id_customer,
                //             //         'tgl_pengiriman' => $array_contiue[$i],
                //             //         'id_transaksi_detail' => $data_kirim->row()->id_transaksi_detail,
                //             //         'id_customer' => $data_kirim->row()->id_customer,
                //             //         'detail_paket' => $data_kirim->row()->detail_paket,
                //             //         'jml_pack_dikirim' => $data_kirim->row()->jml_pack_dikirim,
                //             //         'jml_lunch' =>$data_kirim->row()->jml_lunch,
                //             //         'jml_dinner' => $data_kirim->row()->jml_dinner,
                //             //         'jenis_paket' => $data_kirim->row()->jenis_paket
                //             //     );
                //             //     // var_dump($array_hold[$i]);die;
                //             //     $insert[] = $this->db->insert('tbl_transaksi_pengiriman', $data);
                                
                //             //     $delete = $this->StopHoldDeliveryModel->deletePengiriman($post['id_trans'], $data_kirim->row()->id_transaksi_detail, $array_date[$i]);
                //             // }

                //         }
                        
                //         if (count($insert) == count($array_date)) {
                //             break;
                //         }
                // }
            }
            // var_dump($array_contiue);die;


        // }
        
        
        redirect('transaksi/detailTransaksi/'.$post['id_trans']);
    }

    public function getDateContinue() {
        $post = $this->input->post();
        var_dump($post);die;
    }
}
