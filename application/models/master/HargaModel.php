<?php

class HargaModel extends CI_Model
{
    function getJenisPaket() {
        return $this->db->get('ms_jenis_paket')->result_array();
    }
    
    function getAllPeriodePaket() {
        return $this->db->get('ms_periode_paket')->result_array();
    }
    
    public function getKategoriPaket($id_jenis)
    {
        $this->db->select('ms_kategori_paket.id_kategori_paket, kategori_paket');
        $this->db->from('tbl_paket_kategori');
        $this->db->join('ms_kategori_paket', 'ms_kategori_paket.id_kategori_paket = tbl_paket_kategori.id_kategori_paket');
        $this->db->where('tbl_paket_kategori.id_jenis_paket', $id_jenis);
        return $this->db->get()->result_array();
    }
    
    // public function getKategoriPaket($id_jenis)
    // {
    //     $this->db->select('ms_kategori_paket.id_kategori_paket, kategori_paket');
    //     $this->db->from('tbl_paket_kategori');
    //     $this->db->join('ms_kategori_paket', 'ms_kategori_paket.id_kategori_paket = tbl_paket_kategori.id_kategori_paket');
    //     $this->db->where('tbl_paket_kategori.id_jenis_paket', $id_jenis);
    //     return $this->db->get()->result_array();
    // }
    
    public function getNamajenis($id_jenis)
    {
        return $this->db->select('jenis_paket')->where('id_jenis_paket', $id_jenis)->get('ms_jenis_paket')->row();
    }
    
    function insertHarga() {
        $post = $this->input->post();
        $nama_jenis = $this->getNamajenis($post['jenis']);
        $jadwal_paket =  implode(', ', $post['days']); 
        if(count($post['waktu']) > 1) {
            $waktu_paket =  implode(' - ', $post['waktu']); 
        } else {
            $waktu_paket =  implode('', $post['waktu']); 
        }
        $data = array(
            'jenis_paket' => $nama_jenis->jenis_paket,
            'kategori_paket' => $post['kategori'],
            'waktu_paket' => $waktu_paket,
            'harga' => $post['harga'],
            'diskon' => $post['diskon'],
            'harga_setelah_diskon' => $post['setelah_diskon'],
            'jadwal' => $jadwal_paket
            );
        // var_dump($data);die;
        $this->db->insert('ms_harga_paket', $data);
    }
    
    function getHargaByID($id_harga) {
        return $this->db->get_where('ms_harga_paket', ['id_harga' => $id_harga])->row();
    }
}