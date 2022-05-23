<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Permintaanlayanan_model extends CI_Model
{
    public function getpenerimaanhelpdesk($no_permintaan_helpdesk)
    {
        $query = "SELECT `tb_permintaan_layanan`.no_permintaan,`tb_plyn_adm_penerimaan_helpdesk`.* FROM `tb_permintaan_layanan` JOIN `tb_plyn_adm_penerimaan_helpdesk` ON `tb_permintaan_layanan`.no_permintaan = `tb_plyn_adm_penerimaan_helpdesk`.no_permintaan_hlpdsk WHERE no_permintaan_hlpdsk = $no_permintaan_helpdesk";
        return $this->db->query($query)->result_array();
    }

    public function geteskalasi($no_eskalasi)
    {
        $query = "SELECT `tb_permintaan_layanan`.no_permintaan,`tb_plyn_adm_eskalasi`.* FROM `tb_permintaan_layanan` JOIN `tb_plyn_adm_eskalasi` ON `tb_permintaan_layanan`.no_permintaan = `tb_plyn_adm_eskalasi`.no_permintaan_eskls WHERE no_permintaan_eskls = $no_eskalasi";
        return $this->db->query($query)->result_array();
    }

    public function getdistribusi_pekerja($no_distribusI_pekerja)
    {
        $query = "SELECT `tb_permintaan_layanan`.no_permintaan,`tb_plyn_adm_distribusi_pekerja`.* FROM `tb_permintaan_layanan` JOIN `tb_plyn_adm_distribusi_pekerja` ON `tb_permintaan_layanan`.no_permintaan = `tb_plyn_adm_distribusi_pekerja`.no_permintaan_dstrb WHERE no_permintaan_dstrb = $no_distribusI_pekerja";
        return $this->db->query($query)->result_array();
    }

    public function getpemeriksaan_penyerahaan($no_prsk_pnyrh)
    {
        $query = "SELECT `tb_permintaan_layanan`.no_permintaan,`tb_plyn_adm_penyerahaan`.*,`tb_plyn_adm_pemeriksaan`.* FROM `tb_permintaan_layanan` JOIN `tb_plyn_adm_penyerahaan` JOIN `tb_plyn_adm_pemeriksaan` ON `tb_permintaan_layanan`.no_permintaan = `tb_plyn_adm_penyerahaan`.no_permintaan_pnyrh AND `tb_permintaan_layanan`.no_permintaan = `tb_plyn_adm_pemeriksaan`.no_permintaan_prsk WHERE no_permintaan = $no_prsk_pnyrh";
        return $this->db->query($query)->result_array();
    }
}
