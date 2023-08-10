<?php

class TimeTableByDateModel extends CI_Model
{
    private function get_by_date_timetable($tanggal, $jenis)
    {
        $where = array(
            'tbl_transaksi.status_veryfied' => 'verified',
            'tbl_transaksi_detail.jenis_paket' => $jenis,
            'tgl_pengiriman' => $tanggal,
			'status_delete' => null,
// 			'jml_dinner !=' => 0,
// 			'jml_lunch !=' => 0
        );
        $this->db->select('tbl_transaksi_detail.id_transaksi_detail, tbl_transaksi_detail.jenis_paket, alamat_1, kategori_paket, nama_customer, tbl_transaksi.id_transaksi, tbl_transaksi.id_customer, tbl_transaksi_detail.detail_paket, nama_klinik, sum(tbl_transaksi_detail.qty_pemesanan) as qty');
        $this->db->from('tbl_transaksi_pengiriman');
        // $this->db->from('tbl_transaksi_detail');
        $this->db->join('tbl_transaksi_detail', 'tbl_transaksi_pengiriman.id_transaksi_detail = tbl_transaksi_detail.id_transaksi_detail');
        $this->db->join('tbl_transaksi', 'tbl_transaksi_detail.id_transaksi = tbl_transaksi.id_transaksi');
        $this->db->join('ms_customer', 'tbl_transaksi_detail.id_customer = ms_customer.id_customer');
        $this->db->join('ms_klinik', 'tbl_transaksi.id_klinik = ms_klinik.id_klinik');
        // $this->db->join('ms_perusahaan', 'tbl_transaksi.id_perusahaan = ms_perusahaan.id_perusahaan', 'inner');

        $this->db->where($where);
        $this->db->group_by('tbl_transaksi_detail.id_transaksi_detail, tbl_transaksi_detail.jenis_paket');
		// $this->db->order_by('tgl_pengiriman', 'asc');
    }

    function get_datatables($tanggal, $jenis)
	{
		$this->get_by_date_timetable($tanggal, $jenis);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered($tanggal, $jenis)
	{
		$this->get_by_date_timetable($tanggal, $jenis);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($tanggal, $jenis)
	{
		$this->get_by_date_timetable($tanggal, $jenis);
		$query = $this->db->get();
		return $this->db->count_all_results();
	}
}