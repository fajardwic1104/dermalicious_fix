<?php


class AksesModel extends CI_Model
{
    public function getAkses($id_role, $menu)
    {
        $this->db->select('ms_role.id_role, tbl_role_menu.id_menu, read, create, edit, delete');
        $this->db->from('ms_role');
        $this->db->join('tbl_role_menu', 'tbl_role_menu.id_role = ms_role.id_role');
        $this->db->join('ms_menu', 'ms_menu.id_menu = tbl_role_menu.id_menu');
        $this->db->where('ms_role.id_role', $id_role);
        $this->db->where('nama_menu', $menu);
        return $this->db->get()->row();
    }
}
