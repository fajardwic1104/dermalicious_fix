<?php

final class KategoriPaket extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('master/KategoriPaketModel');
    }

    function index() {
        $data['jenis'] = $this->KategoriPaketModel->getJenis();
        $this->load->view('master/kategori_paket/front', $data);
    }

    public function list_kategori_paket()
    {
        // header('Content-Type: application/json');
        $list = $this->KategoriPaketModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $kategori) {
            $no++;
            $row = array();
            
            $row[] = $kategori['id_kategori_paket'];
            $row[] = $kategori['kategori_paket'];
            $row[] = $kategori['jenis_paket'];
            
            $row[] = "<button onclick='getEdit(this)' data-id='".$kategori['id_kategori_paket']."' class='btn btn-warning' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/KategoriPaket/deleteKategoriPaket/'.$kategori['id_kategori_paket']."') class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->KategoriPaketModel->count_all(),
            "recordsFiltered" => $this->KategoriPaketModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function insert() {
        $post = $this->input->post();
        $last_id_kategori = $this->KategoriPaketModel->getLastIDKategori();
        // $last_number = substr($last_id_klink, strlen($last_id_klink)-2);
        $last_id_kategori += 1;
        // var_dump($post);die; 
        $new_id = $last_id_kategori;
        $insert =  $this->KategoriPaketModel->insertKategori($new_id);
        
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiTambahkan');
            redirect('master/KategoriPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiTambah, Tolong Periksa Kembali');
            redirect('master/KategoriPaket');
        }
        
    }

    function EditKategoriPaket() {
        $post = $this->input->post();
        $jenis = $this->KategoriPaketModel->getJenis();
        $get_kategoripaket = $this->KategoriPaketModel->getKategoriPaket($post['id']);
        echo '<form action="'.site_url('master/KategoriPaket/updateDataKategoriPaket/'.$post['id']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kategori Paket</label>
                                    <input type="text" class="form-control " value="'.$get_kategoripaket->kategori_paket.'" name="kategori_paket"  />
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="form-control select2" style="width: 100%;" name="id_jenis_paket">
                                    <option value="'.$get_kategoripaket->id_jenis_paket.'">'.$get_kategoripaket->jenis_paket.'</option>
                                    <option value="">-- Pilih Jenis Paket --</option>';
                                        foreach ($jenis as $key) {
                                            echo '<option value="'.$key['id_jenis_paket'].'">'.$key['jenis_paket'].'</option>';
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
            // var_dump($get_user);die;
    }

    function updateDataKategoriPaket($id) {
        $post = $this->input->post();
        $data = array(
            'kategori_paket' => $post['kategori_paket']
        );
        $this->db->where('id_kategori_paket', $id);
        $update_kategori = $this->db->update('ms_kategori_paket', $data);

        $data_kategori_jenis = array(
			'id_jenis_paket' => $post['id_jenis_paket'],
			'id_kategori_paket' => $id
		);
		$this->db->where('id_kategori_paket', $id);
		$this->db->delete('tbl_paket_kategori');
		$update_jenis_paket = $this->db->insert('tbl_paket_kategori', $data_kategori_jenis);

		if ($update_kategori == true && $update_jenis_paket == true) {
			$this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/KategoriPaket');
		} else {
			$this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/KategoriPaket');
		}
    }

    function deleteKategoriPaket($id) {
        $this->db->where('id_kategori_paket', $id);
        $this->db->delete('tbl_paket_kategori');

        $this->db->where('id_kategori_paket', $id_klinik);
        $delete = $this->db->delete('ms_kategori_paket');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/KategoriPaket');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/KategoriPaket');
        }
    }
}