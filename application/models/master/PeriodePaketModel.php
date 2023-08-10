<?php

final class PeriodePaketModel extends CI_Model
{
    private function showPeriode()
    {
        
        $this->db->select('*');
        $this->db->from('ms_periode_paket');
        // $this->db->join('tbl_klinik_perusahaan', 'ms_klinik.id_klinik = tbl_klinik_perusahaan.id_klinik');
        // $this->db->join('ms_perusahaan', 'tbl_klinik_perusahaan.id_perusahaan = ms_perusahaan.id_perusahaan');
        // $this->db->order_by('id_perusahaan', 'asc');
    }

    function get_datatables()
	{
		$this->showPeriode();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showPeriode();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('ms_periode_paket');
		return $this->db->count_all_results();
	}

    function getPeriode($id) {
        return $this->db->get_where('ms_periode_paket', ['id_periode_paket' => $id])->row();
    }
}