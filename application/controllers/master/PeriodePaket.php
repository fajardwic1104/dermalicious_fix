<?php

final class PeriodePaket extends CI_Controller
{
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
        $this->load->model('master/PeriodePaketModel');
    }

    function index() {
        // $data['brand'] = $this->PeriodePaketModel->getPerusahaan();
        $this->load->view('master/periode_paket/front');
    }

    // function addKlinik() {
    //     $this->load->view('master/klinik/klinik_add');
    // }

    public function list_periode_paket()
    {
        // header('Content-Type: application/json');
        $list = $this->PeriodePaketModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $periode) {
            $no++;
            $row = array();
            
            $row[] = $periode['id_periode_paket'];
            $row[] = $periode['periode_paket'];
            $row[] = "<button class='btn btn-warning' onclick='getEdit(this)' data-id='".$periode['id_periode_paket']."' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/PeriodePaket/DeletePeriode/'.$periode['id_periode_paket']."') class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->PeriodePaketModel->count_all(),
            "recordsFiltered" => $this->PeriodePaketModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function DetailKlinik() {
        $post = $this->input->post();
        
        $get_klinik = $this->PeriodePaketModel->getKlinik($post['id_klinik']);
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

    function Edit() {
        $post = $this->input->post();

        // $brand = $this->PeriodePaketModel->getPerusahaan();
        // var_dump($brand);die;
        $get_periode = $this->PeriodePaketModel->getPeriode($post['id']);
        echo '<form action="'.site_url('master/PeriodePaket/updateData/'.$post['id']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="periode_paket" type="text" value="'.$get_periode->periode_paket.'">
                                </select>
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

    function updateData($id) {
        $post = $this->input->post();
        $data = array(
            'periode_paket' => $post['periode_paket'],
        );
        $this->db->where('id_periode_paket', $id);
        $update_holiday = $this->db->update('ms_periode_paket', $data);
        if ($update == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/PeriodePaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/PeriodePaket');
        }
    }

    function insert() {
        $post = $this->input->post();
        // var_dump($post);die;
        $data = array(
            'periode_paket' => $post['periode_paket'],
        );
        $insert = $this->db->insert('ms_periode_paket', $data);
        
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiTambahkan');
            redirect('master/PeriodePaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiTambah, Tolong Periksa Kembali');
            redirect('master/PeriodePaket');
        }
    }

    function DeletePeriode($id) {
        // $this->db->where('id_klinik', $id);
        // $this->db->delete('tbl_klinik_perusahaan');

        $this->db->where('id_periode_paket', $id);
        $delete = $this->db->delete('ms_periode_paket');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/PeriodePaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/PeriodePaket');
        }
    }
}