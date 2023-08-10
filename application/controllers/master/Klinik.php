<?php

final class Klinik extends CI_Controller
{
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
        $this->load->model('master/KlinikModel');
    }

    function index() {
        $data['brand'] = $this->KlinikModel->getPerusahaan();
        $this->load->view('master/klinik/front', $data);
    }

    // function addKlinik() {
    //     $this->load->view('master/klinik/klinik_add');
    // }

    public function list_klinik()
    {
        // header('Content-Type: application/json');
        $list = $this->KlinikModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $klinik) {
            $no++;
            $row = array();
            
            $row[] = $klinik['id_klinik'];
            $row[] = $klinik['nama_klinik'];
            $row[] = "<button class='btn btn-info' onclick='getDetail(this)' data-id='".$klinik['id_klinik']."' title='View'><i class='fas fa-eye'></i></button>
                      <button class='btn btn-warning' onclick='getEdit(this)' data-id='".$klinik['id_klinik']."' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/klinik/DeleteKlinik/'.$klinik['id_klinik']."' title='Delete') class='btn btn-danger'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->KlinikModel->count_all(),
            "recordsFiltered" => $this->KlinikModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function DetailKlinik() {
        $post = $this->input->post();
        
        $get_klinik = $this->KlinikModel->getKlinik($post['id_klinik']);
        echo '<div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Nama Klinik</label>
                                <input class="form-control" name="nama_user" type="text" value="'.$get_klinik->nama_klinik.'" readonly>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Nama Brand</label>
                                <input class="form-control" name="email_user"type="text" value="'.$get_klinik->nama_brand.'" readonly>
                                </select>
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

    function EditKlinik() {
        $post = $this->input->post();

        $brand = $this->KlinikModel->getPerusahaan();
        // var_dump($brand);die;
        $get_klinik = $this->KlinikModel->getKlinik($post['id_klinik']);
        echo '<form action="'.site_url('master/Klinik/updateDataKlinik/'.$post['id_klinik']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="nama_klinik" type="text" value="'.$get_klinik->nama_klinik.'">
                                </select>
                                </div>
                                
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control select2" style="width: 100%;" name="perusahaan">
                                    <option value="'.$get_klinik->id_perusahaan.'">'.$get_klinik->nama_brand.'</option>
                                    <option value="">-- Select Perusahaan --</option>';
                                        foreach ($brand as $key) {
                                            echo '<option value="'.$key['id_perusahaan'].'">'.$key['nama'].'</option>';
                                        }
                                echo'</select>
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

    function updateDataKlinik($id_klinik) {
        $update = $this->KlinikModel->updateKlinik($id_klinik);
        if ($update == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/klinik');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/klinik');
        }
    }

    function insertDataKlinik() {
        $post = $this->input->post();
        $last_id_klink = $this->KlinikModel->getLastIDKlinik($post['perusahaan']);
        if ($last_id_klink != null) {
            $last_number = substr($last_id_klink->id_klinik, strlen($last_id_klink->id_klinik)-2);
            $last_number += 1;
        } else {
            // var_dump("test");die; 
            $last_number = "01";
        }
        // if ($post['perusahaan'] == 1) {
            $new_id = "0".$post['perusahaan'].".02.".$last_number;
        // var_dump($new_id);die; 
        // } elseif ($post['perusahaan'] ==  2) {
            // $new_id = "02.02.".$last_number;
        // }
        $insert =  $this->KlinikModel->insertKlinik($new_id);
        
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiTambahkan');
            redirect('master/klinik');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiTambah, Tolong Periksa Kembali');
            redirect('master/klinik');
        }
    }

    function DeleteKlinik($id_klinik) {
        $this->db->where('id_klinik', $id_klinik);
        $this->db->delete('tbl_klinik_perusahaan');

        $this->db->where('id_klinik', $id_klinik);
        $delete = $this->db->delete('ms_klinik');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/klinik');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/klinik');
        }
    }
}