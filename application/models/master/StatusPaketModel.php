<?php

final class StatusPaketModel extends CI_Model
{
    private function showStatusPaket()
    {
        
        $this->db->select('*');
        $this->db->from('ms_status_paket');
        // $this->db->join('tbl_role_user', 'ms_user.id_user = tbl_role_user.id_user');
        // $this->db->join('ms_role', 'tbl_role_user.id_role = ms_role.id_role');
        // $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        
        // $this->db->where($where);
        // $this->db->order_by('status_veryfied', 'asc');

        // return $this->db->get('tbl_transaksi')->result_array();
    }

    function get_datatables()
	{
		$this->showStatusPaket();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showStatusPaket();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tbl_transaksi');
		return $this->db->count_all_results();
	}

    function getStatusPaket($id) {
		return $this->db->get_where('ms_status_paket', ['id_status_paket' => $id])->row();
	}

}