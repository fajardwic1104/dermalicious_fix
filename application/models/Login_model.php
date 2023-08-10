<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Login_model extends CI_Model
{
  public function getUsername($username)
  {
    $this->db->select('ms_user.id_user, email_user, nama_user, password, ms_role.id_role, nama_role');
    $this->db->from('ms_user');
    $this->db->join('tbl_role_user', 'ms_user.id_user = tbl_role_user.id_user');
    $this->db->join('ms_role', 'ms_role.id_role = tbl_role_user.id_role');
    $this->db->where('ms_user.email_user', $username);
		return $this->db->get()->row();
  }

  public function cekRef($ref)
  {
    $this->db->where('kode_referral', $ref);
    $query = $this->db->get('user');

    if ($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function cekTelp($tel)
  {
    $length = strlen($tel);
    if (substr($tel, 0,2) == "62") {
      $telp = substr($tel, 2);
    } elseif (substr($tel, 0,2) == "08") {
      $telp = substr($tel, 1);
    } elseif (substr($tel, 0,1) == "8") {
      $telp = substr($tel, 0);
    } else {
      $telp = substr($tel, 2);
    }
    $this->db->like('telp_user', $telp);
    $this->db->where('id_akun !=', 1);
    $query = $this->db->get('user');

    if ($query->num_rows() > 0) {
      return false;
    } else {
      return true;
    }
  }

//   public function addUser($nama, $email, $password, $referral)
//   {
//     $this->id_user = $this->_getNewId()->id_user + 1;
//     $id = $this->id_user;
//     $tgl = date('Y-m-d');

//     $temp = 1;

//     if (strlen($nama) >= 3) {
//       $ref = strtoupper(substr($nama,0,3)).str_pad($temp, 3, 0, STR_PAD_LEFT);
//       $ref = $this->_getRef($ref);
//       while ($ref == false) {
//         $temp = $temp + 1;
//         $ref = strtoupper(substr($nama,0,3)).str_pad($temp, 3, 0, STR_PAD_LEFT);
//         $ref = $this->_getRef($ref);
//       }
//     } else {
//       if (strlen($nama) == 2) {
//         $ref = strtoupper(substr($nama,0,2)).str_pad($temp, 4, 0, STR_PAD_LEFT);
//         $ref = $this->_getRef($ref);
//         while ($ref == false) {
//           $temp = $temp + 1;
//           $ref = strtoupper(substr($nama,0,2)).str_pad($temp, 4, 0, STR_PAD_LEFT);
//           $ref = $this->_getRef($ref);
//         }
//       } elseif (strlen($nama) == 1) {
//         $ref = strtoupper(substr($nama,0,1)).str_pad($temp, 5, 0, STR_PAD_LEFT);
//         $ref = $this->_getRef($ref);
//         while ($ref == false) {
//           $temp = $temp + 1;
//           $ref = strtoupper(substr($nama,0,1)).str_pad($temp, 5, 0, STR_PAD_LEFT);
//           $ref = $this->_getRef($ref);
//         }
//       }
//     }

//     if (!empty($ref)) {
//       $data = array('id_user' => $id,
//                     'nama_user' => $nama,
//                     'kode_referral' => $ref,
//                     'email_user' => $email,
//                     'password_user' => $password,
//                     'tgl_masuk' => $tgl,
//                     'status_user' => 'nonaktif',
//                     'referensi' => $referral,
//                     'id_akun' => '2'
//                     );

//       $this->db->insert('user', $data);

//       return true;
//     } else {
//       return false;
//     }
//   }

//   public function aktivasiAkun($id)
//   {
//     $post = $this->input->post();
//     $tempat = $post['tempat'];
//     $tgllahir = $post['tgllahir'];
//     $desa = $post['des'];
//     $alamat = $post['alamat'];
//     $tlp = $post['tlp'];
//     $id_bank = $post['id_bank'];
//     $rek = $post['rek'];
//     $ket = $post['ket'];

//     $this->db->query("UPDATE user SET desa_id = '$desa', alamat_user = '$alamat', kabupaten_id = '$tempat', tgl_lahir = '$tgllahir', telp_user = '$tlp', status_user = 'aktif', id_bank = '$id_bank', nama_rekening = '$ket', no_rekening = '$rek' WHERE id_user = '$id'");

//     return $tlp;
//   }


  private function _getNewId()
  {
    $this->db->select('id_user');
    $this->db->from('user');
    $this->db->order_by('id_user', 'desc');

    $query = $this->db->get()->row();

    return $query;
  }

//   public function getBank()
//   {
//     $this->db->select('*');
//     $this->db->from('bank');
//     $this->db->where('status_bank', 'aktif');

//     $query = $this->db->get()->result();

//     return $query;
//   }

//   public function getProv() {
//     $this->db->order_by('nama');
//     $prov = $this->db->get('wilayah_provinsi')->result_array();
//     return $prov;
//   }

//   public function getKab() {
//     $this->db->order_by('nama');
//     $kab = $this->db->get('wilayah_kabupaten')->result_array();
//     return $kab;
//   }

//   public function getKec() {
//     $this->db->order_by('nama');
//     $kec = $this->db->get('wilayah_kecamatan')->result_array();
//     return $kec;
//   }

//   public function getDes() {
//     $this->db->order_by('nama');
//     $des = $this->db->get('wilayah_desa')->result_array();
//     return $des;
//   }

//   public function getKabById($id_prov) {
//     $this->db->where('provinsi_id', $id_prov);
//     $this->db->order_by('nama');
//     $kab = $this->db->get('wilayah_kabupaten')->result_array();
//     return $kab;
//   }

//   public function getKecById($id_kab) {
//     $this->db->where('kabupaten_id', $id_kab);
//     $this->db->order_by('nama');
//     $kec = $this->db->get('wilayah_kecamatan')->result_array();
//     return $kec;
//   }

//   public function getDesById($id_kec) {
//     $this->db->where('kecamatan_id', $id_kec);
//     $this->db->order_by('nama');
//     $des = $this->db->get('wilayah_desa')->result_array();
//     return $des;
//   }
}

?>
