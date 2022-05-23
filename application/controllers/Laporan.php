<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./vendor_pdf/fpdf.php');
class PDF extends FPDF
{

  // Page header
  function Header()
  {
    // Line break
    $this->Ln(5);

    //baris 1
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(30, 7, '', 'LTR', 0, 'C', 0);
    $this->Cell(90, 16, 'IZIN KERJA', 'T', 0, 'C', 0);
    $this->Cell(52, 7, 'No.QMS5-SUP05-004-01', 1, 1, 'C');
    //baris 2
    $this->SetFont('Arial', 'B', 25);
    $foto = base_url('assets/img/logo/logo_inti.jpg');
    $fotoasli = $this->Image($foto, 24, 17, 20, 14);
    $this->Cell(30, 7,  $fotoasli, 'LR', 0, 'C', 0);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(90, 14, 'PEKERJAAN BERESIKO TINGGI', 'LR', 0, 'C');
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(26, 7, 'Edisi : 01', 1, 0, 'C');
    $this->Cell(26, 7, 'Revisi : -', 1, 1, 'C');
    //baris 3
    $this->Cell(30, 7, '', 'LBR', 0, 'C');
    $this->SetFont('Arial', 'B', 13);
    $this->Cell(90, 7, '', 'B', 0, 'C');
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(52, 7, 'Halaman ' . $this->PageNo() . ' - 3', 1, 1, 'C');

    // Line break
    $this->Ln(7);
  }

  // Page footer
  function Footer()
  {
    // Position at 1.5 cm from bottom
    $this->SetY(-30);
    // mencetak string
    $this->SetFont('Arial', 'B', 12);
    //baris 1
    $this->Cell(172, 9, 'Penerbit : Fungsi Bagian Umum', 1, 1, 'C', 0);
    //baris 2
    $this->SetFont('Arial', 'B', 8);
    $this->Cell(172, 7, 'Yang memerlukan salinan/copy harus menghubungi bagian umum', 0, 0, 'L', 0);
  }
}



