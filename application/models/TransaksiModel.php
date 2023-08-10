<?php

class TransaksiModel extends CI_Model
{
    public function getKlinik($id_perusahaan)
    {
        $this->db->select('ms_klinik.id_klinik, ms_klinik.nama_klinik');
        $this->db->from('tbl_klinik_perusahaan');
        $this->db->join('ms_klinik', 'ms_klinik.id_klinik = tbl_klinik_perusahaan.id_klinik');
        $this->db->where('tbl_klinik_perusahaan.id_perusahaan', $id_perusahaan);
        return $this->db->get()->result_array();
    }

    public function getJenisPaket()
    {
        return $this->db->get('ms_jenis_paket')->result_array();
    }

    public function getNamaKlinik($id_klinik)
    {
        return $this->db->select('nama_klinik')->where('id_klinik', $id_klinik)->get('ms_klinik')->row();
    }

    public function getKategoriPaket($id_jenis)
    {
        $this->db->select('ms_kategori_paket.id_kategori_paket, kategori_paket');
        $this->db->from('tbl_paket_kategori');
        $this->db->join('ms_kategori_paket', 'ms_kategori_paket.id_kategori_paket = tbl_paket_kategori.id_kategori_paket');
        $this->db->where('tbl_paket_kategori.id_jenis_paket', $id_jenis);
        return $this->db->get()->result_array();
    }

    public function getCities()
    {
        $this->db->select('city_id, city_name');
        $this->db->where('prov_id', 11);
        $this->db->or_where('city_id', 158);
        $this->db->or_where('city_id', 171);
        $this->db->or_where('city_id', 172);
        $this->db->or_where('city_id', 246);
        $this->db->or_where('city_id', 250);
        return $this->db->get('ec_cities')->result_array();
    }

    public function getDistricts($id_cities)
    {
        // var_dump($id_cities);exit;
        $this->db->select('ec_districts.dis_id, dis_name');
        $this->db->from('ec_districts');
        $this->db->join('ec_cities', 'ec_cities.city_id = ec_districts.city_id');
        $this->db->where('ec_districts.city_id', $id_cities);
        return $this->db->get()->result_array();
    }

    public function getSubDistricts($id_districts)
    {
        // var_dump($id_cities);exit;
        $this->db->select('ec_subdistricts.subdis_id, subdis_name');
        $this->db->from('ec_subdistricts');
        $this->db->join('ec_districts', 'ec_districts.dis_id = ec_subdistricts.dis_id');
        $this->db->where('ec_districts.dis_id', $id_districts);
        return $this->db->get()->result_array();
    }

    public function getPostCode($id_kelurahan)
    {
        // var_dump($id_cities);exit;
        $this->db->select('ec_postalcode.postal_id, postal_code');
        $this->db->from('ec_postalcode');
        $this->db->join('ec_subdistricts', 'ec_subdistricts.subdis_id = ec_postalcode.subdis_id');
        $this->db->where('ec_postalcode.subdis_id', $id_kelurahan);
        return $this->db->get()->row();
    }

    public function getnamajenis($id_jenis)
    {
        return $this->db->select('jenis_paket')->where('id_jenis_paket', $id_jenis)->get('ms_jenis_paket')->row();
    }

    public function getnamakatagori($id_kategori)
    {
        return $this->db->select('kategori_paket')->where('id_kategori_paket', $id_kategori)->get('ms_kategori_paket')->row();
    }

    public function cekCust($id_cust)
    {
        $this->db->select('id_customer');
        $this->db->where('id_customer', $id_cust);
        return $this->db->get('ms_customer')->row();
    }

    public function insertcust()
    {
        $data_cust = array(
            'id_customer' => $this->session->userdata('id_cust'),
            'nama_customer' => $this->session->userdata('nama_cust'),
            'telepon_1' => $this->session->userdata('telp_1'),
            'telepon_2' => $this->session->userdata('telp_2'),
        );
        // var_dump($data_cust);exit;
        $this->db->insert('ms_customer',$data_cust);
    }

