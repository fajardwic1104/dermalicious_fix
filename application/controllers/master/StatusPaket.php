<?php

final class StatusPaket extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('master/StatusPaketModel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }

    function index() {
        $this->load->view('master/status_paket/front');
    }

    public function list_status_paket()
    {
        // header('Content-Type: application/json');
        $list = $this->StatusPaketModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $status) {
            $no++;
            $row = array();
            
            $row[] = $status['id_status_paket'];
            $row[] = $status['status_paket'];
            
            $row[] = "<button onclick='getEdit(this)' data-id='".$status['id_status_paket']."' class='btn btn-warning' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/StatusPaket/deleteStatusPaket/'.$status['id_status_paket']."') class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->StatusPaketModel->count_all(),
            "recordsFiltered" => $this->StatusPaketModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function insert() {
        $post = $this->input->post();
        $data = array(
            'status_paket' => $post['status_paket'],
            // 'catatan_holiday' => $post['catatan_holiday'],
        );
        $insert = $this->db->insert('ms_status_paket', $data);
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiTambahkan');
            redirect('master/StatusPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiTambah, Tolong Periksa Kembali');
            redirect('master/StatusPaket');
        }
    }

    function EditStatusPaket() {
        $post = $this->input->post();
        
        $get_statuspaket = $this->StatusPaketModel->getStatusPaket($post['id']);
        echo '<form action="'.site_url('master/StatusPaket/updateDataStatusPaket/'.$post['id']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Date Holiday</label>
                                <input type="text" class="form-control " value="'.$get_statuspaket->status_paket.'" name="status_paket"  />
                                
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
            // var_dump($get_user);die;
    }

    function updateDataStatusPaket($id) {
        $post = $this->input->post();
        $data = array(
            'status_paket' => $post['status_paket'],
            // 'catatan_holiday' => $post['catatan_holiday'],
        );
        $this->db->where('id_status_paket', $id);
        $update_status_paket = $this->db->update('ms_status_paket', $data);
        if ($update_status_paket == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/StatusPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/StatusPaket');
        }
    }

    function deleteStatusPaket($id) {
        $this->db->where('id_status_paket', $id);
        $this->db->delete('ms_status_paket');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/StatusPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/StatusPaket');
        }
    }
}