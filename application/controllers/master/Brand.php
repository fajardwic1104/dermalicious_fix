<?php

final class Brand extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('master/BrandModel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }

    function index() {
        $this->load->view('master/brand/front');
    }

    public function list_brand()
    {
        // header('Content-Type: application/json');
        $list = $this->BrandModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $brand) {
            $no++;
            $row = array();
            
            $row[] = $brand['id_perusahaan'];
            $row[] = $brand['nama_perusahaan'];
            $row[] = $brand['nama'];
            $row[] = "<button class='btn btn-info' onclick='getDetail(this)' data-id='".$brand['id_perusahaan']."' title='View'><i class='fas fa-eye'></i></button>
                      <button class='btn btn-warning' onclick='getEdit(this)' data-id='".$brand['id_perusahaan']."' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/brand/Deletebrand/'.$brand['id_perusahaan']."' title='Delete') class='btn btn-danger'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->BrandModel->count_all(),
            "recordsFiltered" => $this->BrandModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }


    function insertBrand() {
        $post = $this->input->post();
        $data = array(
            'nama_perusahaan' => $post['nama_perusahaan'],
            'nama' => $post['nama_brand'],
        );
        $insert = $this->db->insert('ms_perusahaan', $data);
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiTambahkan');
            redirect('master/brand');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiTambah, Tolong Periksa Kembali');
            redirect('master/brand');
        }
    }

    function DetailBrand() {
        $post = $this->input->post();
        
        $get_perusahaan = $this->BrandModel->getBrand($post['id_brand']);
        echo '<div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input class="form-control" name="nama_user" type="text" value="'.$get_perusahaan->nama_perusahaan.'" readonly>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Nama Brand</label>
                                <input class="form-control" name="email_user"type="text" value="'.$get_perusahaan->nama.'" readonly>
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

    function EditBrand() {
        $post = $this->input->post();

        // $brand = $this->klinikmodel->getPerusahaan();
        // var_dump($post);die;
        $get_perusahaan = $this->BrandModel->getBrand($post['id_brand']);
        echo '<form action="'.site_url('master/Brand/updateDataBrand/'.$post['id_brand']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="nama_perusahaan" type="text" value="'.$get_perusahaan->nama_perusahaan.'">
                                </select>
                                </div>
                                
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input class="form-control" name="nama_brand" type="text" value="'.$get_perusahaan->nama.'">
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

    function updateDataBrand($id) {
        $post = $this->input->post();
        $data = array(
            'nama_perusahaan' => $post['nama_perusahaan'],
            'nama' => $post['nama_brand']
        );
        $this->db->where('id_perusahaan', $id);
        $update_perusahaan = $this->db->update('ms_perusahaan', $data);
        if ($update_perusahaan == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/brand');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/brand');
        }
    }

    function Deletebrand($id) {
        $this->db->where('id_perusahaan', $id);
        $this->db->delete('ms_perusahaan');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/brand');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/brand');
        }
    }
}