class Laporan extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('pdf');
  }

  public function index($id)
  {
    $data['title'] = 'Laporan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
    $data['complain'] = $this->db->get_where('tb_complain', array('id' => $id, 'status_complain' => 'Selesai', 'status_kerja' => 'Selesai'))->result_array();
    $data['izin'] = $this->db->get_where('tb_izin_kerja', array('id_complain' => $id, 'status_izin_kerja' => 'Selesai'))->result_array();
    $id_izin['id'] = $this->db->select('id')->from('tb_izin_kerja')
      ->where('id_complain', $id)
      ->where('status_izin_kerja', 'Selesai')
      ->get()
      ->result_array();
    $this->load->model('Laporan_model', 'LM');
    $data['JP'] = $this->LM->getallJP($id_izin['id'])->result_array();
    $data['jmlJP'] = $this->LM->getallJP($id_izin['id'])->num_rows();
    $data['TP'] = $this->LM->getallTP($id_izin['id']);
    $data['APD'] = $this->LM->getallAPD($id_izin['id']);
    $data['pekerja'] = $this->LM->getPekerja($id_izin['id']);
    $data['mulai'] = $this->LM->getfotomulai($id_izin['id']);
    $data['akhir'] = $this->LM->getfotoakhir($id_izin['id']);
    $data['master_JP'] = $this->db->get('tb_master_jenis_potensi')->result_array();
    $data['master_TP'] = $this->db->get('tb_master_tindak_pencegahan')->result_array();
    $data['master_APD'] = $this->db->get('tb_master_apd')->result_array();
    $this->load->model('Profile_model', 'PM');
    $data['role_user'] = $this->PM->role_user()->result_array();

    if ($this->session->userdata('role_id') == 3) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('laporan/detail', $data);
      $this->load->view('templates/footer');
    } elseif ($this->session->userdata('role_id') == 4) {

      $this->load->view('templates/user_template/header_user', $data);
      $this->load->view('templates/user_template/navbar_user', $data);
      $this->load->view('umum/pengguna/detail-laporan', $data);
      $this->load->view('templates/user_template/sidebar_modal_user', $data);
      $this->load->view('templates/user_template/footer_user');
    } elseif ($this->session->userdata('role_id') == 2) {

      $this->load->view('templates/user_template/header_user', $data);
      $this->load->view('templates/user_template/navbar_user', $data);
      $this->load->view('umum/pengguna/detail-laporan', $data);
      $this->load->view('templates/user_template/sidebar_modal_user', $data);
      $this->load->view('templates/user_template/footer_user');
    }
  }

  public function pdf($id)
  {
    $data['izin'] = $this->db->get_where('tb_izin_kerja', array('id_complain' => $id, 'status_izin_kerja' => 'Selesai'))->result_array();
    $id_izin['id'] = $this->db->select('id')->from('tb_izin_kerja')
      ->where('id_complain', $id)
      ->where('status_izin_kerja', 'Selesai')
      ->get()
      ->result_array();
    $this->load->model('Laporan_model', 'LM');
    $data['JP'] = $this->LM->getallJP($id_izin['id'])->result_array();
    $data['jmlJP'] = $this->LM->getallJP($id_izin['id'])->num_rows();
    $data['TP'] = $this->LM->getallTP($id_izin['id']);
    $data['APD'] = $this->LM->getallAPD($id_izin['id']);
    $data['pekerja'] = $this->LM->getPekerja($id_izin['id']);
    $jmlpek = $this->LM->jmlPekerja($id_izin['id']);
    $data['mulai'] = $this->LM->getfotomulai($id_izin['id']);
    $data['akhir'] = $this->LM->getfotoakhir($id_izin['id']);
    $data['master_JP'] = $this->db->get('tb_master_jenis_potensi')->result_array();
    $data['master_TP'] = $this->db->get('tb_master_tindak_pencegahan')->result_array();
    $data['master_APD'] = $this->db->get('tb_master_apd')->result_array();

    //catatan penting
    /*
    1. ukuran cell row maksimal 190 cell width 277
    2. margin default 10
    3. $pdf->Cell(row/width,Kolom/height , tulisan, border, line(nextline), align, link);

    lebih lengkap bisa dilihat di vendor/fpdf/doc (berisi Documentation)
    */

    // Ukuran width 172 x height 277
    $pdf = new PDF('p', 'mm', 'A4');
    $pdf->SetMargins(19, 10, 19);

    // membuat halaman baru
    $pdf->AddPage();

    // setting jenis font yang akan digunakana
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(172, 7, 'No :', 0, 1, 'C');

    // Line break
    $pdf->Ln(4);
    $pdf->SetFont('Arial', 'B', 10);

    $data_izin_kerja = $data['izin'];
    foreach ($data_izin_kerja as $dt_izn) {
      // Baris Nomer 1
      $pdf->Cell(8, 6, '1.', 0, 0);
      $pdf->Cell(45, 6, 'Berdasarkan WO/PO No.', 0, 0);
      $pdf->Cell(5, 6, ':', 0, 0);
      $pdf->Cell(97, 6, ' - ', 0, 0);
      $pdf->Cell(17, 6, '(Mohon Lampirkan)', 0, 1, 'R');
      // Baris Nomer 2
      $pdf->Cell(8, 6, '2.', 0, 0);
      $pdf->Cell(45, 6, 'Nama Kontraktor/Tenant', 0, 0);
      $pdf->Cell(5, 6, ':', 0, 0);
      $pdf->Cell(114, 6, $dt_izn['nama_kontraktor'], 0, 1);
      // Baris Nomer 3
      $pdf->Cell(8, 6, '3.', 0, 0);
      $pdf->Cell(45, 6, 'Nama Penanggung Jawab', 0, 0);
      $pdf->Cell(5, 6, ':', 0, 0);
      $pdf->Cell(114, 6, $dt_izn['nama_penanggung_jawab'], 0, 1);
      // Baris Nomer 4
      $pdf->Cell(8, 6, '4.', 0, 0);
      $pdf->Cell(45, 6, 'No. Telpon Kantor', 0, 0);
      $pdf->Cell(5, 6, ':', 0, 0);
      $pdf->Cell(114, 6, $dt_izn['no_telp_kantor'], 0, 0);
    }

    // Line break
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);
    // Table Header Pekerja
    $pdf->Cell(9, 7, 'No', 'LRT', 0, 'C');
    $pdf->Cell(45, 7, 'Nama Pekerja', 1, 0, 'C');
    $pdf->Cell(48, 7, 'Lokasi Pekerja', 1, 0, 'C');
    $pdf->Cell(70, 7, 'Jenis Pekerjaan/Kegiatan', 1, 1, 'C');
    // Isi Table Pekerja
    $pekerja = $data['pekerja'];
    $i = 1;
    $pdf->SetFont('Arial', '', 10);
    foreach ($pekerja as $pkj) {
      $pdf->Cell(9, 7, $i, 1, 'LBR', 'C');
      $pdf->Cell(45, 7, $pkj['nama_pekerja'], 'BR', 0, 'C');
      $pdf->Cell(48, 7, $pkj['lokasi_pekerjaan'], 'BR', 0, 'C');
      $pdf->Cell(70, 7, $pkj['jenis_pekerjaan'], 'BR', 1, 'C');
      $i++;
    }

    $jmlpekerja = $jmlpek;
    // Table Footer Pekerja
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(9, 7, '', 'LBR', 0);
    $pdf->Cell(45, 7, 'Jumlah Tenaga Kerja', 'BR', 0, 'C');
    $pdf->Cell(29, 7, $jmlpekerja, 'BR', 0, 'C');
    $pdf->Cell(19, 7, 'Orang', 'BR', 0, 'C');

    // Line break
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(172, 7, 'Waktu Pelaksanaan Kerja :', 0, 1, 'L');

    // Table Header Pelaksanaan Kerja
    $pdf->Cell(43, 7, 'Hari/Tanggal', 1, 0, 'C');
    $pdf->Cell(43, 7, 'Waktu Mulai', 1, 0, 'C');
    $pdf->Cell(43, 7, 'Waktu Selesai', 1, 0, 'C');
    $pdf->Cell(43, 7, 'Catatan', 1, 1, 'C');
    // Isi Table Pelaksanaan Kerja
    $pelaksanaan_kerja = $data['izin'];
    $pdf->SetFont('Arial', '', 10);
    foreach ($pelaksanaan_kerja as $plk_kerja) {
      $pdf->Cell(43, 7, $plk_kerja['tanggal_dikerjakan'], 'BRL', 0, 'C');
      $pdf->Cell(43, 7, $plk_kerja['waktu_mulai'], 'BR', 0, 'C');
      $pdf->Cell(43, 7, $plk_kerja['waktu_akhir'], 'BTR', 0, 'C');
      $pdf->Cell(43, 7, ' - ', 'BR', 1, 'C');
    }

    // Halaman Detail APD & Something //

    // Membuat Halaman baru
    $pdf->AddPage();

    // Data Jenis Potensi Bahaya (User)
    $jenis_potensi = $data['JP'];
    foreach ($jenis_potensi as $jp) {
      $isi[] = $jp['id_JP'];
    }
    $M_jp = $data['master_JP'];
    foreach ($M_jp as $mjp) {
      $mas[] = $mjp['nama_Jenis_Potensi'];
    }
    $hasil1 = in_array("1", $isi);
    $hasil2 = in_array("2", $isi);
    $hasil3 = in_array("3", $isi);
    $hasil4 = in_array("4", $isi);
    $hasil5 = in_array("5", $isi);
    $hasil6 = in_array("6", $isi);
    $hasil7 = in_array("7", $isi);
    $hasil8 = in_array("8", $isi);

    // Data Tindak Pencegahan (User)
    $tindak_penegahan = $data['TP'];
    foreach ($tindak_penegahan as $tp) {
      $isitp[] = $tp['id_tindak_pencegahan'];
    }
    $M_tp = $data['master_TP'];
    foreach ($M_tp as $mtp) {
      $mastp[] = $mtp['nama_tindak_pencegahan'];
    }
    $hasiltp1 = in_array("1", $isitp);
    $hasiltp2 = in_array("2", $isitp);
    $hasiltp3 = in_array("3", $isitp);
    $hasiltp4 = in_array("4", $isitp);
    $hasiltp5 = in_array("5", $isitp);
    $hasiltp6 = in_array("6", $isitp);
    $hasiltp7 = in_array("7", $isitp);
    $hasiltp8 = in_array("8", $isitp);

    // Data APD (User)
    $alat_pelindung_diri = $data['APD'];
    foreach ($alat_pelindung_diri as $apd) {
      $isiapd[] = $apd['id_APD'];
      $gamapd[] = $apd['gambar_apd'];
    }
    $M_apd = $data['master_APD'];
    foreach ($M_apd as $mapd) {
      $masapd[] = $mapd['nama_APD'];
    }
    $hasilapd1 = in_array("1", $isiapd);
    $hasilapd2 = in_array("2", $isiapd);
    $hasilapd3 = in_array("3", $isiapd);
    $hasilapd4 = in_array("4", $isiapd);
    $hasilapd5 = in_array("5", $isiapd);
    $hasilapd6 = in_array("6", $isiapd);
    $hasilapd7 = in_array("7", $isiapd);
    $hasilapd8 = in_array("8", $isiapd);
    $hasilapd9 = in_array("9", $isiapd);
    $hasilapd10 = in_array("10", $isiapd);
    $hasilapd11 = in_array("11", $isiapd);
    $hasilapd12 = in_array("12", $isiapd);
    $hasilapd13 = in_array("13", $isiapd);
    $hasilapd14 = in_array("14", $isiapd);
    $hasilapd15 = in_array("15", $isiapd);
    $hasilapd16 = in_array("16", $isiapd);
    $hasilapd17 = in_array("17", $isiapd);
    $hasilapd18 = in_array("18", $isiapd);


    // Header Table Potensi Bahaya dan Tindak Pencegahaan
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(9, 7, '', 0, 0, 'C');
    $pdf->Cell(85, 7, 'Jenis Potensi Bahaya Terkait Pekerjaan :', 0, 0, 'L');
    $pdf->Cell(78, 7, 'Tindak Pencegahan : ', 0, 1, 'L');
    $pdf->Ln(3);

    // Isi Data Potensi Bahaya dan Tindak Pencegahaan //
    // Baris 1
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(9, 7, '1.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Mudah Meledak/Eksplosive', 0, 0, 'L');

    if ($hasil1 == true)
      $check1 = "4";
    else $check1 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check1, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '1.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Pengecekan Kebocoran Gas', 0, 0, 'L');

    if ($hasiltp1 == true)
      $checktp1 = "4";
    else $checktp1 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp1, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 2
    $pdf->Cell(9, 7, '2.', '0', 0, 'C');
    $pdf->Cell(59, 7, 'Mudah Terbakar/Flamable', 0, 0, 'L');

    if ($hasil2 == true)
      $check2 = "4";
    else $check2 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check2, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '2.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Menjauhkan Bahan Mudah terbakar', 0, 0, 'L');

    if ($hasiltp2 == true)
      $checktp2 = "4";
    else $checktp2 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp2, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 3
    $pdf->Cell(9, 7, '3.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Bahan Beracun/Toxic', 0, 0, 'L');

    if ($hasil3 == true)
      $check3 = "4";
    else $check3 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check3, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '3.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Memahami MSDS', 0, 0, 'L');

    if ($hasiltp3 == true)
      $checktp3 = "4";
    else $checktp3 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp3, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 4
    $pdf->Cell(9, 7, '4.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Panas/Heat', 0, 0, 'L');

    if ($hasil4 == true)
      $check4 = "4";
    else $check4 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check4, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '4.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Pendinginan/Memakai APD', 0, 0, 'L');

    if ($hasiltp4 == true)
      $checktp4 = "4";
    else $checktp4 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp4, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 5
    $pdf->Cell(9, 7, '5.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Ketinggian/Elevation', 0, 0, 'L');

    if ($hasil5 == true)
      $check5 = "4";
    else $check5 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check5, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '5.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Memakai Body Hardness', 0, 0, 'L');

    if ($hasiltp5 == true)
      $checktp5 = "4";
    else $checktp5 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp5, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 6
    $pdf->Cell(9, 7, '6.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Tegangan Tinggi/High Voltage', 0, 0, 'L');

    if ($hasil6 == true)
      $check6 = "4";
    else $check6 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check6, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '6.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Mematikan Tegangan/Memakai APD', 0, 0, 'L');

    if ($hasiltp6 == true)
      $checktp6 = "4";
    else $checktp6 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp6, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 7
    $pdf->Cell(9, 7, '7.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Bising/Noise', 0, 0, 'L');

    if ($hasil7 == true)
      $check7 = "4";
    else $check7 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check7, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '7.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Meredam Suara/Memakai APD', 0, 0, 'L');

    if ($hasiltp7 == true)
      $checktp7 = "4";
    else $checktp7 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp7, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 8
    $pdf->Cell(9, 7, '8.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Sumber Api/Ignition Source', 0, 0, 'L');
    if ($hasil8 == true)
      $check8 = "4";
    else $check8 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $check8, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '8.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Mematikan Sumber Api', 0, 0, 'L');

    if ($hasiltp8 == true)
      $checktp8 = "4";
    else $checktp8 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checktp8, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');

    // Line break
    $pdf->Ln(12);


    // Header Table APD
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(9, 7, '', 0, 0, 'C');
    $pdf->Cell(163, 7, 'APD yang digunakan :', 0, 1, 'L');
    $pdf->Ln(3);

    // Isi Data APD
    // Baris 1
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(9, 7, '1.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Safety Helmet', 0, 0, 'L');

    if ($hasilapd1 == true)
      $checkapd1 = "4";
    else $checkapd1 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd1, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '10.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Safety Belt', 0, 0, 'L');

    if ($hasilapd10 == true)
      $checkapd10 = "4";
    else $checkapd10 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd10, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 2
    $pdf->Cell(9, 7, '2.', '0', 0, 'C');
    $pdf->Cell(59, 7, 'Safety Shoes', 0, 0, 'L');

    if ($hasilapd2 == true)
      $checkapd2 = "4";
    else $checkapd2 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd2, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '11.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Body Harness', 0, 0, 'L');

    if ($hasilapd11 == true)
      $checkapd11 = "4";
    else $checkapd11 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd11, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 3
    $pdf->Cell(9, 7, '3.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Safety Shoes High Voltage', 0, 0, 'L');

    if ($hasilapd3 == true)
      $checkapd3 = "4";
    else $checkapd3 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd3, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '12.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Baju Tahan Panas', 0, 0, 'L');

    if ($hasilapd12 == true)
      $checkapd12 = "4";
    else $checkapd12 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd12, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 4
    $pdf->Cell(9, 7, '4.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Sarung Tangan Asbes', 0, 0, 'L');

    if ($hasilapd4 == true)
      $checkapd4 = "4";
    else $checkapd4 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd4, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '13.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Masker', 0, 0, 'L');

    if ($hasilapd13 == true)
      $checkapd13 = "4";
    else $checkapd13 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd13, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 5
    $pdf->Cell(9, 7, '5.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Sarung Tangan Plastik', 0, 0, 'L');

    if ($hasilapd5 == true)
      $checkapd5 = "4";
    else $checkapd5 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd5, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '14.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Respirator', 0, 0, 'L');

    if ($hasilapd14 == true)
      $checkapd14 = "4";
    else $checkapd14 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd14, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 6
    $pdf->Cell(9, 7, '6.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Sarung Tangan Katun', 0, 0, 'L');

    if ($hasilapd6 == true)
      $checkapd6 = "4";
    else $checkapd6 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd6, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '15.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Jaket Pelampung', 0, 0, 'L');

    if ($hasilapd15 == true)
      $checkapd15 = "4";
    else $checkapd15 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd15, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 7
    $pdf->Cell(9, 7, '7.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Safety Googles', 0, 0, 'L');

    if ($hasilapd7 == true)
      $checkapd7 = "4";
    else $checkapd7 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd7, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '16.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Ear Plug', 0, 0, 'L');

    if ($hasilapd16 == true)
      $checkapd16 = "4";
    else $checkapd16 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd16, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 8
    $pdf->Cell(9, 7, '8.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Welding Helmet', 0, 0, 'L');

    if ($hasilapd8 == true)
      $checkapd8 = "4";
    else $checkapd8 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd8, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '17.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Ear Muff', 0, 0, 'L');

    if ($hasilapd17 == true)
      $checkapd17 = "4";
    else $checkapd17 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd17, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Baris 9
    $pdf->Cell(9, 7, '9.', 0, 0, 'C');
    $pdf->Cell(59, 7, 'Kacamata Las', 0, 0, 'L');

    if ($hasilapd9 == true)
      $checkapd9 = "4";
    else $checkapd9 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd9, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 0, 'C');
    $pdf->Cell(9, 7, '18.', 0, 0, 'C');
    $pdf->Cell(62, 7, 'Sepatu Bot', 0, 0, 'L');

    if ($hasilapd18 == true)
      $checkapd18 = "4";
    else $checkapd18 = "";
    $pdf->SetFont('ZapfDingbats', '', 10);
    $pdf->Cell(13, 7, $checkapd18, 'TBLR', 0, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(4, 7, '', 0, 1, 'C');
    $pdf->Ln(1.5);

    // Membuat Halaman baru
    $pdf->AddPage();

    // Header Halaman Catatan
    $pdf->SetFont('Arial', 'BU', 12);
    $pdf->Cell(172, 7, 'CATATAN :', 0, 1, 'L');
    $pdf->Ln(3);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(163, 7, 'Pekerjaan yang mengeluarkan / menimbulkan bunga api perlu disediakan APAR.', 0, 1, 'L');
    $pdf->Ln(1.5);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(163, 5, 'Patuhi aturan K3 dan hal-hal yang menimbulkan dampak lingkungan, apabila tidak mematuhi maka pihak PT INTI berhak menghentikan pekerjaan tesebut', 0, 1);
    $pdf->Ln(1.5);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(163, 7, 'Setiap tamu yang akan bekerja harus membawa perlatan safety.', 0, 1, 'L');
    $pdf->Ln(1.5);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(163, 5, 'Pihak PT INTI tidak bertanggung jawab atas kecelakaan yang disebabkan oleh kelalaian tamu. Apabila pekerjaan tersebut merugikan perlatan fisik atau gedung, maka tamu tersebut wajib melakukan ganti rugi.', 0, 1);
    $pdf->Ln(1.5);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(163, 7, 'Form ijin kerja yang diterbitkan hanya berlaku 1x24 jam.', 0, 1, 'L');
    $pdf->Ln(1.5);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(163, 5, 'Dilarang keras memberikan tip/uang suap pada petugas, pihak PT INTI tidak mengenakan biaya apapun atas pengurusan izin kerja ini.', 0, 1);
    $pdf->Ln(1.5);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->MultiCell(163, 5, 'Apabila pekerjaan dilaksanakan diluar jam kerja maka registrasi dan inspeksi akan dilakukan oleh security.', 0, 1);
    $pdf->Ln(1.5);

    $pdf->SetFont('ZapfDingbats', '', 7);
    $pdf->Cell(9, 7, 'l', 0, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(163, 7, 'Selesai bekerja lokasi harus bersih dan wajib lapor pada security / urusan terkait.', 0, 1, 'L');
    $pdf->Ln(7);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(172, 7, 'Bandung, ......................................', 0, 1, 'R');
    $pdf->Ln(4);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(57.3, 7, 'Pemohon,', 0, 0, 'C');
    $pdf->Cell(57.3, 7, 'Mengetahui,', 0, 0, 'C');
    $pdf->Cell(57.3, 7, 'Diperiksa Oleh :', 0, 1, 'C');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(57.3, 7, 'Penangung Jawab,', 0, 0, 'C');
    $pdf->Cell(57.3, 7, 'Keamanan PT INTI', 0, 0, 'C');
    $pdf->Cell(57.3, 7, 'Officer Umum', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(57.3, 7, 'Pekerjaan / Pihak ketiga', 0, 0, 'C');
    $pdf->Cell(114.7, 7, '', 0, 1);
    $pdf->Ln(25);

    $pdf->SetFont('Arial', 'BU', 10);
    $foto1 = base_url('assets/img/ttd/') . $data['izin'][0]['ttd'];
    if ($foto1 != base_url('assets/img/ttd/')) {
      $fotottd = $pdf->Image($foto1, 29, 180, 30, 30);
    } else {
      $fotottd = '';
    }

    $pdf->Cell(57.3, 7, $fotottd, 0, 0, 'C');
    $pdf->Cell(57.3, 7, '', 0, 0, 'C');
    $pdf->Cell(57.3, 7, '', 0, 1, 'C');
    $pdf->Ln(1);

    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(57.3, 7, 'Peter Quill', 0, 0, 'C');
    $pdf->Cell(57.3, 7, '......................................', 0, 0, 'C');
    $pdf->Cell(57.3, 7, '......................................', 0, 1, 'C');
    $pdf->Ln(4);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(114.7, 7, '', 0, 0);
    $pdf->Cell(57.3, 7, 'Disetujui Oleh :', 0, 1, 'C');
    $pdf->Ln(2);
    $pdf->Cell(114.7, 7, '', 0, 0);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(57.3, 7, 'Sekertaris P2K3', 0, 1, 'C');
    $pdf->Ln(23);

    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(114.7, 7, '', 0, 0, 'C');
    $pdf->Cell(57.3, 7, '......................................', 0, 1, 'C');
    $pdf->Ln(4);


    $pdf->Output();
  }
}
