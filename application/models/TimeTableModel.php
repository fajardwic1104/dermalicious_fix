<?php

class TimeTableModel extends CI_Model
{
    private function get_summary_timetable()
    {
        $this->db->select('tgl_pengiriman, tbl_transaksi_pengiriman.jenis_paket, jml_pack_dikirim, sum(jml_lunch) + sum(jml_dinner) as total');
        $this->db->from('tbl_transaksi_pengiriman');
        $this->db->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi = tbl_transaksi.id_transaksi');
        // $this->db->where('jml_dinner', 0);
        // $this->db->where('tbl_transaksi.status_delete',  'd');
        $this->db->group_by('tgl_pengiriman');
		$this->db->order_by('tgl_pengiriman', 'asc');
    }

    function get_datatables()
	{
		$this->get_summary_timetable();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->get_summary_timetable();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tbl_transaksi');
		return $this->db->count_all_results();
	}
}