<?php

final class Holiday extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('master/HolidayModel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }

    function index() {
        $this->load->view('master/holiday/front');
    }

    function addHoliday() {
        $this->load->view('master/holiday/holiday_add');
    }

    function list_holiday() {
        // header('Content-Type: application/json');
        $list = $this->HolidayModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $holiday) {
            $no++;
            $row = array();
            
            $row[] = $holiday['id_holiday'];
            $row[] = $holiday['date_holiday'];
            $row[] = $holiday['catatan_holiday'];
            $row[] = "<button class='btn btn-info' onclick='getDetail(this)' data-id='".$holiday['id_holiday']."' title='View'><i class='fas fa-eye'></i></button>
                      <button class='btn btn-warning' onclick='getEdit(this)' data-id='".$holiday['id_holiday']."' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/Holiday/DeleteHoliday/'.$holiday['id_holiday']."') class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->HolidayModel->count_all(),
            "recordsFiltered" => $this->HolidayModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function insertHoliday() {
        $post = $this->input->post();
        $data = array(
            'date_holiday' => $post['date_holiday'],
            'catatan_holiday' => $post['catatan_holiday'],
        );
        $insert = $this->db->insert('ms_holiday', $data);
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
            redirect('master/holiday');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Ditambah, Tolong Periksa Kembali');
            redirect('master/holiday');
        }
    }

    function DetailHoliday() {
        $post = $this->input->post();
        
        $get_holiday = $this->HolidayModel->getHoliday($post['id_holiday']);
        echo '<div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Date Holiday</label>
                                    <div class="input-group date" id="tgl-addholiday" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="'.$get_holiday->date_holiday.'" name="date_holiday" data-target="#tgl-addholiday" readonly/>
                                        <div class="input-group-append" data-target="#tgl-addholiday" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="form-group">
                                <label>Remarks</label>
                                <input class="form-control" name="email_user"type="text" value="'.$get_holiday->catatan_holiday.'" readonly>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>';
            // var_dump($get_user);die;
    }

    function EditHoliday() {
        $post = $this->input->post();

        // var_dump($post);die;
        $get_holiday = $this->HolidayModel->getHoliday($post['id_holiday']);
        echo '<form action="'.site_url('master/Holiday/updateDataHoliday/'.$post['id_holiday']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Date Holiday</label>
                                <div class="input-group date" id="tgl-editholiday" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="'.$get_holiday->date_holiday.'" name="date_holiday" data-target="#tgl-editholiday" />
                                        <div class="input-group-append" data-target="#tgl-editholiday" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input class="form-control" name="catatan_holiday" type="text" value="'.$get_holiday->catatan_holiday.'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
              </form>';
    }

    function updateDataHoliday($id) {
        $post = $this->input->post();
        $data = array(
            'date_holiday' => $post['date_holiday'],
            'catatan_holiday' => $post['catatan_holiday'],
        );
        $this->db->where('id_holiday', $id);
        $update_holiday = $this->db->update('ms_holiday', $data);
        if ($update_holiday == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            redirect('master/holiday');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Diupdate, Tolong Periksa Kembali');
            redirect('master/holiday');
        }
    }

    function DeleteHoliday($id) {
        $this->db->where('id_holiday', $id);
        $this->db->delete('ms_holiday');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/holiday');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/holiday');
        }
    }
}