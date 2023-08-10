<?php

class ReportKmModel extends CI_Model 
{
    function get_timeTable() {
        $post = $this->input->post();
        $where = array(
            // 'id_transaksi_detail' => $id_transaksi_detail,
            // 'tgl_pengiriman' => date('Y-m-d', strtotime($tgl)),
            'status_veryfied'=> 'verified',
            'status_delete' => null,
            // 'jml_dinner !=' => 0,
            // 'jml_lunch !=' => 0
        );
        // $this->db->select(' jenis_paket, tbl_transaksi_pengiriman.id_transaksi_detail, jml_lunch as lunch, sum(jml_dinner) as dinner, ');
        // // $this->db->select('nama_customer, paid_date, jml_lunch as lunch, jml_dinner as dinner, alamat_1, km_1');
        $this->db->select('id_detail_pengiriman, nama_customer, paid_date, alamat_1, km_1, alamat_2, km_2, tgl_pengiriman, note_pengiriman_1, note_pengiriman_2, km_3, telepon_1, remarks, tbl_transaksi_pengiriman.jenis_paket, tbl_transaksi_pengiriman.id_transaksi_detail, jml_lunch as lunch, jml_dinner as dinner, tbl_transaksi_pengiriman.status_delivery, tgl_pengiriman');
        $this->db->from('tbl_transaksi_pengiriman');
        $this->db->join('tbl_transaksi_detail', 'tbl_transaksi_pengiriman.id_transaksi_detail=tbl_transaksi_detail.id_transaksi_detail');
        $this->db->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi=tbl_transaksi.id_transaksi');
        $this->db->join('ms_customer', 'tbl_transaksi.id_customer=ms_customer.id_customer');

        $this->db->where($where);
        // $this->db->where('dinner !', 0 );
        // $this->db->where('lunch !', 0 );
        if ($post['tgl_delivery'] != null) {
            $this->db->like('tgl_pengiriman', date('Y-m-d', strtotime($post['tgl_delivery'])));
        } else {
            $this->db->like('tgl_pengiriman', date('Y-m-d'));
        }
        // $this->db->group_by('tbl_transaksi_detail.id_transaksi');
        $this->db->order_by('tbl_transaksi_pengiriman.id_transaksi', 'asc');
        $this->db->order_by('km_1', 'asc');
        // return $this->db->get()->result_array();
    }
    
    function get_datatables()
	{
		$this->get_timeTable();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->get_timeTable();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tbl_transaksi_pengiriman');
		return $this->db->count_all_results();
	}

    // function getAddress($id_detail, $id_trans) {
    //     $where = array(
    //         // 'id_transaksi_detail' => $id_transaksi_detail,
    //         'status_veryfied'=> 'verified'
    //     );
    //     $this->db->select('tbl_transaksi.id_transaksi, nama_customer, paid_date, alamat_1, telepon_1, km_1');
    //     $this->db->from('tbl_transaksi_detail');
    //     // $this->db->join('tbl_transaksi_detail', 'tbl_transaksi_detail.id_transaksi_detail=tbl_transaksi_pengiriman.id_transaksi_detail');
    //     $this->db->join('tbl_transaksi', 'tbl_transaksi_detail.id_transaksi=tbl_transaksi.id_transaksi');
    //     $this->db->join('ms_customer', 'tbl_transaksi.id_customer=ms_customer.id_customer');

    //     $this->db->where($where);
    //     $this->db->order_by('km_1', 'asc');
    //     $this->db->group_by('tbl_transaksi.id_transaksi');
    //     return $this->db->get()->result();
    // }
}