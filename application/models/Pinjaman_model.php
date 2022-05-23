<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pinjaman_model extends CI_Model
{
    public function getRuangan()
    {
        $query = "SELECT * FROM `tb_master_ruangan`";
        return $this->db->query($query)->result();
    }

    public function data_pinjam_ruangan()
    {
        $query = "SELECT * FROM `tb_agenda` JOIN `tb_peminjaman_ruangan` ON `tb_agenda`.`no_peminjaman` = `tb_peminjaman_ruangan`.`no_peminjaman`";
        return $this->db->query($query);
    }
}
