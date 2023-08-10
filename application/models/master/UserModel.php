<?php


class UserModel extends CI_Model
{
    public function getRole()
    {
        return $this->db->get('ms_role')->result();
    }

    private function showUser()
    {
        
        $this->db->select('ms_user.id_user, nama_user, email_user, nama_role');
        $this->db->from('ms_user');
        $this->db->join('tbl_role_user', 'ms_user.id_user = tbl_role_user.id_user');
        $this->db->join('ms_role', 'tbl_role_user.id_role = ms_role.id_role');
        // $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        
        // $this->db->where($where);
        // $this->db->order_by('status_veryfied', 'asc');

        // return $this->db->get('tbl_transaksi')->result_array();
    }

    function get_datatables()
	{
		$this->showUser();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showUser();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('ms_user');
		return $this->db->count_all_results();
	}

	function getUser($id_user) {
		$this->db->select('ms_user.id_user, nama_user, email_user, ms_role.id_role, nama_role');
		$this->db->join('tbl_role_user', 'ms_user.id_user=tbl_role_user.id_user', 'inner');
		$this->db->join('ms_role', 'tbl_role_user.id_role=ms_role.id_role', 'inner');

		$this->db->where('ms_user.id_user', $id_user);
		return $this->db->get('ms_user')->row();
	}

	function update($id_user) {
		$post = $this->input->post();

		$data = array(
            'nama_user' => $post['nama_user'],
            'email_user' => $post['email_user'],
            // 'password' => $password,
        );
		$this->db->where('id_user', $id_user);
        $update_user = $this->db->update('ms_user', $data);

		$data_role = array(
			'id_role' => $post['role_user'],
			'id_user' => $id_user
		);
		$this->db->where('id_user', $id_user);
		$this->db->delete('tbl_role_user');
		$update_role = $this->db->insert('tbl_role_user', $data_role);

		if ($update_user == true && $update_role == true) {
			return true;
		} else {
			return false;
		}
	}
}

?>