<?php

final class TimeTableDetailModel extends CI_Model
{
    function getDetailTrans($id_transaksi, $id_transaksi_detail) {
        $where = array(
            'id_transaksi_detail' => $id_transaksi_detail,
            'tbl_transaksi.id_transaksi' => $id_transaksi,
            'status_veryfied'=> 'verified',
            'status_delete' => null
        );

        $this->db->select('tbl_transaksi.id_transaksi, tbl_transaksi.id_customer, nama_customer, nama_klinik, id_transaksi_detail, jenis_paket, kategori_paket, sum(qty_pemesanan) as qty, periode_paket, paid_date, tgl_transaksi');
        $this->db->from('tbl_transaksi_detail');
        $this->db->join('tbl_transaksi', 'tbl_transaksi_detail.id_transaksi=tbl_transaksi.id_transaksi');
        $this->db->join('ms_klinik', 'tbl_transaksi.id_klinik=ms_klinik.id_klinik');
        $this->db->join('ms_perusahaan', 'tbl_transaksi.id_perusahaan=ms_perusahaan.id_perusahaan');
        $this->db->join('ms_customer', 'tbl_transaksi.id_customer=ms_customer.id_customer');
        
        $this->db->where($where);
        $this->db->group_by('id_transaksi_detail');
        return $this->db->get()->row();
    }

    function get_timetable($id_transaksi, $id_transaksi_detail) {
        $where = array(
            'id_transaksi_detail' => $id_transaksi_detail,
            'id_transaksi' => $id_transaksi
        );
        $this->db->select('id_transaksi_detail, tgl_pengiriman, sum(jml_lunch) as lunch, sum(jml_dinner) as dinner');
        $this->db->from('tbl_transaksi_pengiriman');
        $this->db->group_by('tgl_pengiriman');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
}