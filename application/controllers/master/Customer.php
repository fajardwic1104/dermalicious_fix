<?php

class Customer extends CI_Controller
{
    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://103.11.135.246:1508/derma-esthetic-api/getCustomer?api_key=Cx7RouVO11DDx1OHuLuJkwXRL81abb";
        $this->load->library('Curl');
        $this->load->model('master/CustomerModel');
    }

    public function get_customer()
    {
        $get_cust = json_decode($this->curl->simple_get('http://103.11.135.246:1508/derma-esthetic-api/getCustomer?api_key=Cx7RouVO11DDx1OHuLuJkwXRL81abb&page=6'));

        $data_cust = $get_cust->data;
        $page = $get_cust->total_page;
        // var_dump($data_cust);exit;
        // $available_cust = $
        for ($i=0; $i < count($data_cust) ; $i++) { 
            
            $id_customer = $data_cust[$i]->CUSTOMER_ID;
            $nama_customer = $data_cust[$i]->CUSTOMER_NAME;
            $telephone = $data_cust[$i]->TELEPHONE;           
            
            $data[] = array(
                'id_customer' => $id_customer,
                'nama_customer' => $nama_customer,
                'telepon_1' => $telephone,
                'telepon_2' => $telephone,
            );
        }
        // var_dump($data);exit;
        // $hasil = $this->db->insert_batch('ms_customer', $data);
        // echo $hasil;
        
        // $this->load->view('master/customer/front', $data);
    }

    function index() {
        // $data['brand'] = $this->CustomerModel->getPerusahaan();
        $this->load->view('master/customer/front');
    }

    // function addKlinik() {
    //     $this->load->view('master/klinik/klinik_add');
    // }

    public function list_customer()
    {
        // header('Content-Type: application/json');
        $list = $this->CustomerModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $cus) {
            $no++;
            $row = array();
            
            $row[] = $cus['id_customer'];
            $row[] = $cus['nama_customer'];
            $row[] = $cus['telepon_1'];
            $row[] = $cus['telepon_2'];
            $row[] = "<button class='btn btn-warning' onclick='getEdit(this)' data-id='".$cus['id_customer']."' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/customer/Delete/'.$cus['id_customer']."' title='Delete') class='btn btn-danger'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->CustomerModel->count_all(),
            "recordsFiltered" => $this->CustomerModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    function DetailUser() {
        $post = $this->input->post();
        
        $get_klinik = $this->CustomerModel->getKlinik($post['id_klinik']);
        echo '<div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Nama Klinik</label>
                                <input class="form-control" name="nama_user" type="text" value="'.$get_klinik->nama_klinik.'" readonly>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Nama Brand</label>
                                <input class="form-control" name="email_user"type="text" value="'.$get_klinik->nama_brand.'" readonly>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>';
            // var_dump($get_user);die;
    }

    function Edit() {
        $post = $this->input->post();

        // $brand = $this->CustomerModel->getPerusahaan();
        // var_dump($brand);die;
        $get_cust = $this->CustomerModel->getCustomer($post['id']);
        echo '<form action="'.site_url('master/customer/updateData/'.$post['id']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <input class="form-control" name="nama_customer" type="text" value="'.$get_cust->nama_customer.'">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Whatsapp</label>
                                    <input class="form-control" maxlength="13" onkeypress="return hanyaAngka(event)" name="whatsapp" type="text" value="'.$get_cust->telepon_1.'">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input class="form-control" maxlength="13" onkeypress="return hanyaAngka(event)" name="telepon" type="text" value="'.$get_cust->telepon_2.'">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
              </form>';
    }

    function updateData($id) {
        $post = $this->input->post();
        $data = array(
            'nama_customer' => $post['nama_customer'],
            'telepon_1' => $post['whatsapp'],
            'telepon_2' => $post['telepon'],
        );
        $this->db->where('id_customer', $id);
        $update = $this->db->update('ms_customer', $data);
        if ($update == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/customer');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/customer');
        }
    }

    function insert() {
        $post = $this->input->post();
        // var_dump($post);die;
        $data = array(
            'id_customer' => $post['id_customer'],
            'nama_customer' => $post['nama_customer'],
            'telepon_1' => $post['whatsapp'],
            'telepon_2' => $post['telepon'],
        );
        $insert = $this->db->insert('ms_customer', $data);
        
        if ($insert == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiTambahkan');
            redirect('master/customer');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiTambah, Tolong Periksa Kembali');
            redirect('master/customer');
        }
    }

    function Delete($id) {
        // $this->db->where('id_klinik', $id);
        // $this->db->delete('tbl_klinik_perusahaan');

        $this->db->where('id_customer', $id);
        $delete = $this->db->delete('ms_customer');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/customer');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/customer');
        }
    }
}