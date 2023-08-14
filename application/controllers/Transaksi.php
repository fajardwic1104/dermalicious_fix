<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AksesModel');
        $this->load->model('TransaksiModel');
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }

    public function index()
    {
        $data_cust = array(
            'id_cust', 'nama_cust', 'id_brand', 'id_klinik', 'telp_1', 'telp_2', 'tgl_trans', 'waktu_trans', 'tgl_pembayaran', 'waktu_pembayaran', 'status_paket',
        );
        $test = $this->session->unset_userdata($data_cust);

        $data['kategori'] = $this->TransaksiModel->getAllKategoriPaket();
        $data['periode'] = $this->TransaksiModel->getAllPeriodePaket();
        $data['jenis'] = $this->TransaksiModel->getAllJenisPaket();
        // var_dump($data['kategori']);exit;
        $this->cart->destroy();
        $this->load->view('transaksi/front', $data);
    }

    public function create()
    {
        $id_role = $this->session->userdata('role');
        $method = $this->router->fetch_method();
        $class = $this->router->fetch_class();
        // $get_akses = $this->AksesModel->getakses($id_role, $class."/".$method);

        // if ($get_akses->create == "false") {
        //     $this->session->set_flashdata('false', 'Anda tidak memiliki askes untuk ke halaman selanjutnya');
        //     redirect($class);
        // }
        $cart = $this->cart->contents();
        $qty_total=0;
        foreach ($cart as $key) {
            $qty_total = $key['qty_paket'];
        }
        
        $data['brand'] = $this->TransaksiModel->getAllBrand();
        $data['qty_total'] = $qty_total;
        $data['cart'] = $this->cart->contents();
        // $klinik = $this->TransaksiModell->getklinik()
        // var_dump($data['brand']);die;
        $this->load->view('transaksi/create', $data);
    }

    public function getKlinik()
    {
        $id_perusahaan = $this->input->post('perusahaan');
        $option = $this->TransaksiModel->getklinik($id_perusahaan);
        echo '<option value="">- Pilih Klinik -</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['id_klinik'] . '">' . $opt['nama_klinik'] . '</option>';
        }
    }

    public function dataCustomer()
    {
        $post = $this->input->post();
        
        $nama_klinik = "";
        if (!empty($this->input->post('id_klinik'))) {
            $nama_klinik = $this->TransaksiModel->getnamaklinik($post['id_klinik'])->nama_klinik;
        }
        $tgl_trans = "";
        $tgl_pembayaran = "";
        if ($post['tgl_trans'] == null) {
            $tgl_trans = date('d-m-Y');
        } else {
            $tgl_trans = $post['tgl_trans'];
        }
        if ($post['waktu_trans'] == null) {
            $waktu_trans = date('H:i');
        } else {
            $waktu_trans = $post['waktu_trans'];
        }
        if ($post['tgl_pembayaran'] == null) {
            $tgl_pembayaran = date('d-m-Y');
        } else {
            $tgl_pembayaran = $post['tgl_pembayaran'];
        }
        if ($post['waktu_pembayaran'] == null) {
            $waktu_pembayaran = date('H:i');
        } else {
            $waktu_pembayaran = $post['waktu_pembayaran'];
        }

        // Var_dump($data);exit;
        $data_cust = array(
            'id_cust' => $this->input->post('id_customer'),
            'nama_cust' => $this->input->post('nama_customer'),
            'id_brand' => $this->input->post('brand'),
            'id_klinik' => $this->input->post('id_klinik'),
            'nama_klinik' => $nama_klinik,
            'telp_1' => $this->input->post('telp_1'),
            'telp_2' => $this->input->post('telp_2'),
            'status_paket' => $this->input->post('status_paket'),
            'tgl_trans' => $tgl_trans,
            'waktu_trans' => $waktu_trans,
            'tgl_pembayaran' => $tgl_pembayaran,
            'waktu_pembayaran' => $waktu_pembayaran,
        );
        $session = $this->session->set_userdata($data_cust);
        // $this->cart->insert()

        redirect('transaksi/selectmenu');
    }

    public function selectmenu() {
        $data = array();
        $date_paid = date('Y-m-d', strtotime($this->session->userdata('tgl_pembayaran')));
        $time_paid = date("H:i", strtotime($this->session->userdata('waktu_trans')));
        $libur = $this->db->select('date_holiday')->where('date_holiday >=', $date_paid)->get('ms_holiday')->result_array();
        // var_dump($libur);exit;
        if ($time_paid >= "18:00") {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 1 days'));
            $matchingDates = array();
            $endDate = date('Y-m-d', strtotime('+3 day'.$start_date));
            // $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            do {
                // if (in_array(date('l', strtotime($startDate)),$post['jadwal'])) {
                    $getlibur = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
                    if ($getlibur == 0) {
                // var_dump( $start_date);die;
                        $matchingDates[] = date('Y-m-d', strtotime($start_date));
                    } 
                // }
                if (count($matchingDates) <  4) {
                    $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                        $start_date = date('Y-m-d', strtotime('+1 day'.$start_date));
                } 
                else{
                    break;
                }
                
            } while ($start_date <= $endDate);
            $data['start_date_periode'] = $start_date;
        } else {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 1 days'));
            $start_date_paket = "";
            
            $matchingDates = array();
            $endDate = date('Y-m-d', strtotime('+3 day'.$start_date));
            // $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            do {
                // if (in_array(date('l', strtotime($startDate)),$post['jadwal'])) {
                    $getlibur = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
                    if ($getlibur == 0) {
                // var_dump( $start_date);die;
                        $matchingDates[] = date('Y-m-d', strtotime($start_date));
                    } 
                    // else{
                    //     $start_date = date('Y-m-d', strtotime('+1 day'.$start_date));
                    // }
                // }
                if (count($matchingDates) <  3) {
                    $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                        $start_date = date('Y-m-d', strtotime('+1 day'.$start_date));
                } 
                else{
                    break;
                }
                
            } while ($start_date <= $endDate);
            $data['start_date_periode'] = $start_date;
        }
        
        $data['periode'] = $this->TransaksiModel->getAllPeriodePaket();
        // $data['jenis'] = $this->transaksimodel->getAllJenisPaket();
        $data['jenis_paket'] = $this->TransaksiModel->getJenisPaket();
        $data['kota'] = $this->TransaksiModel->getCities();
        $data['kota2'] = $this->TransaksiModel->getCities();
        $data['kota3'] = $this->TransaksiModel->getCities();
        // $data['start_date_periode'] = $start_date;

        $this->load->view('transaksi/menu_paket', $data);
    }


    public function getKategori()
    {
        $id_jenis = $this->input->post('id_jenis_perusahaan');
        $option = $this->TransaksiModel->getKategoriPaket($id_jenis);
        // var_dump($id_jenis);exit;
        echo '<option value="">-- Pilih Kategori Paket --</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['id_kategori_paket'] . '">' . $opt['kategori_paket'] . '</option>';
        }
    }

    public function getDistricts()
    {
        $id_city = $this->input->post('id_kota');
        $option = $this->TransaksiModel->getDistricts($id_city);
        // var_dump($option);exit;
        echo '<option value="">-- Pilih Kecamatan --</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['dis_id'] . '">' . $opt['dis_name'] . '</option>';
        }
    }

    public function getSubDistricts()
    {
        $id_kecamatan = $this->input->post('id_kecamatan');
        $option = $this->TransaksiModel->getSubDistricts($id_kecamatan);
        // var_dump($option);exit;
        echo '<option value="">-- Pilih Kelurahan --</option>';
        foreach ($option as $opt)
        {
            echo '<option value="' . $opt['subdis_id'] . '">' . $opt['subdis_name'] . '</option>';
        }
    }

    public function getPostCode()
    {
        $id_kelurahan = $this->input->post("id_keluarahan");
        $option = $this->TransaksiModel->getPostCode($id_kelurahan);
        // var_dump($option->postal_code);exit;
        // json_decode($option);
        // echo '<option value="">-- Pilih Kelurahan --</option>';
        // foreach ($option as $opt)
        // {
            if (!empty($option)) {
                echo $option->postal_code;
            } else {
                echo "";
            }
        // }
    }

    public function addToCart()
    {
        $post = $this->input->post();
        $jenis_paket = $this->TransaksiModel->getnamajenis($post['jenis_paket']);
        $kategori_paket = $this->TransaksiModel->getnamakatagori($post['kategori_paket']);

        if ($post['kota_1'] == "") {
            $alamat_1 = $post['alamat_1'];
        } else {
            $kota_1=$this->TransaksiModel->getIdKota($post['kota_1']);
            $kelurahan_1=$this->TransaksiModel->getIdKelurahan($post['kelurahan_1']);
            $kecamatan_1=$this->TransaksiModel->getIdKecamatan($post['kecamatan_1']);
            $alamat_1 = $post['alamat_1'].", ".$kelurahan_1.", ".$kecamatan_1.", ".$kota_1;
        }
        if ($post['kota_2'] == "") {
            $alamat_2 = $post['alamat_2'];
        } else {
            $kota_2=$this->TransaksiModel->getIdKota($post['kota_2']);
            $kelurahan_2=$this->TransaksiModel->getIdKelurahan($post['kelurahan_2']);
            $kecamatan_2=$this->TransaksiModel->getIdKecamatan($post['kecamatan_2']);
            $alamat_2 = $post['alamat_2'].", ".$kelurahan_2.", ".$kecamatan_2.", ".$kota_2;
        }
        if ($post['kota_3'] == "") {
            $alamat_3 = $post['alamat_3'];
        } else {
            $kota_3 = $this->TransaksiModel->getIdKota($post['kota_3']);
            $kelurahan_3 = $this->TransaksiModel->getIdKelurahan($post['kelurahan_3']);
            $kecamatan_3 = $this->TransaksiModel->getIdKecamatan($post['kecamatan_3']);
            $alamat_3 = $post['alamat_3'].", ".$kelurahan_3.", ".$kecamatan_3.", ".$kota_3;
        }
        $km1 = $this->TransaksiModel->getKM($alamat_1);
        // var_dump($post);exit;
        $km2 = null;
        $km3 = null;

        // var_dump($alamat_3);die;
        if ($alamat_2 != "") {
            $km2 = $this->TransaksiModel->getKM($alamat_2);
        }
        if ($alamat_3 != "") {
            $km3 = $this->TransaksiModel->getKM($alamat_3);
        }

        $jadwal_pengiriman =  implode(', ', $post['days']); 
        // var_dump($jadwal_pengiriman);exit;
        // if ($post['kota_1']) {
        //     # code...
        // }
        // $getKM = $this->transactionmodel->getkm($post)
        // var_dump($jadwal_pengiriman);exit;
        $cart = $this->cart->contents();
        $number = 1;
        if(empty($cart)){
            $cart_id= 0;
        } else {
            $cart_id = count($cart);
        }
        $data= array(
            'id' => $cart_id+1,
            'name' => $post['nama_barang'],
            'jenis_paket' => $jenis_paket->jenis_paket,
            'kategori_paket' => $kategori_paket->kategori_paket,
            'waktu_paket' => $post['waktu_paket'],
            'periode_paket' => $post['periode_paket'],
            'qty' => 1,
            'price' => 20000,
            'qty_paket' => $post['qty_paket'],
            'detail_paket' => $post['detail_paket'],
            'riwayat_alergi' => $post['riwayat_alergi'],
            'jadwal_pengiriman' => $jadwal_pengiriman,
            'start_date_paket' => $post['start_date_periode'],
            'end_date_paket' => $post['end_date_periode'],
            'deskripsi' => $post['deskripsi'],

            'detail_alamat' => array(
                'alamat_1' => $post['alamat_1'],
                'kelurahan_1' => $post['kelurahan_1'],
                'kecamatan_1' => $post['kecamatan_1'],
                'kota_1' => $post['kota_1'],
                'linkmaps_1' => $post['linkmaps_1'],
                'km_1' => $km1,
                'notepengiriman_1' => $post['notepengiriman_1'],
                
                'alamat_2' => $post['alamat_2'],
                'kelurahan_2' => $post['kelurahan_2'],
                'kecamatan_2' => $post['kecamatan_2'],
                'kota_2' => $post['kota_2'],
                'linkmaps_2' => $post['linkmaps_2'],
                'km_2' => $km2,
                'notepengiriman_2' => $post['notepengiriman_2'],
                
                'alamat_3' => $post['alamat_3'],
                'kelurahan_3' => $post['kelurahan_3'],
                'kecamatan_3' => $post['kecamatan_3'],
                'kota_3' => $post['kota_3'],
                'km_3' => $km3,
                'linkmaps_3' => $post['linkmaps_3'],
                'notepengiriman_3' => $post['notepengiriman_3'],
            ),
        );
        // $this->cart->insert($data);
        $this->cart->insert($data);
        // $cart = $this->cart->contents();
        // var_dump($cart);exit;

        redirect('transaksi/create');
    }

    public function insert_trans()
    {
        $cart = $this->cart->contents();
        $qty_total=0;
        $check_cust = $this->TransaksiModel->cekcust($this->session->userdata('id_cust'));
        // for ($i=0; $i < count($cart) ; $i++) { 
        //     $total_detail_paket = $cart[$i]['detail_paket'];
        // }
        $post = $this->input->post();
        // var_dump($cart);exit;
        $detailpaket = array();
        foreach ($cart as $key) {
            $qty_total += $key['qty_paket'];
            
            $detailpaket[] = array(
                'total_detail_paket' =>$key['detail_paket']
                );
        }
        
        $id_trans = $this->TransaksiModel->getidtrans();
        if (!empty($id_trans)) {
            $id_trans = $id_trans->id_transaksi + 1;
        } else {
            $id_trans = 1;
        }
        // var_dump($cart);exit;
        $data_cust = array(
            'id_cust' => $this->input->post('id_cust'),
            'nama_cust' => $this->input->post('nama_cust'),
            'id_brand' => $this->input->post('id_brand'),
            'id_klinik' => $this->input->post('id_klinik'),
            'nama_klinik' => $this->input->post('nama_klinik'),
            'telp_1' => $this->input->post('telp_1'),
            'telp_2' => $this->input->post('telp_2'),
            'status_paket' => $this->input->post('status_paket'),
            'tgl_trans' => $this->input->post('tgl_trans'),
            'waktu_trans' => $this->input->post('waktu_trans'),
            'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
            'waktu_pembayaran' => $this->input->post('waktu_pembayaran'),
            'remarks' => $this->input->post('remarks'),
        );
        $this->session->set_userdata($data_cust);
        // var_dump($this->input->post());die;
        // var_dump($this->session->all_userdata());die;
        if (empty($check_cust)) {
            if (empty($cart)) {
                $insert_cust = $this->TransaksiModel->insertcust();
                $insert_invoice = $this->TransaksiModel->insertInvoice($qty_total, $detailpaket, $id_trans);
            } else {
                $insert_cust = $this->TransaksiModel->insertcust();
                $insert_invoice = $this->TransaksiModel->insertInvoice($qty_total, $detailpaket, $id_trans);
                $insert_detail_inv = $this->TransaksiModel->insertdetailinvoice($id_trans);
            }

            redirect('transaksi');
        } else {
            if (empty($cart)) {
                $insert_invoice = $this->TransaksiModel->insertInvoice($qty_total, $detailpaket, $id_trans);
            } else {
                $insert_invoice = $this->TransaksiModel->insertInvoice($qty_total, $detailpaket, $id_trans);
                $insert_detail_inv = $this->TransaksiModel->insertdetailinvoice($id_trans);
            }
            redirect('transaksi');
        }

    }

    public function getEndPeriode()
    {
        $post = $this->input->post();

        $date_end = "";
        $date_start = date('Y-m-d', strtotime($post['start_date_periode']));
        if ($post['periode'] == '2 Minggu') {
            $date_end = date('Y-m-d', strtotime($date_start. '+ 11 days'));
        } elseif ($post['periode'] == '1 Bulan') {
            $date_end = date('Y-m-d', strtotime($date_start. '+ 23 days'));
        } elseif ($post['periode'] == '2 Bulan') {
            $date_end = date('Y-m-d', strtotime($date_start. '+ 47 days'));
        }
        // $n
        // $libur = $this->db->select('date_holiday')->where('date_holiday >=', $date_start)->get('ms_holiday')->result_array();
        $libur = $this->db->select('date_holiday')->get('ms_holiday')->result_array();

        $array_date = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($date_end);
        $realEnd->add($interval);
        
        // var_dump($realEnd);exit;
        $period = new DatePeriod(new DateTime($date_start), $interval, $realEnd);
        
        // $array_date = array();
        foreach($period as $date) {
            $array_date[] = $date->format('Y-m-d');
        }
        $array_holiday = array();
        foreach ($libur as $key) {
            $array_holiday[] = $key['date_holiday'];
        }

        for ($i=0; $i < count($array_date) ; $i++) { 
            if (in_array($array_date[$i],$array_holiday)) {
                $array_date[] = date('Y-m-d', strtotime($date_end. '+ 1 days'));
                // $start_date = date('Y-m-d', strtotime($start_date. '+ 1 days'));
                $date_end = date('Y-m-d', strtotime($date_end. '+ 1 days'));
                // $array_date[] = date('Y-m-d', strtotime($date_end));
            }
        }

        $date_end_periode = date('d-m-Y', strtotime($date_end));
        echo $date_end_periode;
    }

    public function removeFromCart($id)
    {
        $del = $this->cart->remove($id);
        // var_dump($del);die;
        redirect('transaksi/create');
    }

    public function list_transaksi()
    {
        // header('Content-Type: application/json');
        $list = $this->TransaksiModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $transaksi) {
            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
            // $row[] =  '<a class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
            // <a class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> </a>';
            $hour_24 = date('Y-m-d H:i');
            // var_dump($hour_24);die;
            
            // $row[] = "test";
            $row[] = $transaksi['id_transaksi'];
            $row[] = $transaksi['nama_brand'];
            $row[] = $transaksi['nama_klinik'];
            $row[] = $transaksi['id_customer'];
            if (!empty($transaksi['updated_at']) && $transaksi['updated_at'] >= $hour_24) {
                $row[] = "<div class='update warning'>".$transaksi['nama_customer']."</div>";
            } else {
                $row[] = $transaksi['nama_customer'];
            }
            if ($this->session->userdata('level') == "Finance" && $transaksi['status_veryfied'] == "not verified") {
                $row[] = "<div class='update danger'>".strtoupper($transaksi['status_veryfied'])."</div>";
            } else {
                $row[] = strtoupper($transaksi['status_veryfied']);
            }
            $row[] = strtoupper($transaksi['status_payment']);
            $row[] = $transaksi['total_detail_paket'];
            $row[] = date('d-M-Y H:i',strtotime($transaksi['paid_date']));
            if ($this->session->userdata('level') == "Finance") {
                $row[] = "<a href='".site_url('transaksi/detailtransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-info' title='View'><i class='fas fa-eye'></i></a>
                          <a href='".site_url('transaksi/edittransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-warning' title='Edit'><i class='fas fa-pencil-alt'></i></a>
                          <button onclick=deleteConfirm('".site_url().'transaksi/deletetransaksi/'.$transaksi['id_transaksi']."') class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></button>";
            } elseif ($this->session->userdata('level') == "PIC Klinik" && $transaksi['status_veryfied'] == "not verified") {
                $row[] = "<a href='".site_url('transaksi/detailtransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-info' title='View'><i class='fas fa-eye'></i></a>
                          <a href='".site_url('transaksi/edittransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-warning' title='Edit'><i class='fas fa-pencil-alt'></i></a>
                          <button onclick=deleteConfirm('".site_url().'transaksi/deletetransaksi/'.$transaksi['id_transaksi']."') class='btn btn-danger' title='Delete'><i class='fas fa-trash'></i></button>";
            } else {
                $row[] = "<a href='".site_url('transaksi/detailtransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-info' title='View'><i class='fas fa-eye'></i></a>
                          <a href='".site_url('transaksi/edittransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-warning' title='Edit'><i class='fas fa-pencil-alt'></i></a>";
            }
            // else {
                // $row[] = $transaksi['id_transaksi'];
                // $row[] = $transaksi['nama_brand'];
                // $row[] = $transaksi['nama_klinik'];
                // $row[] = $transaksi['id_customer'];
                // $row[] = $transaksi['nama_customer'];
                // $row[] = strtoupper($transaksi['status_veryfied']);
                // $row[] = strtoupper($transaksi['status_payment']);
                // $row[] = date('d-M-Y H:i',strtotime($transaksi['paid_date']));
                // $row[] = $transaksi['total_detail_paket'];
                // $row[] = "<a href='".site_url('transaksi/detailtransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-info'><i class='fas fa-eye'></i></a>
                //           <a href='".site_url('transaksi/edittransaksi/'.$transaksi['id_transaksi'])."' class='btn btn-warning'><i class='fas fa-pencil-alt'></i></a>
                //           <a href='#' class='btn btn-danger'><i class='fas fa-trash'></i></a>";
                # code...
            // }
            // var_dump($hour_24);die;
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->TransaksiModel->count_all(),
            "recordsFiltered" => $this->TransaksiModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    public function detailTransaksi($id)
    {
        $data['transaksi'] = $this->TransaksiModel->gettransaksi($id);
        $data['detail_transaksi'] = $this->TransaksiModel->getdetailtransaksi($id);
        $data['hold'] = $this->TransaksiModel->getHoldDetail($id);
        $data['packdikirim'] = $this->TransaksiModel->getOutstandingPack($id);
        // var_dump($data['packdikirim']);die;

        $qty_total = 0;
        foreach ($data['detail_transaksi'] as $key ) {
            $qty_total += $key['qty_pemesanan'];
        }
        $data['qty_total'] = $qty_total;
        
        // var_dump($data);die;
        $this->load->view('transaksi/detail_trans', $data);
    }

    public function verified($id_trans, $id_detail_trans)
    {
        $post = $this->input->post('verifikasi');

        // $verif = $this->db->query("UPDATE tbl_transaksi SET status_veryfied = '$post' WHERE id_transaksi = $id_trans");
        
        
        // if ($verif == true) {
            $transaksi = $this->TransaksiModel->gettransaksi($id_trans);
            // $group_paket = $this->TransaksiModel->getgroupjenispaket($id_trans);

                $detail_transaksi = $this->TransaksiModel->getdetailtransaksibyid($id_trans, $id_detail_trans);
                // foreach ($detail_transaksi as $detail_transaksi) {
                    $date_start = $detail_transaksi->start_date_periode_paket;
                    
                    $startDate = $date_start;
                    // var_dump($start_date);die;
                    $endDate = date('Y-m-d', strtotime($detail_transaksi->end_date_periode_paket));
                    $jadwal = explode(", ", $detail_transaksi->jadwal_pengiriman);
                    $matchingDates = [];
                    $jml_paket = $detail_transaksi->qty_pemesanan;

                    do {
                        if (in_array(date('l', strtotime($startDate)),$jadwal)) {
                            $getlibur = $this->db->select('date_holiday')->where('date_holiday', $startDate)->get('ms_holiday')->num_rows();
                            if ($getlibur == 0) {
                                $matchingDates[] = date('Y-m-d', strtotime($startDate));
                            }
                        }
                        if (count($matchingDates) <  $jml_paket) {
                            $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                        } 
                        else{
                            break;
                        }
                        $startDate = date('Y-m-d', strtotime('+1 day'.$startDate));
                    } while ($startDate <= $endDate);
                    // var_dump($matchingDates);die;

                    for ($i=0; $i < count($matchingDates) ; $i++) {
                        $jml_lunch = 0;
                        $jml_dinner = 0;
                        if ($detail_transaksi->waktu_paket == 'lunch') {
                            $jml_lunch = 1;
                        } elseif ($detail_transaksi->waktu_paket == 'dinner') {
                            $jml_dinner = 1;
                        } else {
                            $jml_lunch = 1;
                            $jml_dinner = 1;
                        }
                        $jml_kirim = $jml_lunch + $jml_dinner;
                        

                            $data = array(
                                'id_transaksi' => $transaksi->id_transaksi,
                                'id_transaksi_detail' => $detail_transaksi->id_transaksi_detail,
                                'tgl_pengiriman' => $matchingDates[$i],
                                'id_customer' => $transaksi->id_customer,
                                'detail_paket' => $detail_transaksi->detail_paket.", ".$detail_transaksi->kategori_paket,
                                'jml_pack_dikirim' => $jml_kirim,
                                'jml_lunch' =>$jml_lunch,
                                'jml_dinner' => $jml_dinner,
                                'jenis_paket' => $detail_transaksi->jenis_paket
                            );
    
                            $this->db->insert('tbl_transaksi_pengiriman', $data);
    
                    }
                // }
                $data_verification = array(
                    'status_verification' => 'verified'
                );
                $this->db->where('id_transaksi_detail',$id_detail_trans);
                $update_status = $this->db->update('tbl_transaksi_detail', $data_verification);

                $getDataVerified = $this->TransaksiModel->getdataVerified($id_trans);
                $getDataDetail = $this->TransaksiModel->getdetailtransaksi($id_trans);
                // if ($update_status == true) {
                    if (count($getDataVerified) == count($getDataDetail)) {
                        $data_verif = array(
                            'status_veryfied' => 'verified'
                        );
                        $this->db->where('id_transaksi',$transaksi->id_transaksi);
                        $update = $this->db->update('tbl_transaksi', $data_verif);
                        // var_dump($update);die;
                    }
                // }

                $this->session->set_flashdata('success', 'Anda Sudah Melakukan Verifikasi Pada ID Detail '.$id_detail_trans);
        // }
        redirect('transaksi/detailtransaksi/'.$id_trans);
    }

    public function editTransaksi($id_trans)
    {
        $data['transaksi'] = $this->TransaksiModel->gettransaksi($id_trans);
        $data['detail_transaksi'] = $this->TransaksiModel->getdetailtransaksi($id_trans);
        $data['hold'] = $this->TransaksiModel->getHoldDetail($id_trans);

        $qty_total = 0;
        foreach ($data['detail_transaksi'] as $key ) {
            $qty_total += $key['qty_pemesanan'];
        }
        $data['qty_total'] = $qty_total;
        
        // var_dump($data);die;
        $this->load->view('transaksi/edit_trans', $data);
    }

    public function editDetailTransaksi($id_transaksi, $id_detail_transaksi)
    {
        // var_dump($id_transaksi);die;
        $data['detail_transaksi'] = $this->TransaksiModel->getdetailtransaksibyid($id_transaksi, $id_detail_transaksi);
        $data['jenis_paket'] = $this->TransaksiModel->getJenisPaket();
        $data['kota'] = $this->TransaksiModel->getCities();
        $data['kota2'] = $this->TransaksiModel->getCities();
        $data['kota3'] = $this->TransaksiModel->getCities();
        $data['id_detail_trans'] = $id_detail_transaksi;
        $data['periode'] = $this->TransaksiModel->getAllPeriodePaket();
// $data['jenis_paket'] = $this->TransaksiModel->getJenisPaket();

        $this->load->view('transaksi/edit_detail_trans', $data);
    }

    public function updateTrans()
    {
        $post = $this->input->post();
        $this->TransaksiModel->updatedatatrans($post['id_transaksi']);
        // var_dump($post);die;
        redirect('transaksi');
    }
    
    public function updateDetailTrans($id_detail)
    {
        $post = $this->input->post();

        $this->TransaksiModel->updatedatatransdetail($post['id_transaksi']);
        
        redirect('transaksi');
        // var_dump($post);die;
    }

    function getHari() {
        $post = $this->input->post();

        $date_paid = date('Y-m-d', strtotime($this->session->userdata('tgl_pembayaran')));
        $time_paid = date("H:i", strtotime($this->session->userdata('waktu_trans')));
        $libur = $this->db->select('date_holiday')->where('date_holiday >=', $date_paid)->get('ms_holiday')->result_array();
        
        if ($time_paid >= "18:00") {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 1 days'));
            $matching_Dates = array();
            $endDate = date('Y-m-d', strtotime('+3 day'.$start_date));
            // $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            do {
                // if (in_array(date('l', strtotime($startDate)),$post['jadwal'])) {
                    $getlibur = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
                    if ($getlibur == 0) {
                // var_dump( $start_date);die;
                        $matching_Dates[] = date('Y-m-d', strtotime($start_date));
                    } 
                // }
                if (count($matching_Dates) <  4) {
                    $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                        $start_date = date('Y-m-d', strtotime('+1 day'.$start_date));
                } 
                else{
                    break;
                }
                
            } while ($start_date <= $endDate);
            $start_date_periode = $start_date;
        } else {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 1 days'));
            $start_date_paket = "";
            
            $matching_Dates = array();
            $endDate = date('Y-m-d', strtotime('+3 day'.$start_date));
            // $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            do {
                // if (in_array(date('l', strtotime($startDate)),$post['jadwal'])) {
                    $getlibur = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
                    if ($getlibur == 0) {
                // var_dump( $start_date);die;
                        $matching_Dates[] = date('Y-m-d', strtotime($start_date));
                    } 
                    // else{
                    //     $start_date = date('Y-m-d', strtotime('+1 day'.$start_date));
                    // }
                // }
                if (count($matching_Dates) <  3) {
                    $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                        $start_date = date('Y-m-d', strtotime('+1 day'.$start_date));
                } 
                else{
                    break;
                }
                
            } while ($start_date <= $endDate);
            $start_date_periode = $start_date;
        }
        
        // if ($time_paid >= "18:00") {
        //     $start_date = date('Y-m-d', strtotime($date_paid. '+ 4 days'));
        //     $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
        //     if ($date > 0) {
        //         $start_date_periode = date('Y-m-d', strtotime($start_date. '+ 1 days'));
        //     } else {
        //         $start_date_periode = $start_date;
        //     }
        // } else {
        //     $start_date = date('Y-m-d', strtotime($date_paid. '+ 2 days'));
        //     $start_date_paket = "";
        //     $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
        //     if ($date > 0) {
        //         $start_date_periode = date('Y-m-d', strtotime($start_date. '+ 1 days'));
        //     } else {
        //         $start_date_periode = $start_date;
        //     }
        // }

        $startDate = date($start_date_periode);
        $endDate = date('Y-m-d', strtotime('+1 day'. $startDate));
        // $day = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        // $data_darray_day= array_diff($day, $post['jadwal']);

        $matchingDates = [];
        $jml_paket = $post['qty'];

        
            do {
                // var_dump( $endDate);die;
                if (in_array(date('l', strtotime($startDate)),$post['jadwal'])) {
                    $getlibur = $this->db->select('date_holiday')->where('date_holiday', $startDate)->get('ms_holiday')->num_rows();
                    if ($getlibur == 0) {
                        $matchingDates[] = date('Y-m-d', strtotime($startDate));
                    }
                }
                if (count($matchingDates) <  $jml_paket) {
                    $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                } 
                else{
                    break;
                }
                $startDate = date('Y-m-d', strtotime('+1 day'.$startDate));
            } while ($startDate <= $endDate);
        // }
            
        
        // var_dump($jml_paket);die;
        $data['start_periode']=$matchingDates[0];
        $data['end_periode']=$matchingDates[$jml_paket-1];
        
        // var_dump(date('Y-m-d',strtotime($startDate)), date('Y-m-d',strtotime($endDate)));die;
        // var_dump($data);die;
        $this->output->set_output(json_encode($data));
    }

    function deleteTransaksi($id_trans) {
        $data = array(
            'status_delete' => "d"
        );
        $this->db->where('id_transaksi', $id_trans);
        $this->db->update('tbl_transaksi', $data);

        redirect('transaksi');
    }
    
    
    function AddEdit($id_trans) {
        $data['transaksi'] = $this->TransaksiModel->gettransaksi($id_trans);
        $data['kategori'] = $this->TransaksiModel->getAllKategoriPaket();
        $data['periode'] = $this->TransaksiModel->getAllPeriodePaket();
        $data['jenis_paket'] = $this->TransaksiModel->getJenisPaket();
        $data['kota'] = $this->TransaksiModel->getCities();
        $data['kota2'] = $this->TransaksiModel->getCities();
        $data['kota3'] = $this->TransaksiModel->getCities();
        // var_dump($id_trans);die;
        $this->load->view('transaksi/add_detail', $data);
    }

    function getNewHari() {
        $post = $this->input->post();
        
        $date_paid = date('Y-m-d', strtotime($post['tgl_bayar']));
        $time_paid = date("H:i", strtotime($post['waktu_bayar']));
        $libur = $this->db->select('date_holiday')->where('date_holiday >=', $date_paid)->get('ms_holiday')->result_array();
        // var_dump($post);exit;
        if ($time_paid >= "18:00") {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 3 days'));
            $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            if ($date > 0) {
                $start_date_periode = date('Y-m-d', strtotime($start_date. '+ 1 days'));
            } else {
                $start_date_periode = $start_date;
            }
        } else {
            $start_date = date('Y-m-d', strtotime($date_paid. '+ 2 days'));
            $start_date_paket = "";
            $date = $this->db->select('date_holiday')->where('date_holiday', $start_date)->get('ms_holiday')->num_rows();
            if ($date > 0) {
                $start_date_periode = date('Y-m-d', strtotime($start_date. '+ 1 days'));
            } else {
                $start_date_periode = $start_date;
            }
        }

        $startDate = date($start_date_periode);
        $endDate = date('Y-m-d', strtotime('+1 day'. $startDate));
        // $day = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        // $data_darray_day= array_diff($day, $post['jadwal']);

        $matchingDates = [];
        $jml_paket = $post['qty'];

        
            do {
                // var_dump( $endDate);die;
                if (in_array(date('l', strtotime($startDate)),$post['jadwal'])) {
                    $getlibur = $this->db->select('date_holiday')->where('date_holiday', $startDate)->get('ms_holiday')->num_rows();
                    if ($getlibur == 0) {
                        $matchingDates[] = date('Y-m-d', strtotime($startDate));
                    }
                }
                if (count($matchingDates) <  $jml_paket) {
                    $endDate  = date('Y-m-d', strtotime('+1 day'.$endDate));
                } 
                else{
                    break;
                }
                $startDate = date('Y-m-d', strtotime('+1 day'.$startDate));
            } while ($startDate <= $endDate);
        // }
            
        
        // var_dump($matchingDates);die;
        $data['start_periode']=$matchingDates[0];
        $data['end_periode']=$matchingDates[$jml_paket-1];
        
        // var_dump(date('Y-m-d',strtotime($startDate)), date('Y-m-d',strtotime($endDate)));die;
        // var_dump($data);die;
        $this->output->set_output(json_encode($data));
    }

    function insertdetailtrans($id_trans) {
        $post = $this->input->post();
        
        $last_detail_id = $this->TransaksiModel->getLastIdDetail($id_trans);
        if ($last_detail_id == null) {
            $id_detail = $id_trans."1";
        } else {
            $id_detail = $last_detail_id->id_transaksi_detail+1;
        }
        
        $insert = $this->TransaksiModel->insertNewDetailInvoice($id_trans, $id_detail);
        // var_dump($post);die;
        redirect('Transaksi/editTransaksi/'.$id_trans);
    }
    
    public function viewDetailTransaksi($id_transaksi, $id_detail_transaksi)
    {
        $data['detail_transaksi'] = $this->TransaksiModel->getdetailtransaksibyid($id_transaksi, $id_detail_transaksi);
        // var_dump($data['detail_transaksi']);die;
        $data['jenis_paket'] = $this->TransaksiModel->getJenisPaket();
        $data['kota'] = $this->TransaksiModel->getCities();
        $data['kota2'] = $this->TransaksiModel->getCities();
        $data['kota3'] = $this->TransaksiModel->getCities();
        $data['id_detail_trans'] = $id_detail_transaksi;

        $this->load->view('transaksi/view_detail_trans', $data);
    }
    
    // function getOutstandingPaket($id){
    //     $where = array(
    //         'id_transaksi' => $id,
    //         // ''
    //         )
    //     $result = $this->db->select('sum(jml_pack_dikirim) as jml_dikirim')->where($where)->get('tbl_transaksi_pengiriman')->row();
    //     if ($result > 0) {
    //         return $result;
    //     }
    // }
}