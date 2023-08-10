<?php

final class KategoriPaketModel extends CI_Model
{
    private function showKategoriPaket()
    {
        
        $this->db->select('ms_kategori_paket.id_kategori_paket, kategori_paket, jenis_paket');
        $this->db->from('ms_kategori_paket');
        $this->db->join('tbl_paket_kategori', 'ms_kategori_paket.id_kategori_paket = tbl_paket_kategori.id_kategori_paket');
        $this->db->join('ms_jenis_paket', 'tbl_paket_kategori.id_jenis_paket = ms_jenis_paket.id_jenis_paket');
        // $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        
        // $this->db->where($where);
        $this->db->order_by('ms_kategori_paket.id_kategori_paket', 'asc');

        // return $this->db->get('tbl_transaksi')->result_array();
    }

    function get_datatables()
	{
		$this->showKategoriPaket();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showKategoriPaket();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('ms_kategori_paket');
		return $this->db->count_all_results();
	}

	function getKategoriPaket($id) {
        $this->db->select('ms_kategori_paket.id_kategori_paket, kategori_paket, ms_jenis_paket.id_jenis_paket, jenis_paket');
        $this->db->from('ms_kategori_paket');
        $this->db->join('tbl_paket_kategori', 'ms_kategori_paket.id_kategori_paket = tbl_paket_kategori.id_kategori_paket');
        $this->db->join('ms_jenis_paket', 'tbl_paket_kategori.id_jenis_paket = ms_jenis_paket.id_jenis_paket');
        $this->db->where('ms_kategori_paket.id_kategori_paket', $id);
        return $this->db->get()->row();
		// return $this->db->get_where('ms_kategori_paket', ['id_kategori_paket' => $id])->row();
	}

    function getJenis() {
        return $this->db->get('ms_jenis_paket')->result_array();
    }

    function updateKategori($id_kategori) {
        $post = $this->input->post();
        $data = array(
            'kategori_paket' => $post['kategori_paket']
        );
        $this->db->where('id_kategori_paket', $id_kategori);
        $update_kategori = $this->db->update('ms_kategori_paket', $data);

        $data_kategori_jenis = array(
			'id_jenis_paket' => $post['id_jenis_paket'],
			'id_kategori_paket' => $id_kategori
		);
		$this->db->where('id_kategori_paket', $id_kategori);
		$this->db->delete('tbl_paket_kategori');
		$update_jenis_paket = $this->db->insert('tbl_paket_kategori', $data_kategori_jenis);

		if ($update_kategori == true && $update_jenis_paket == true) {
			return true;
		} else {
			return false;
		}
    }

    function getLastIDKategori() {
        return $this->db->order_by('id_kategori_paket', 'desc')->get('ms_kategori_paket')->row()->id_kategori_paket;
    }

    function insertKategori($new_id) {
        $post = $this->input->post();
        $data = array(
            'id_kategori_paket' => $new_id,
            'kategori_paket' => $post['kategori_paket']
        );
        $insert_kategori = $this->db->insert('ms_kategori_paket', $data);

        $data_kategori_jenis = array(
			'id_jenis_paket' => $post['jenis_paket'],
			'id_kategori_paket' => $new_id
		);
		$detail_paket = $this->db->insert('tbl_paket_kategori', $data_kategori_jenis);

		if ($insert_kategori == true && $detail_paket == true) {
			return true;
		} else {
			return false;
		}
    }
}