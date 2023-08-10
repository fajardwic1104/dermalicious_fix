<?php

class StopHoldDeliveryModel extends CI_Model
{
    function getDataTrans($id_trans, $id_detail) {
        return $this->db->select('id_transaksi, id_transaksi_detail, id_customer, jadwal_pengiriman')->get_where('tbl_transaksi_detail', ['id_transaksi'=> $id_trans, 'id_transaksi_detail' => $id_detail])->row();
    }

    function insertHold() {
        $post = $this->input->post();
        // var_dump(date('Y-m-d', strtotime($post['start_hold'])));die;
        $data = array(
            'id_transaksi' => $post['id_trans'],
            'start_date_hold'=> date('Y-m-d', strtotime($post['start_hold'])),
            'end_date_hold' => date('Y-m-d', strtotime($post['end_hold'])),
            'start_date_delivery' => date('Y-m-d', strtotime($post['start_hold'])),
            'id_customer' => $post['id_cust'],
            'id_detail_transaksi' => $post['id_trans_detail'],
            'note_hold' => $post['keterangan']            

        );
        $this->db->insert('tbl_hold_delivery', $data);
    }

    public function getDetailTransaksi($id)
    {
        // $this->db->select
        return $this->db->get_where('tbl_transaksi_detail', ['id_transaksi' => $id,])->result_array();
    }

    function deletePengiriman($id_trans, $id_transaksi_detail, $tgl) {
        $where_delete = array(
            'id_transaksi' => $id_trans, 'id_transaksi_detail' => $id_transaksi_detail, 'tgl_pengiriman' => $tgl
        );
        
        $data = array(
            // 'detail_paket' => null,
            'jml_pack_dikirim' => 0,
            'jml_lunch' =>0,
            'jml_dinner' => 0,
            // 'jenis_paket' => null
            );
        // var_dump($where_delete);die;
        $this->db->where($where_delete);
        $this->db->update('tbl_transaksi_pengiriman', $data);
    }
    
    function getLastHold($id_transaksi, $id_detail) {
        $query = $this->db->order_by('id_hold', 'desc')->get_where('tbl_hold_delivery', ['id_transaksi' => $id_transaksi, 'id_detail_transaksi' => $id_detail]);
        if ($query->num_rows() > 0){
            return $query->row()->end_date_hold;
        } else {
            return null;
        }
        
    }
}
