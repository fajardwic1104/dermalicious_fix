<?php

final class KlinikModel extends CI_Model
{
    private function showKlinik()
    {
        
        $this->db->select('ms_klinik.id_klinik, nama_klinik, nama_perusahaan, nama as nama_brand, ms_perusahaan.id_perusahaan');
        $this->db->from('ms_klinik');
        $this->db->join('tbl_klinik_perusahaan', 'ms_klinik.id_klinik = tbl_klinik_perusahaan.id_klinik');
        $this->db->join('ms_perusahaan', 'tbl_klinik_perusahaan.id_perusahaan = ms_perusahaan.id_perusahaan');
        $this->db->order_by('ms_klinik.id_klinik', 'asc');
    }

    function get_datatables()
	{
		$this->showKlinik();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showKlinik();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('ms_klinik');
		return $this->db->count_all_results();
	}

    function getKlinik($id_klinik) {
        $this->db->select('ms_klinik.id_klinik, nama_klinik, nama_perusahaan, nama as nama_brand, ms_perusahaan.id_perusahaan');
        $this->db->from('ms_klinik');
        $this->db->join('tbl_klinik_perusahaan', 'ms_klinik.id_klinik = tbl_klinik_perusahaan.id_klinik');
        $this->db->join('ms_perusahaan', 'tbl_klinik_perusahaan.id_perusahaan = ms_perusahaan.id_perusahaan');

        $this->db->where('ms_klinik.id_klinik', $id_klinik);
        return $this->db->get()->row();
    }

    function getPerusahaan() {
        return $this->db->get('ms_perusahaan')->result_array();
    }

    function updateKlinik($id_klinik) {
        $post = $this->input->post();
        $data = array(
            'nama_klinik' => $post['nama_klinik']
        );
        $this->db->where('id_klinik', $id_klinik);
        $update_klinik = $this->db->update('ms_klinik', $data);

        $data_klinik_perusahaan = array(
			'id_perusahaan' => $post['perusahaan'],
			'id_klinik' => $id_klinik
		);
		$this->db->where('id_klinik', $id_klinik);
		$this->db->delete('tbl_klinik_perusahaan');
		$update_perusahaan = $this->db->insert('tbl_klinik_perusahaan', $data_klinik_perusahaan);

		if ($update_klinik == true && $update_perusahaan == true) {
			return true;
		} else {
			return false;
		}
    }

    function getLastIDKlinik($id_brand) {
        return $this->db->order_by('id_klinik', 'desc')->get_where('tbl_klinik_perusahaan', ['id_perusahaan' => $id_brand])->row();
    }

    function insertKlinik($new_id) {
        $post = $this->input->post();
        $data = array(
            'id_klinik' => $new_id,
            'nama_klinik' => $post['nama_klinik']
        );
        $insert_klinik = $this->db->insert('ms_klinik', $data);

        $data_klinik_perusahaan = array(
			'id_perusahaan' => $post['perusahaan'],
			'id_klinik' => $new_id
		);
		$insert_perusahaan = $this->db->insert('tbl_klinik_perusahaan', $data_klinik_perusahaan);

		if ($insert_klinik == true && $insert_perusahaan == true) {
			return true;
		} else {
			return false;
		}
    }
}