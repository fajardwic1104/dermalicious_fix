<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->model('master/UserModel');
    }

    function index() {
        $data['role'] = $this->UserModel->getrole();
        $this->load->view('master/user/user', $data);
    }

    public function list_user()
    {
        // header('Content-Type: application/json');
        $list = $this->UserModel->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $user) {
            $no++;
            $row = array();
            
            // $row[] = $user['id_user'];
            $row[] = $user['nama_user'];
            $row[] = $user['email_user'];
            $row[] = $user['nama_role'];
            // $row[] = strtoupper($user['status_payment']);
            // $row[] = date('d-M-Y H:i',strtotime($user['paid_date']));
            // $row[] = $user['total_detail_paket'];
            $row[] = "<button class='btn btn-info' onclick='getDetail(this)' data-id='".$user['id_user']."' title='View'><i class='fas fa-eye'></i></button>
                      <button class='btn btn-warning' onclick='getEdit(this)' data-id='".$user['id_user']."' title='Edit'><i class='fas fa-pencil-alt'></i></button>
                      <button onclick=deleteConfirm('".site_url().'master/user/DeleteUser/'.$user['id_user']."' title='Delete') class='btn btn-danger'><i class='fas fa-trash'></i></button>";
            
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->UserModel->count_all(),
            "recordsFiltered" => $this->UserModel->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));
    }

    public function insertUser()
    {
        $post = $this->input->post();
    //    var_dump($post);die;
        $password = "HealthyFood";
        $key = "Dermalicious-Healthy-Food";

        $encrypted_password = $this->encrypt->encode($password, $key);
        

        $data = array(
            'nama_user' => $post['nama_user'],
            'email_user' => $post['email_user'],
            'password' => $password,
        );

        $this->db->insert('ms_user', $data);

        $get_iduser = $this->db->get_where('ms_user', ['email_user' => $post['email_user']])->row();

        $this->db->insert('tbl_role_user', ['id_role' => $post['role_user'], 'id_user' => $get_iduser->id_user]);
        // var_dump($encrypted_password);die;
        redirect('master/user');
    }

    function EditUser() {
        $post = $this->input->post();

        $role = $this->UserModel->getrole();
        $get_user = $this->UserModel->getUser($post['id_user']);
        echo '<form action="'.site_url('master/user/updateDataUser/'.$post['id_user']).'" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="nama_user" type="text" value="'.$get_user->nama_user.'">
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Username/Email</label>
                                <input class="form-control"  name="email_user"type="text" value="'.$get_user->email_user.'">
                                </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control select2" style="width: 100%;" name="role_user">
                                    <option value="'.$get_user->id_role.'">'.$get_user->nama_role.'</option>';
                                        foreach ($role as $key) {
                                            echo '<option value="'.$key->id_role.'">'.$key->nama_role.'</option>';
                                        }
                                echo'</select>
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
        // var_dump($get_user);die;
    }

    function updateDataUser($id_user) {
        // $post = $this->input->post();
        $update = $this->UserModel->update($id_user);

        if ($update == true) {
            $this->session->set_flashdata('success', 'Data Berhasil DiUpdate');
            redirect('master/user');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal DiUpdate, Tolong Periksa Kembali');
            redirect('master/user');
        }
        // var_dump($post);die;
    }

    function DetailUser() {
        $post = $this->input->post();
        
        $role = $this->UserModel->getrole();
        $get_user = $this->UserModel->getUser($post['id_user']);
        echo '<div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="nama_user" type="text" value="'.$get_user->nama_user.'" readonly>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Username/Email</label>
                                <input class="form-control" name="email_user"type="text" value="'.$get_user->email_user.'" readonly>
                                </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Role</label>
                                    <input class="form-control" name="email_user"type="text" value="'.$get_user->nama_role.'" readonly>
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

    function DeleteUser($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_role_user');

        $this->db->where('id_user', $id_user);
        $delete = $this->db->delete('ms_user');

        if ($delete == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            redirect('master/user');
        } else {
            $this->session->set_flashdata('fail', 'Data Gagal Dihapus, Tolong Hubungi Tim IT');
            redirect('master/user');
        }
    }
}

?>