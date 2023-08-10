<?php

final class JenisPaket extends CI_Controller 
{
    function __construct() {
        parent::__construct();
        $this->load->model('master/JenisPaketModel');
    }

    function index() {
        $this->load->view('master/jenis_paket/front');
    }

    public function list_jenis_paket()
    {
        // header('Content-Type: application/json');
        $list = $this->JenisPaketModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $jenis) {
            $no++;
            $row = array();
            
            $row[] = $jenis['id_jenis_paket'];
            $row[] = $jenis['jenis_paket'];
            
            $row[] = "<button onclick='getEdit(this)' data-id='".$jenis['id_jenis_paket']."' class='btn btn-warning' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/JenisPaket/deleteJenisPaket/'.$jenis['id_jenis_paket']."') class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->JenisPaketModel->count_all(),
            "recordsFiltered" => $this->JenisPaketModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function insert() {
        $post = $this->input->post();
        $data = array(
            'jenis_paket' => $post['jenis_paket'],
        );
        $insert = $this->db->insert('ms_jenis_paket', $data);
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiTambahkan');
            redirect('master/JenisPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiTambah, Tolong Periksa Kembali');
            redirect('master/JenisPaket');
        }
    }

    function EditJenisPaket() {
        $post = $this->input->post();
        
        $get_jenispaket = $this->JenisPaketModel->getJenisPaket($post['id_jenis_paket']);
        echo '<form action="'.site_url('master/JenisPaket/updateDataJenisPaket/'.$post['id_jenis_paket']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Date Holiday</label>
                                <input type="text" class="form-control " value="'.$get_jenispaket->jenis_paket.'" name="jenis_paket"  />
                                
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

    function updateDataJenisPaket($id) {
        $post = $this->input->post();
        $data = array(
            'jenis_paket' => $post['jenis_paket'],
            // 'catatan_holiday' => $post['catatan_holiday'],
        );
        $this->db->where('id_jenis_paket', $id);
        $update_jenis_paket = $this->db->update('ms_jenis_paket', $data);
        if ($update_jenis_paket == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/JenisPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/JenisPaket');
        }
    }

    function deleteJenisPaket($id) {
        $this->db->where('id_jenis_paket', $id);
        $this->db->delete('ms_jenis_paket');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/JenisPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/JenisPaket');
        }
    }
}