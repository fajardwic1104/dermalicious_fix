<?php

final class MasterMenu extends CI_Controller
{
    function __construct() {
        parent::__construct();
        if ($this->session->userdata('id_user') == null ) {
            redirect('login/logout');
        }
    }
    function index() {
        $this->load->view('master/master_front');
    }

	public function Holiday()
	{
		$this->load->view('master/holiday');
	}

    public function HolidayAdd()
    {
        $this->load->view('master/holiday_add');
    }

	public function StatusPaket()
    {
        $this->load->view('master/status_paket');
    }

	public function StatusPaketAdd()
    {
        $this->load->view('master/status_paket_add');
    }

	public function PeriodePaket()
    {
        $this->load->view('master/periode_paket');
    }

	public function PeriodePaketAdd()
    {
        $this->load->view('master/periode_paket_add');
    }

	public function KategoriPaket()
    {
        $this->load->view('master/kategori_paket');
    }

	public function KategoriPaketAdd()
    {
        $this->load->view('master/kategori_paket_add');
    }

	public function JenisPaket()
    {
        $this->load->view('master/jenis_paket');
    }

	public function JenisPaketAdd()
    {
        $this->load->view('master/jenis_paket_add');
    }

	public function HargaPaket()
    {
        $this->load->view('master/harga_paket');
    }

	public function HargaPaketAdd()
    {
        $this->load->view('master/harga_paket_add');
    }

	public function Brand()
    {
        $this->load->view('master/brand');
    }

	public function BrandAdd()
    {
        $this->load->view('master/brand_add');
    }

	public function Menu()
    {
        $this->load->view('master/menu');
    }

	public function MenuAdd()
    {
        $this->load->view('master/menu_add');
    }

	public function Klinik()
    {
        $this->load->view('master/klinik');
    }

	public function KlinikAdd()
    {
        $this->load->view('master/klinik_add');
    }

	public function Pelanggan()
    {
        $this->load->view('master/pelanggan');
    }

	public function PelangganAdd()
    {
        $this->load->view('master/pelanggan_add');
    }

	public function User()
    {
        $this->load->view('master/user');
    }

	public function UserAdd()
    {
        $this->load->view('master/user_add');
    }
}