<?php

class TimeTableByDate extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('TimeTableByDateModel');
    }

    public function front($tgl,$jenis) {
        $data['tgl'] = $tgl;
        $data['jenis'] = $jenis;
        // var_dump($data);die;
        $this->load->view('time_table/by_date', $data);
    }

    public function list_timetable_by_jenis($tanggal, $jenis) {
        $timetable = $this->TimeTableByDateModel->get_datatables($tanggal, $jenis);

        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        $empty = 0;
        foreach ($timetable as $key) {
            $no++;
            $row = array();

            $row[] = $key['nama_klinik'];
            $row[] = $key['id_transaksi'];
            $row[] = $key['id_customer'];
            $row[] = $key['nama_customer'];
            $row[] = $key['alamat_1'];
            $row[] = $key['detail_paket'];
            $row[] = $key['qty'];
            $row[] = '<div class="btn-group btn-group-xs">
            <a href="'.site_url('TimeTableDetail/getDetailTimeTable/'.$key['id_transaksi'].'/'.$key['id_transaksi_detail']).'" class="btn btn-info" data-toggle="tooltip" title="View"><i
                class="fas fa-eye"></i></a>
            </div>';
            
            $data[] = $row;
        }
        // var_dump($timetable);die;
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->TimeTableByDateModel->count_all($tanggal, $jenis),
            "recordsFiltered" => $this->TimeTableByDateModel->count_filtered($tanggal, $jenis),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }
}