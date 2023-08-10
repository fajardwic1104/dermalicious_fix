<?php

class TimeTableDetail extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('TimeTableDetailModel');
    }

    function getDetailTimeTable($id_transaksi, $id_transaksi_detail) {
        $data['detail'] = $this->TimeTableDetailModel->getDetailTrans($id_transaksi, $id_transaksi_detail);
        $data['timetable'] = $this->TimeTableDetailModel->get_timetable($id_transaksi, $id_transaksi_detail);
        // var_dump($data['timetable']);die;
        $this->load->view('time_table/detail_time_table', $data);
    }
}