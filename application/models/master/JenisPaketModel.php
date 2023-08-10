<?php

final class JenisPaketModel extends CI_Model
{
    private function showJenisPaket()
    {
        
        $this->db->select('*');
        $this->db->from('ms_jenis_paket');
        // $this->db->join('tbl_role_user', 'ms_user.id_user = tbl_role_user.id_user');
        // $this->db->join('ms_role', 'tbl_role_user.id_role = ms_role.id_role');
        // $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        
        // $this->db->where($where);
        // $this->db->order_by('status_veryfied', 'asc');

        // return $this->db->get('tbl_transaksi')->result_array();
    }

    function get_datatables()
	{
		$this->showJenisPaket();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showJenisPaket();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('ms_jenis_paket');
		return $this->db->count_all_results();
	}

	function getJenisPaket($id) {
		return $this->db->get_where('ms_jenis_paket', ['id_jenis_paket' => $id])->row();
	}
}