    public function insertInvoice($qty_total, $detailpaket, $id_trans)
    {
        $status_payment = "";
        if (!empty($this->session->userdata('tgl_pembayaran'))) {
            $status_payment = "paid";
        } else {
            $status_payment = "not paid";
        }

        $tgl_pengiriman ="";
        $tgl_transaksi = date_format(date_create($this->session->userdata('tgl_transaksi')), 'Y-m-d');
        $time_transaksi = date("H:i", strtotime($this->session->userdata('waktu_trans')));
        $date_paid = date_format(date_create($this->session->userdata('tgl_pembayaran')), 'Y-m-d');
        $time_paid = date("H:i", strtotime($this->session->userdata('waktu_pembayaran')));
        if ($time_paid >= "18:00") {
            $tgl_pengiriman = date('Y-m-d', strtotime($date_paid. '+ 4 days'));
            // $date2 = date('l', strtotime($date));
            // if ($date = ) {
            //     # code...
            // }
        } else {
            $tgl_pengiriman = date('Y-m-d', strtotime($date_paid. '+ 3 days'));
        }

        //   $total_detail_paket = json_encode($detailpaket);
        if ($detailpaket != 0) {
            $total_detail_paket=  implode(', ', array_map(function ($entry) {
              return ($entry[key($entry)]);
            }, $detailpaket));
        } else {
            $total_detail_paket = "-";
        }

        $data_invoice = array(
            'id_transaksi' => $id_trans,
            'id_user' => $this->session->userdata('id_user'),
            'id_customer' => $this->session->userdata('id_cust'),
            'id_perusahaan' => $this->session->userdata('id_brand'),
            'id_klinik' => $this->session->userdata('id_klinik'),
            'qty_total' => $qty_total,
            'status_payment' => $status_payment,
            'status_paket' => strtolower($this->session->userdata('status_paket')),
            'status_veryfied' => 'not verified',
            'paid_date' => $date_paid." ".$time_paid,
            'tgl_transaksi' =>  $tgl_transaksi." ".$time_transaksi,
            'start_delivery_date' => $tgl_pengiriman,
            'total_detail_paket' => $total_detail_paket,
            'notes' => $this->session->userdata('remarks')
        );
        // var_dump($this->session->userdata('id_klinik'));exit;

        $this->db->insert('tbl_transaksi', $data_invoice);
    }

    public function getIdTrans()
    {
        $this->db->select('id_transaksi');
        $this->db->from('tbl_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
        $query = $query->row();
        return $query;
        } else {
        return 0;
        }
    }

    public function getKM($destination)
    {
        $origin = "Dermalicious (PT. Bumi Estetika Bahagia Gemilang)";
        $distance_data = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?&origins='.urlencode($origin).'&destinations='.urlencode($destination).'&key=AIzaSyCVGovrV7fEoMc14xk81XXSKDicUhkgWAY');
        $distance_arr = json_decode($distance_data);
            if ($distance_arr->status=='OK') {
                $destination_addresses = $distance_arr->destination_addresses[0];
                $origin_addresses = $distance_arr->origin_addresses[0];
            } else {
            echo "<p>The request was Invalid</p>";
            exit();
            }
        // if ($origin_addresses=="" or $destination_addresses=="") {
        //     echo "<p>Destination or origin address not found</p>";
        //     exit();
        // }
        // Get the elements as array
        $elements = $distance_arr->rows[0]->elements;
        // var_dump($elements);die;
        
        $distance = $elements[0]->distance->text;
        $duration = $elements[0]->duration->text;

        return $distance;
        // echo "From: ".$origin_addresses."<br/> To: ".$destination_addresses."<br/> Distance: <strong>".$distance ."</strong><br/>";
        // echo "Duration: <strong>".$duration."";
    }

