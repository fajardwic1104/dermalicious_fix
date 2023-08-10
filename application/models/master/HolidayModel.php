<?php

final class HolidayModel extends CI_Model
{
    private function showHoliday()
    {
        
        $this->db->select('*');
        $this->db->from('ms_holiday');
        // $this->db->join('tbl_klinik_perusahaan', 'ms_klinik.id_klinik = tbl_klinik_perusahaan.id_klinik');
        // $this->db->join('ms_perusahaan', 'tbl_klinik_perusahaan.id_perusahaan = ms_perusahaan.id_perusahaan');
        $this->db->order_by('id_holiday', 'desc');
    }

    function get_datatables()
	{
		$this->showHoliday();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showHoliday();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('ms_klinik');
		return $this->db->count_all_results();
	}

    function getHoliday($id_holiday) {
        return $this->db->get_where('ms_holiday', ['id_holiday' => $id_holiday])->row();
    }
}