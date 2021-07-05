<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pinjaman_model extends CI_Model
{
    public function getRuangan()
    {
        $query = "SELECT `tipe_ruangan` FROM `tb_master_ruangan`";
        return $this->db->query($query)->result();
    }
}