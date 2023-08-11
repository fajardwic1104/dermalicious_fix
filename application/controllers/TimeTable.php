<?php
class TimeTable extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TimeTableModel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }

    public function index()
    {
        $this->load->view('time_table/summary');
    }

    public function list_timetable_summary()
    {
        $timetable = $this->TimeTableModel->get_datatables();

        // $list = $this->transaksimodel->get_datatables();
        // var_dump($list);die;
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        $empty = 0;
        foreach ($timetable as $key) {
            $no++;
            $row = array();
            
            $getslimmingbydate = $this->db->select('sum(jml_lunch) + sum(jml_dinner) as total')->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi = tbl_transaksi.id_transaksi')->get_where('tbl_transaksi_pengiriman', ['jenis_paket' => 'slimming', 'tgl_pengiriman' => $key['tgl_pengiriman'], 'tbl_transaksi.status_delete' => null])->row()->total;
            $gethealthybydate = $this->db->select('sum(jml_lunch) + sum(jml_dinner) as total')->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi = tbl_transaksi.id_transaksi')->get_where('tbl_transaksi_pengiriman', ['jenis_paket' => 'healthy', 'tgl_pengiriman' => $key['tgl_pengiriman'], 'tbl_transaksi.status_delete ' => null])->row()->total;
            $gethampersbydate = $this->db->select('sum(jml_lunch) + sum(jml_dinner) as total')->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi = tbl_transaksi.id_transaksi')->get_where('tbl_transaksi_pengiriman', ['jenis_paket' => 'hampers', 'tgl_pengiriman' => $key['tgl_pengiriman'], 'tbl_transaksi.status_delete' => null])->row()->total;
            $getpromotionbydate = $this->db->select('sum(jml_lunch) + sum(jml_dinner) as total')->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi = tbl_transaksi.id_transaksi')->get_where('tbl_transaksi_pengiriman', ['jenis_paket' => 'promotion', 'tgl_pengiriman' => $key['tgl_pengiriman'], 'tbl_transaksi.status_delete' => null])->row()->total;
            $getcorporatebydate = $this->db->select('sum(jml_lunch) + sum(jml_dinner) as total')->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi = tbl_transaksi.id_transaksi')->get_where('tbl_transaksi_pengiriman', ['jenis_paket' => 'corporate', 'tgl_pengiriman' => $key['tgl_pengiriman'], 'tbl_transaksi.status_delete' => null])->row()->total;
            // var_dump($getslimmingbydate);die;
            $row[] = $key['tgl_pengiriman'];
            if ($this->session->userdata('level') == 'Warehouse') {
                if ($getslimmingbydate != null) {
                    $row[] = $getslimmingbydate;
                } else {
                    $row[] = $empty;
                }
                if ($gethealthybydate != null) {
                    $row[] = $gethealthybydate;
                } else {
                    $row[] = $empty;
                }
                if ($gethampersbydate != null) {
                    $row[] = $gethampersbydate;
                } else {
                    $row[] = $empty;
                }
                if ($getcorporatebydate != null) {
                    $row[] = $getcorporatebydate;
                } else {
                    $row[] = $empty;
                }
                if ($getpromotionbydate != null) {
                    $row[] = $getpromotionbydate;
                } else {
                    $row[] = $empty;
                }
            } else {
                if ($getslimmingbydate != null) {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/slimming')."'>".$getslimmingbydate."</a>";
                } else {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/slimming')."'>".$empty."</a>";
                }
                if ($gethealthybydate != null) {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/healthy')."'>".$gethealthybydate."</a>";
                } else {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/healthy')."'>".$empty."</a>";
                }
                if ($gethampersbydate != null) {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/hampers')."'>".$gethampersbydate."</a>";
                } else {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/hampers')."'>".$empty."</a>";
                }
                if ($getcorporatebydate != null) {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/corporate')."'>".$getcorporatebydate."</a>";
                } else {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/corporate')."'>".$empty."</a>";
                }
                if ($getpromotionbydate != null) {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/promotion')."'>".$getpromotionbydate."</a>";
                } else {
                    $row[] = "<a href='".site_url('TimeTableByDate/front/'.$key['tgl_pengiriman'].'/promotion')."'>".$empty."</a>";
                }
            }
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->TimeTableModel->count_all(),
            "recordsFiltered" => $this->TimeTableModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    // public function timetablejenis($tanggal, $jenis) {
    //     $data['tgl'] = $tanggal;
    //     $data['jenis'] = $jenis;
    //     $this->load->view('time_table/summary', $data);
    // }

    // public function list_timetable_by_jenis($tanggal, $jenis) {
    //     // $data['tgl'] = $tanggal;
    //     // $data['jenis'] = $jenis;
    //     // $this->load->view('time_table/summary', $data);
    // }

}

?>