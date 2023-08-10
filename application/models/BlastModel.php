<?php

class BlastModel extends CI_Model 
{
    public function getJenisPaket()
    {
        return $this->db->get('ms_jenis_paket')->result_array();
    }

    function getAllCust($dari, $sampai, $jenispaket) {
        // var_dump($jenispaket);die;
        $this->db->select('*');
        $this->db->from('tbl_transaksi_pengiriman');
            $this->db->where('tgl_pengiriman >=', date('Y-m-d', strtotime($dari)));
            $this->db->where('tgl_pengiriman <=', date('Y-m-d', strtotime($sampai)));
        if ($jenispaket != "All") {
            $this->db->where('jenis_paket', $jenispaket);
        } 
        $this->db->group_by('id_transaksi_detail');
        
        return $this->db->get()->result_array();
    }

    function getTransaksiDetail($id_detail, $dari, $sampai) {
        $this->db->select('*');
        $this->db->from('tbl_transaksi_pengiriman');
        $this->db->where('tgl_pengiriman >=', date('Y-m-d', strtotime($dari)));
        $this->db->where('tgl_pengiriman <=', date('Y-m-d', strtotime($sampai)));
        // if ($jenis_paket != "All") {
        //     $this->db->where('jenis_paket', $jenis_paket);
        // }
        
        $this->db->where('id_transaksi_detail', $id_detail);
        
        return $this->db->get();
    }

    function lastDateDelivery($id_detail) {
        $this->db->from('tbl_transaksi_pengiriman');
        $this->db->where('id_transaksi_detail', $id_detail);
        $this->db->order_by('tgl_pengiriman', 'desc');

        return $this->db->get()->row()->tgl_pengiriman;
    }

    function getJadwalKirim($id_detail) {
        $this->db->from('tbl_transaksi_detail');
        $this->db->where('id_transaksi_detail', $id_detail);
        // $this->db->order_by('tgl_pengiriman', 'desc');

        return $this->db->get()->row();
    }

    function insertGlobalHold() {
        $post = $this->input->post();

        if (!empty($post['start_date_periode']) || !empty($post['end_date_periode'])) {
            $start_hold = date('Y-m-d', strtotime($post['start_date_periode']));
            $end_hold = date('Y-m-d', strtotime($post['end_date_periode']));
        } else {
            $start_hold = null;
            $end_hold = null;
        }
        // var_dump($post);die;
        $data = array(
            'jenis_paket' => $post['jenis'],
            'tanggal_blast' => date('Y-m-d', strtotime($post['tgl_blast'])),
            'start_hold_date' => $start_hold,
            'end_hold_date' => $end_hold,
            'whatsapp_message' => $post['isi_pesan'],
            'jenis_blast' => $post['jenis_blast'],
            'status_blast' => "Not Confirm"
        );
        $this->db->insert('tbl_blast', $data);
    }

    function updatePengiriman($id_trans, $id_transaksi_detail, $tgl) {
        $where_delete = array(
            'id_transaksi' => $id_trans, 'id_transaksi_detail' => $id_transaksi_detail, 'tgl_pengiriman' => $tgl
        );
        
        $data_update = array(
            'jml_pack_dikirim' => 0,
            'jml_lunch' => 0,
            'jml_dinner' => 0,
        );
        // var_dump($where_delete);die;
        $this->db->where($where_delete);
        $this->db->update('tbl_transaksi_pengiriman', $data_update);
    }

    private function showBlast()
    {
        $post = $this->input->post();
        // var_dump($this->session->userdata('level'));die;
        // $session = $this->session->userdata('level');
        // if ($session == "Finance" || $session == "PIC Klinik") {
        //     $where = array(
        //         'status_delete' => null
        //     );
        // } else {
        //     $where = array(
        //         'status_delete' => null,
        //         'status_veryfied' => "verified"
        //     );
        // }
        $this->db->select('*');
        $this->db->from('tbl_blast');
        // $this->db->join('ms_klinik', 'tbl_transaksi.id_klinik = ms_klinik.id_klinik');
        // $this->db->join('ms_perusahaan', 'tbl_transaksi.id_perusahaan = ms_perusahaan.id_perusahaan');
        // $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        // $this->db->join('tbl_transaksi_detail', 'tbl_transaksi.id_transaksi=tbl_transaksi_detail.id_transaksi');
        // $this->db->where($where);
        // if ($post['nama_cust'] != null) {
        //     $this->db->like('nama_customer', $post['nama_cust']);
        // }
        // if ($post['id_cust'] != null) {
        //     $this->db->where('tbl_transaksi.id_customer', $post['id_cust']);
        // }
        // if ($post['kategori'] != null) {
        //     $this->db->where('kategori_paket', $post['kategori']);
        // }
        // if ($post['jenis'] != null) {
        //     $this->db->like('jenis_paket', $post['jenis']);
        // }
        // if ($post['verifikasi'] != null) {
        //     if ($post['verifikasi']=="Lunas") {
        //         $this->db->like('status_payment', 'paid');
        //     } else {
        //         $this->db->like('status_payment', 'not paid');
        //     }
        // }
        // if ($post['periode'] != null) {
        //     $this->db->like('periode_paket', $post['periode']);
        // }
        // if ($session == "Finance" && $session == "PIC Klinik") {
        //     $this->db->order_by('status_veryfied', 'asc');
        // } else {
        //     $this->db->order_by('paid_date', 'desc');
        // }
        // $this->db->group_by('tbl_transaksi.id_transaksi');
        // return $this->db->get('tbl_transaksi')->result_array();
    }

    function get_datatables()
	{
		$this->showBlast();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showBlast();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tbl_blast');
		return $this->db->count_all_results();
	}

    function getDetailBlast($id_blast) {
        // var_dump($id_blast);die;
        return $this->db->get_where('tbl_blast', ['id_blast' => $id_blast])->row();
    }

    function updateGlobalHold($id_blast) {
        $this->db->where(['id_blast'=>$id_blast]);
        $this->db->update('tbl_blast', ['status_blast' => 'Confirm']);
    }

    function exportList($id_blast) {
        $this->db->select('nama_customer, telepon_1');
        $this->db->from('tbl_detail_blast');
        $this->db->join('ms_customer', 'tbl_detail_blast.id_customer = ms_customer.id_customer');
        return $this->db->get()->result(); 
    }

    function updateDataBlast($id_blast) {
        $post = $this->input->post();

        if ($post['start_date_periode'] != "" && $post['end_date_periode'] != "" && $post['jenis_blast'] == "Hold Event") {
            $start_hold = date('Y-m-d', strtotime($post['start_date_periode']));
            $end_hold = date('Y-m-d', strtotime($post['end_date_periode']));
        } else {
            $start_hold = null;
            $end_hold = null;
        }
        
        $data_update = array(
            'jenis_paket' => $post['jenis'],
            'tanggal_blast' => date('Y-m-d', strtotime($post['tgl_blast'])),
            'jenis_blast' => $post['jenis_blast'],
            'start_hold_date' => $start_hold,
            'end_hold_date' => $end_hold,
            'whatsapp_message' => $post['isi_pesan']
        ); 
        $this->db->where('id_blast', $id_blast);
        $this->db->update('tbl_blast', $data_update);
    }
}
