<?php

final class HargaPaket extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('master/HargaModel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }

    function index() {
        $this->load->view('master/harga_paket/front');
    }
    
    function inputHarga() {
        $data['jenis'] = $this->HargaModel->getJenisPaket();
        $data['periode'] = $this->HargaModel->getAllPeriodePaket();
        // var_dump($data['periode']);die;
        
        $this->load->view('master/harga_paket/harga_paket_add', $data);
    }
    
    public function getKategori()
    {
        $id_jenis = $this->input->post('id_jenis_perusahaan');
        $option = $this->HargaModel->getKategoriPaket($id_jenis);
        // var_dump($id_jenis);exit;
        echo '<option value="">-- Pilih Kategori Paket --</option>';
        foreach ($option as $opt)
        {
            echo '<option>' . $opt['kategori_paket'] . '</option>';
        }
    }
    
    function insert() {
        $post = $this->input->post();
        $this->HargaModel->insertHarga();
        redirect('master/HargaPaket');
        // var_dump($post);die;
    }
    
    function edit($id_harga) {
        $data['jenis'] = $this->HargaModel->getJenisPaket();
        $data['periode'] = $this->HargaModel->getAllPeriodePaket();
        $data['harga'] = $this->HargaModel->getHargaByID($id_harga);
        // var_dump($data['periode']);die;
        
        $this->load->view('master/harga_paket/harga_paket_edit', $data);
    }
}