    public function insertDetailInvoice($id_trans)
    {
        $cart = $this->cart->contents();
        $tgl_pengiriman ="";
        
        $no= 1;
        // var_dump($cart);exit;
        foreach ($cart as $key) {
            // $km1 = date('Y-m-d',strtotime($key['start_date_paket']));
            if ($key['detail_alamat']['kota_1'] == "") {
                $kota_1=null;
                $kelurahan_1=null;
                $kecamatan_1=null;
            } else {
                $kota_1=$this->getIdKota($key['detail_alamat']['kota_1']);
                $kelurahan_1=$this->getIdKelurahan($key['detail_alamat']['kelurahan_1']);
                $kecamatan_1=$this->getIdKecamatan($key['detail_alamat']['kecamatan_1']);
            }
            // var_dump($kecamatan_1);die;
            if ($key['detail_alamat']['kota_2'] == "") {
                $kota_2=null;
                $kelurahan_2=null;
                $kecamatan_2=null;
            } else {
                $kota_2=$this->getIdKota($key['detail_alamat']['kota_2']);
                $kelurahan_2=$this->getIdKelurahan($key['detail_alamat']['kelurahan_2']);
                $kecamatan_2=$this->getIdKecamatan($key['detail_alamat']['kecamatan_2']);
            }
            if ($key['detail_alamat']['kota_3'] == "") {
                $kota_3=null;
                $kelurahan_3=null;
                $kecamatan_3=null;
            } else {
                $kota_3=$this->getIdKota($key['detail_alamat']['kota_3']);
                $kelurahan_3=$this->getIdKelurahan($key['detail_alamat']['kelurahan_3']);
                $kecamatan_3=$this->getIdKecamatan($key['detail_alamat']['kecamatan_3']);
            }
            $get_id_detail = $this->db->select('id_transaksi_detail')->get_where('tbl_transaksi_detail', ['id_transaksi' => $id_trans, 'jenis_paket' => $key['jenis_paket'], 'kategori_paket' => $key['kategori_paket']]);
            // if ($get_id_detail->num_rows() > 0) {
            //     $id_detail = $get_id_detail->row()->id_transaksi_detail;
            // } else {
                $id_detail = $id_trans.$no;
            // }
            // var_dump($id_detail);die;
            $data = array(
                'id_transaksi_detail' => $id_detail,
                'id_transaksi' => $id_trans,
                'id_customer' => $this->session->userdata('id_cust'),
                'waktu_paket' => $key['waktu_paket'],
                'start_date_periode_paket' => date('Y-m-d', strtotime($key['start_date_paket'])),
                'end_date_periode_paket' => date('Y-m-d', strtotime($key['end_date_paket'])),
                'deskripsi' => $key['deskripsi'],
                // 'end_date_periode_paket' => 
                'kategori_paket' => $key['kategori_paket'],
                'jenis_paket' => $key['jenis_paket'],
                'qty_pemesanan' => $key['qty_paket'],
                'detail_paket' => $key['detail_paket'],
                'periode_paket' => $key['periode_paket'],
                'alamat_1' => $key['detail_alamat']['alamat_1'],
                'kelurahan_1' => $kelurahan_1,
                'kecamatan_1' => $kecamatan_1,
                'kota_1' => $kota_1,
                'maps_1' => $key['detail_alamat']['linkmaps_1'],
                'km_1' => substr($key['detail_alamat']['km_1'], 0, -3),
                'alamat_lengkap_1' => $key['detail_alamat']['alamat_1'].", ".$kelurahan_1.", ".$kecamatan_1.", ".$kota_1,
                'note_pengiriman_1' => $key['detail_alamat']['notepengiriman_1'],
                'alamat_2' => $key['detail_alamat']['alamat_2'],
                'kelurahan_2' => $kelurahan_2,
                'kecamatan_2' => $kecamatan_2,
                'kota_2' => $kota_2,
                'maps_2' => $key['detail_alamat']['linkmaps_2'],
                'alamat_lengkap_2' => $key['detail_alamat']['alamat_2'].", ".$kelurahan_2.", ".$kecamatan_2.", ".$kota_2,
                'km_2' => substr($key['detail_alamat']['km_2'], 0, -3),
                'note_pengiriman_2' => $key['detail_alamat']['notepengiriman_2'],
                'alamat_3' => $key['detail_alamat']['alamat_3'],
                'kelurahan_3' => $kelurahan_3,
                'kecamatan_3' => $kecamatan_3,
                'kota_3' => $kota_3,
                'maps_3' => $key['detail_alamat']['linkmaps_3'],
                'alamat_lengkap_3' => $key['detail_alamat']['alamat_3'].", ".$kelurahan_3.", ".$kecamatan_3.", ".$kota_3,
                'km_3' => substr($key['detail_alamat']['km_3'], 0, -3),
                'note_pengiriman_3' => $key['detail_alamat']['notepengiriman_3'],
                'riwayat_alergi' => $key['riwayat_alergi'],
                'jadwal_pengiriman' => $key['jadwal_pengiriman'],
                'jml_pack_outstanding' => $key['qty_paket'],

            );
            $this->db->insert('tbl_transaksi_detail', $data);
            $no++;
        }
        // var_dump($cart);exit;
    }

