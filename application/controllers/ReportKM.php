<?php

class ReportKM extends CI_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->model('ReportKmModel');
        if ($this->session->userdata('id_user') == null ) {
          redirect('login/logout');
      }
    }

    function index() {
        $this->load->view('report/km');
    }
    
    function get_listJarak(){
        $list = $this->ReportKmModel->get_datatables();
        $data = array();
        $no = 1;
        
        foreach ($list as $key) {
                $row = array();
                
                $row[] =$no++;
                $row[] =$key['nama_customer'];
                $row[] = date('d F Y', strtotime($key['tgl_pengiriman']));
                $row[] =$key['paid_date'];
                $row[] =$key['alamat_1'];
                $row[] =$key['km_1']." KM";
                if ($key['alamat_2'] == null) {
                    $row[] = "-";
                    $row[] = "-";
                } else {
                    $row[] =$key['alamat_2'];
                    $row[] =$key['km_2']." KM";
                }
                $row[] ='Catatan 1 : '.$key['note_pengiriman_1'].' <br> Catatan 2 : '.$key['note_pengiriman_2'];
                $row[] =$key['telepon_1'];
                $row[] =$key['jenis_paket']." (".$key['lunch']." Lunch, ".$key['dinner'].' Dinner)';
                $row[] =$key['remarks'];
                if ($key['status_delivery'] == null && $this->session->userdata('level') == "Admin Dermalicious") {
                    $row[] = '<form id="'.$key['id_detail_pengiriman'].'" enctype="multipart/form-data">
                          <input type="hidden" name="id_pengiriman" value="'.$key['id_detail_pengiriman'].'">
                          <input type="hidden" name="tanggal" value="'.$key['tgl_pengiriman'].'">
                          <input type="hidden" name="status" value="Terkirim">
                          <input type="text" class="form-control" name="remarks">
                          <button type="button" onclick=edit("'.$key['id_detail_pengiriman'].'") class="btn btn-primary bg-teal waves-effect waves-float">update</button>
                      </form>';
                } else {
                    $row[] =$key['status_delivery'];
                }
                // $row[] =$key['nama_customer'];
// $key['paid_date']
                        // echo '<tr style="border: 1px solid black; border-collapse: collapse;">
                        //     <td style="border: 1px solid black; border-collapse: collapse;">'.$no++.'</td>
                        //     <td style="border: 1px solid black; border-collapse: collapse;">'.$key['nama_customer'].'</td>
                        //     <td style="border: 1px solid black; border-collapse: collapse;">'.$key['paid_date'].'</td>';

                        //     echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$key['alamat_1'].'</td>
                        //     <td style="border: 1px solid black; border-collapse: collapse;">'.$key['km_1'].' Km</td>';
                        //     if ($key['alamat_2'] == null) {
                        //       echo '<td style="border: 1px solid black; border-collapse: collapse;"> - </td>
                        //       <td style="border: 1px solid black; border-collapse: collapse;"> - </td>';
                        //     } else {
                        //       echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$key['alamat_2'].'</td>
                        //       <td style="border: 1px solid black; border-collapse: collapse;">'.$key['km_2'].' Km</td>';
                        //     }
                            
                        //       echo '<td style="border: 1px solid black; border-collapse: collapse;">Catatan 1 : '.$key['note_pengiriman_1'].' <br> Catatan 2 : '.$key['note_pengiriman_2'].'</td>
                        //       <td style="border: 1px solid black; border-collapse: collapse;">'.$key['km_3'].' Km</td>';
                            
                        //     echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$key['telepon_1'].'</td>
                        //     <td style="border: 1px solid black; border-collapse: collapse;">'.$key['jenis_paket']." (".$key['lunch']." Lunch, ".$key['dinner'].' Dinner)</td>
                        // </tr>';
                    // }
                    
                    $data[] = $row;
                }
                
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->ReportKmModel->count_all(),
            "recordsFiltered" => $this->ReportKmModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function listJarak() {
        $post = $this->input->post();

        $report = $this->ReportKmModel->get_timeTable($post['tgl']);
        // var_dump($report);die;
        $no=1;
        echo '<button class="btn btn-success" onclick="printTable()" id="print">Print</button><div id="table-jarak"><table id="transaksi" style="border: 1px solid black; border-collapse: collapse;" class="table table-bordered table-hover">
        <tr style="border: 1px solid black; border-collapse: collapse;">
          <td style="border: 1px solid black; border-collapse: collapse;">Nama Driver</td>
          <td style="border: 1px solid black; border-collapse: collapse;">:</td>
          <td style="border: 1px solid black; border-collapse: collapse;"></td>
        </tr>
        <tr style="border: 1px solid black; border-collapse: collapse;">
          <td style="border: 1px solid black; border-collapse: collapse;">Tujuan</td>
          <td style="border: 1px solid black; border-collapse: collapse;">:</td>
          <td style="border: 1px solid black; border-collapse: collapse;"></td>
        </tr>
        <tr style="border: 1px solid black; border-collapse: collapse;">
          <td style="border: 1px solid black; border-collapse: collapse;">Tanggal</td>
          <td style="border: 1px solid black; border-collapse: collapse;">:</td>
          <td style="border: 1px solid black; border-collapse: collapse;">'.date('l, d M Y', strtotime($post['tgl'])).'</td>
        </tr>
        <tr style="border: 1px solid black; border-collapse: collapse;">
          <td style="border: 1px solid black; border-collapse: collapse;">Waktu Berangkat</td>
          <td style="border: 1px solid black; border-collapse: collapse;">:</td>
          <td style="border: 1px solid black; border-collapse: collapse;"></td>
        </tr>
        </table><br>';
        echo '<table id="transaksi-table" style="border: 1px solid black; border-collapse: collapse;" class="table table-bordered table-hover">
        <thead>
        <tr style="border: 1px solid black; border-collapse: collapse;">
          <th style="border: 1px solid black; border-collapse: collapse;">No</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Nama Customer</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Periode</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Alamat Pengiriman 1</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Jarak Alamat 1</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Alamat Pengiriman 2</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Jarak Alamat 2</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Catatan Pengiriman</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Jarak Alamat 3</th>
          <th style="border: 1px solid black; border-collapse: collapse;">No Telp.</th>
          <th style="border: 1px solid black; border-collapse: collapse;">Jumlah Pesanan</th>
        </tr>
        </thead>
        <tbody>';
        if (!empty($report)) {
            foreach ($report as $key) {
                
                        echo '<tr style="border: 1px solid black; border-collapse: collapse;">
                            <td style="border: 1px solid black; border-collapse: collapse;">'.$no++.'</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">'.$key['nama_customer'].'</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">'.$key['paid_date'].'</td>';

                            echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$key['alamat_1'].'</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">'.$key['km_1'].' Km</td>';
                            if ($key['alamat_2'] == null) {
                              echo '<td style="border: 1px solid black; border-collapse: collapse;"> - </td>
                              <td style="border: 1px solid black; border-collapse: collapse;"> - </td>';
                            } else {
                              echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$key['alamat_2'].'</td>
                              <td style="border: 1px solid black; border-collapse: collapse;">'.$key['km_2'].' Km</td>';
                            }
                            
                              echo '<td style="border: 1px solid black; border-collapse: collapse;">Catatan 1 : '.$key['note_pengiriman_1'].' <br> Catatan 2 : '.$key['note_pengiriman_2'].'</td>
                              <td style="border: 1px solid black; border-collapse: collapse;">'.$key['km_3'].' Km</td>';
                            
                            echo '<td style="border: 1px solid black; border-collapse: collapse;">'.$key['telepon_1'].'</td>
                            <td style="border: 1px solid black; border-collapse: collapse;">'.$key['jenis_paket']." (".$key['lunch']." Lunch, ".$key['dinner'].' Dinner)</td>
                        </tr>';
                    // }
                }
            } else {
            echo '<tr>
            <td colspan=7><i>Tidak Ada Pengiriman</i></td></tr>';
        }
        
        echo '</tbody>
      </table></div>';

        // var_dump($report);die;
        // echo "test";
    }
    
    public function update_pengiriman() {
        $post = $this->input->post();
        
        $data = array(
            'remarks' => $post['remarks'],
            'status_delivery' => $post['status']
            );
        
        $where = array(
            'id_detail_pengiriman' => $post['id_pengiriman'],
            'tgl_pengiriman' => $post['tanggal']
            );
        
        $this->db->where($where);
        $this->db->update('tbl_transaksi_pengiriman', $data);
            
        // var_dump($post);
        echo json_encode(array("status" => TRUE));
    }
}