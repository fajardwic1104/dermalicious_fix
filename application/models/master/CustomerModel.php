<?php

class CustomerModel extends CI_Model
{
    private function showCustomer()
    {
        
        $this->db->select('*');
        $this->db->from('ms_customer');
        // $this->db->join('tbl_klinik_perusahaan', 'ms_klinik.id_klinik = tbl_klinik_perusahaan.id_klinik');
        // $this->db->join('ms_perusahaan', 'tbl_klinik_perusahaan.id_perusahaan = ms_perusahaan.id_perusahaan');
        // $this->db->order_by('id_perusahaan', 'asc');
    }

    function get_datatables()
	{
		$this->showCustomer();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showCustomer();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('ms_customer');
		return $this->db->count_all_results();
	}

    function getCustomer($id) {
        return $this->db->get_where('ms_customer', ['id_customer' => $id])->row();
    }
}