    public function insert_customer()
    {
        $id_user = $this->session->userdata('id_user');
        // $data_cust = array(
            // $id_cust = $this->session->userdata('id_customer'),
            // 'nama_cust' => $this->session->userdata('nama_customer'),
            // 'id_brand' => $this->session->userdata('brand'),
            // $id_klinik = $this->session->userdata('id_klinik'),
            // 'telp_1' = $this->session->userdata('telp_1'),
            // 'telp_2' = $this->session->userdata('telp_2'),
            // 'tgl_trans' = $this->session->userdata('tgl_trans'),
            // 'waktu_trans' = $this->session->userdata('waktu_trans'),
            // 'tgl_pembayaran' = $this->session->userdata('tgl_pembayaran'),
            // 'waktu_pembayaran' = $this->session->userdata('waktu_pembayaran'),
        // );
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_customer' => $this->session->userdata('id_customer'),
            'id_klinik' =>$this->session->userdata('id_klinik'),
            'tgl_transaksi' => $this->session->userdata('tgl_trans')." ".$this->session->userdata('waktu_trans'),
            // ''
        );
    }

    private function showTrans()
    {
        $post = $this->input->post();
        // var_dump($this->session->userdata('level'));die;
        $session = $this->session->userdata('level');
        if ($session == "Finance" || $session == "PIC Klinik") {
            $where = array(
                'status_delete' => null
            );
        } else {
            $where = array(
                'status_delete' => null,
                'status_veryfied' => "verified"
            );
        }
        $this->db->select('tbl_transaksi.id_transaksi, ms_perusahaan.nama as nama_brand, nama_klinik, tbl_transaksi.id_customer, nama_customer, status_veryfied, status_payment, paid_date, total_detail_paket, updated_at');
        $this->db->from('tbl_transaksi');
        $this->db->join('ms_klinik', 'tbl_transaksi.id_klinik = ms_klinik.id_klinik');
        $this->db->join('ms_perusahaan', 'tbl_transaksi.id_perusahaan = ms_perusahaan.id_perusahaan');
        $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        // $this->db->join('tbl_transaksi_detail', 'tbl_transaksi.id_transaksi=tbl_transaksi_detail.id_transaksi');
        $this->db->where($where);
        if ($post['nama_cust'] != null) {
            $this->db->like('nama_customer', $post['nama_cust']);
        }
        if ($post['id_cust'] != null) {
            $this->db->where('tbl_transaksi.id_customer', $post['id_cust']);
        }
        // if ($post['kategori'] != null) {
        //     $this->db->where('kategori_paket', $post['kategori']);
        // }
        // if ($post['jenis'] != null) {
        //     $this->db->like('jenis_paket', $post['jenis']);
        // }
        if ($post['id_trans'] != null) {
            $this->db->like('tbl_transaksi.id_transaksi', $post['id_trans']);
        }
        if ($post['verifikasi'] != null) {
            if ($post['verifikasi']=="Lunas") {
                $this->db->like('status_payment', 'paid');
            } else {
                $this->db->like('status_payment', 'not paid');
            }
        }
        // if ($post['periode'] != null) {
        //     $this->db->like('periode_paket', $post['periode']);
        // }
        if ($session == "Finance" && $session == "PIC Klinik") {
            $this->db->order_by('status_veryfied', 'asc');
        } else {
            $this->db->order_by('paid_date', 'desc');
        }
        // $this->db->group_by('tbl_transaksi.id_transaksi');
        // return $this->db->get('tbl_transaksi')->result_array();
    }

    function get_datatables()
	{
		$this->showTrans();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->showTrans();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tbl_transaksi');
		return $this->db->count_all_results();
	}

    public function getTransaksi($id)
    {
        $this->db->join('ms_klinik', 'tbl_transaksi.id_klinik = ms_klinik.id_klinik');
        $this->db->join('ms_perusahaan', 'tbl_transaksi.id_perusahaan = ms_perusahaan.id_perusahaan');
        $this->db->join('ms_user', 'tbl_transaksi.id_user = ms_user.id_user');
        $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        return $this->db->get_where('tbl_transaksi', ['id_transaksi' => $id])->row();
    }

    public function getDetailTransaksi($id)
    {
        // $this->db->select
        return $this->db->get_where('tbl_transaksi_detail', ['id_transaksi' => $id,])->result_array();
    }

    public function getGroupJenisPaket($id_transaksi) {
        $this->db->select('id_transaksi, jenis_paket, count(*) AS c');
        $this->db->from('tbl_transaksi_detail');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->group_by('id_transaksi, jenis_paket');
        $this->db->order_by('c', 'desc');
        return $this->db->get()->result_array();
    }

    public function getDetailTransaksiById($id, $id_detail)
    {
        return $this->db->get_where('tbl_transaksi_detail', ['id_transaksi' => $id, 'id_transaksi_detail' => $id_detail, ])->row();
    }

    public function updateDataTrans($id_trans)
    {
        $post = $this->input->post();

        $data_customer = array(
            'nama_customer' => $post['nama_customer'],
            'telepon_1' => $post['telp_1'],
            'telepon_2' => $post['telp_2'],
        );
        $where_customer = array(
            'id_customer' => $post['id_customer']
        );
        $this->db->where($where_customer);
        $this->db->update('ms_customer', $data_customer);

        $tgl_pembayaran = date('Y-m-d', strtotime($post['tgl_pembayaran']));
        $waktu_bayar = date('H:i', strtotime($post['waktu_pembayaran']));
        $data_transaksi = array(
            'status_paket' => $post['status_paket'],
            'paid_date' => $tgl_pembayaran." ".$waktu_bayar,
            'updated_at' => date('Y-m-d H:i'),
        );
        $where_transaksi = array(
            'id_transaksi' => $id_trans
        );
        $this->db->where($where_transaksi);
        $this->db->update('tbl_transaksi', $data_transaksi);
    }
    
    function getIdKota($id) {
        return $this->db->get_where('ec_cities', ['city_id' => $id])->row()->city_name;
    }
    
    function getIdKecamatan($id) {
        return $this->db->get_where('ec_districts', ['dis_id' => $id])->row()->dis_name;
    }
    
    function getIdKelurahan($id) {
        return $this->db->get_where('ec_subdistricts', ['subdis_id' => $id])->row()->subdis_name;
    }

    public function UpdateDataTransDetail($id_detailtrans)
    {
        $post = $this->input->post();
        
        

        if ($post['kota_1'] == "") {
            $kota_1=null;
            $kelurahan_1=null;
            $kecamatan_1=null;
        } else {
            $kota_1= $this->getIdKota($post['kota_1']);
            $kelurahan_1= $this->getIdKelurahan($post['kelurahan_1']);
            $kecamatan_1= $this->getIdKecamatan($post['kecamatan_1']);
        }
        // var_dump($kota_1);die;
        if ($post['kota_2'] == "") {
            $kota_2=null;
            $kelurahan_2=null;
            $kecamatan_2=null;
        } else {
            $kota_2=$this->getIdKota($post['kota_2']);
            $kelurahan_2=$this->getIdKelurahan($post['kelurahan_2']);
            $kecamatan_2=$this->getIdKecamatan($post['kecamatan_2']);
        }
        if ($post['kota_3'] == "") {
            $kota_3=null;
            $kelurahan_3=null;
            $kecamatan_3=null;
        } else {
            $kota_3=$this->getIdKota($post['kota_3']);
            $kelurahan_3=$this->getIdKelurahan($post['kelurahan_3']);
            $kecamatan_3=$this->getIdKecamatan($post['kecamatan_3']);
        }

        if ($post['kota_1'] == "") {
            $alamat_1 = $post['alamat_1'];
        } else {
            $alamat_1 = $post['alamat_1'].", ".$post['kelurahan_1'].", ".$post['kecamatan_1'].", ".$post['kota_1'];
        }
        if ($post['kota_2'] == "") {
            $alamat_2 = $post['alamat_2'];
        } else {
            $alamat_2 = $post['alamat_2'].", ".$post['kelurahan_2'].", ".$post['kecamatan_2'].", ".$post['kota_2'];
        }
        if ($post['kota_3'] == "") {
            $alamat_3 = $post['alamat_3'];
        } else {
            $alamat_3 = $post['alamat_3'].", ".$post['kelurahan_3'].", ".$post['kecamatan_3'].", ".$post['kota_3'];
        }
        $km1 = $this->getKM($alamat_1);
        $km2 = $this->getKM($alamat_2);
        $km3 = $this->getKM($alamat_3);
        $jadwal_pengiriman =  implode(', ', $post['days']);

        $data_detail_trans = array(
            'waktu_paket' => $post['waktu_paket'],
            'start_date_periode_paket' => date('Y-m-d', strtotime($post['start_date_periode'])),
            'end_date_periode_paket' => date('Y-m-d', strtotime($post['end_date_periode'])),
            'deskripsi' => $post['deskripsi'],
            // 'end_date_periode_paket' => 
            'kategori_paket' => $post['kategori_paket'],
            'jenis_paket' => $post['jenis_paket'],
            'qty_pemesanan' => $post['qty_paket'],
            'detail_paket' => $post['detail_paket'],
            'periode_paket' => $post['periode_paket'],
            'alamat_1' => $post['alamat_1'],
            'kelurahan_1' => $kelurahan_1,
            'kecamatan_1' => $kecamatan_1,
            'kota_1' => $kota_1,
            'maps_1' => $post['linkmaps_1'],
            'km_1' => substr($km1, 0, -3),
            'alamat_lengkap_1' => $alamat_1,
            'note_pengiriman_1' => $post['notepengiriman_1'],
            'alamat_2' => $post['alamat_2'],
            'kelurahan_2' => $kelurahan_2,
            'kecamatan_2' => $kecamatan_2,
            'kota_2' => $kota_2,
            'maps_2' => $post['linkmaps_2'],
            'alamat_lengkap_2' => $alamat_2,
            'km_2' => substr($km2, 0, -3),
            'note_pengiriman_2' => $post['notepengiriman_2'],
            'alamat_3' => $post['alamat_3'],
            'kelurahan_3' => $kelurahan_3,
            'kecamatan_3' => $kecamatan_3,
            'kota_3' => $kota_3,
            'maps_3' => $post['linkmaps_3'],
            'alamat_lengkap_3' => $alamat_3,
            'km_3' => substr($km3, 0, -3),
            'note_pengiriman_3' => $post['notepengiriman_3'],
            'riwayat_alergi' => $post['riwayat_alergi'],
            'jadwal_pengiriman' => $jadwal_pengiriman,

        );

        $data_where = array(
            'id_transaksi' => $post['id_transaksi'],
            'id_transaksi_detail' => $id_detailtrans
        );
        $this->db->where($data_where);
        $status = $this->db->update('tbl_transaksi_detail', $data_detail_trans);
        
        $where_transaksi = array(
            'id_transaksi' => $post['id_transaksi'],
        );
        $status_verif = $this->db->get_where('tbl_transaksi', $where_transaksi)->row()->status_veryfied;
        if ($status_verif == "verified") {
            $data_transaksi = array(
                'updated_at' => date('Y-m-d H:i'),
            );
            $this->db->where($where_transaksi);
            $this->db->update('tbl_transaksi', $data_transaksi);
        }
    }

    public function getdataVerified($id_transaksi)
    {
        // $this->db->select
        return $this->db->get_where('tbl_transaksi_detail', ['id_transaksi' => $id_transaksi, 'status_verification' => 'verified'])->result();
    }
    
    function getAllKategoriPaket() {
        return $this->db->get('ms_kategori_paket')->result_array();
    }
    
    function getAllPeriodePaket() {
        return $this->db->get('ms_periode_paket')->result_array();
    }
    
    function getAllJenisPaket() {
        return $this->db->get('ms_jenis_paket')->result_array();
    }

    // function getAllPeriodePaket() {
    //     return $this->db->get('ms_periode_paket')->result_array();
    // }
    function getLastIdDetail($id_trans) {
        return $this->db->order_by('id_transaksi_detail', 'desc')->get_where('tbl_transaksi_detail', ['id_transaksi' => $id_trans])->row();
    }

    public function insertNewDetailInvoice($id_trans, $id_detail)
    {
        $post = $this->input->post();
        $tgl_pengiriman ="";
        $id_customer = $this->gettransaksi($id_trans)->id_customer;
        $jenis_paket = $this->getnamajenis($post['jenis_paket']);
        $kategori_paket = $this->getnamakatagori($post['kategori_paket']);
        
        if ($post['kota_1'] == "") {
            $kota_1=null;
            $kelurahan_1=null;
            $kecamatan_1=null;
        } else {
            $kota_1=$this->getIdKota($post['kota_1']);
            $kelurahan_1=$this->getIdKelurahan($post['kelurahan_1']);
            $kecamatan_1=$this->getIdKecamatan($post['kecamatan_1']);
        }
        if ($post['kota_2'] == "") {
            $kota_2=null;
            $kelurahan_2=null;
            $kecamatan_2=null;
        } else {
            $kota_2=$this->getIdKota($post['kota_2']);
            $kelurahan_2=$this->getIdKelurahan($post['kelurahan_2']);
            $kecamatan_2=$this->getIdKecamatan($post['kecamatan_2']);
        }
        if ($post['kota_3'] == "") {
            $kota_3=null;
            $kelurahan_3=null;
            $kecamatan_3=null;
        } else {
            $kota_3=$this->getIdKota($post['kota_3']);
            $kelurahan_3=$this->getIdKelurahan($post['kelurahan_3']);
            $kecamatan_3=$this->getIdKecamatan($post['kecamatan_3']);
        }
        
        if ($post['kota_1'] == "") {
            $alamat_1 = $post['alamat_1'];
        } else {
            $alamat_1 = $post['alamat_1'].", ".$kelurahan_1.", ".$kecamatan_1.", ".$kota_1;
        }
        if ($post['kota_2'] == "") {
            $alamat_2 = $post['alamat_2'];
        } else {
            $alamat_2 = $post['alamat_2'].", ".$kelurahan_2.", ".$kecamatan_2.", ".$kota_2;
        }
        if ($post['kota_3'] == "") {
            $alamat_3 = $post['alamat_3'];
        } else {
            $alamat_3 = $post['alamat_3'].", ".$kelurahan_3.", ".$kecamatan_3.", ".$kota_3;
        }
        $km_1 = $this->getKM($alamat_1);
        $km_2 = null;
        $km_3 = null;
        // var_dump($km1);die;

        // var_dump($alamat_3);die;
        if ($alamat_2 != "") {
            $km_2 = $this->getKM($alamat_2);
        }
        if ($alamat_3 != "") {
            $km_3 = $this->getKM($alamat_3);
        }

        $jadwal_pengiriman =  implode(', ', $post['days']); 

            
           
            
            $data = array(
                'id_transaksi_detail' => $id_detail,
                'id_transaksi' => $id_trans,
                'id_customer' => $id_customer,
                'waktu_paket' => $post['waktu_paket'],
                'start_date_periode_paket' => date('Y-m-d', strtotime($post['start_date_periode'])),
                'end_date_periode_paket' => date('Y-m-d', strtotime($post['end_date_periode'])),
                'deskripsi' => $post['deskripsi'],
                // 'end_date_periode_paket' => 
                'kategori_paket' => $kategori_paket->kategori_paket,
                'jenis_paket' => $jenis_paket->jenis_paket,
                'qty_pemesanan' => $post['qty_paket'],
                'detail_paket' => $post['detail_paket'],
                'periode_paket' => $post['periode_paket'],
                'alamat_1' => $post['alamat_1'],
                'kelurahan_1' => $kelurahan_1,
                'kecamatan_1' => $kecamatan_1,
                'kota_1' => $kota_1,
                'maps_1' => $post['linkmaps_1'],
                'km_1' => substr($km_1, 0, -3),
                'alamat_lengkap_1' => $post['alamat_1'].", ".$kelurahan_1.", ".$kecamatan_1.", ".$kota_1,
                'note_pengiriman_1' => $post['notepengiriman_1'],
                'alamat_2' => $post['alamat_2'],
                'kelurahan_2' => $kelurahan_2,
                'kecamatan_2' => $kecamatan_2,
                'kota_2' => $kota_2,
                'maps_2' => $post['linkmaps_2'],
                'alamat_lengkap_2' => $post['alamat_2'].", ".$kelurahan_2.", ".$kecamatan_2.", ".$kota_2,
                'km_2' => substr($km_2, 0, -3),
                'note_pengiriman_2' => $post['notepengiriman_2'],
                'alamat_3' => $post['alamat_3'],
                'kelurahan_3' => $kelurahan_3,
                'kecamatan_3' => $kecamatan_3,
                'kota_3' => $kota_3,
                'maps_3' => $post['linkmaps_3'],
                'alamat_lengkap_3' => $post['alamat_3'].", ".$kelurahan_3.", ".$kecamatan_3.", ".$kota_3,
                'km_3' => substr($km_3, 0, -3),
                'note_pengiriman_3' => $post['notepengiriman_3'],
                'riwayat_alergi' => $post['riwayat_alergi'],
                'jadwal_pengiriman' => $jadwal_pengiriman,

            );
            $this->db->insert('tbl_transaksi_detail', $data);
            // $no++;
        
        // var_dump($cart);exit;
    }
    
    function getHoldDetail($id_trans) {
        return $this->db->get_where('tbl_hold_delivery', ['id_transaksi' => $id_trans])->result_array();
    }
    
    function getOutstandingPack($id) {
        $where = array(
            'id_transaksi' => $id, 
            'status_delivery' => 'Terkirim'
        );
        
        $query = $this->db->select('sum(jml_pack_dikirim) as jml_dikirim')->where($where)->get('tbl_transaksi_pengiriman');
        if ($query->num_rows() > 0) {
            return $query->row()->jml_dikirim;
        } else {
            return 0;
        }
    }
    
    function getAllBrand() {
        return $this->db->get('ms_perusahaan')->result_array();
    }
}