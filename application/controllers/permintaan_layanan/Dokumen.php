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
        $this->Cell(90, 16, 'FOLMULIR', 'T', 0, 'C', 0);
        $this->Cell(52, 7, 'No.QMS5-SUP05-004-01', 1, 1, 'C');
        //baris 2
        $this->SetFont('Arial', 'B', 25);
        $foto = base_url('assets/img/logo/logo_inti.jpg');
        $fotoasli = $this->Image($foto, 24, 17, 20, 14);
        $this->Cell(30, 7,  $fotoasli, 'LR', 0, 'C', 0);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(90, 14, 'LAYANAN UMUM DAN PROPERTI', 'LR', 0, 'C');
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
        $this->Cell(172, 9, 'Penerbit : Bagian Umum dan Properti', 1, 1, 'C', 0);
    }
}



class Dokumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }


    public function pdf($no_permintaan, $email)
    {
        //Mengambil data dari model
        $this->load->model('Permintaanlayanan_model', 'PRMLYN');

        //Data Penerimaan Helpdesk
        $data['data_helpdesk'] = $this->PRMLYN->getpenerimaanhelpdesk($no_permintaan);

        //Data Eskalasi
        $data['data_eskalasi'] = $this->PRMLYN->geteskalasi($no_permintaan);

        //Data Distribusi Pekerja
        $data['data_distribusi_pekerja'] = $this->PRMLYN->getdistribusi_pekerja($no_permintaan);

        //Data Penyerahaan dan Pemeriksaan
        $data['data_pemeriksaan_penyerahaan'] = $this->PRMLYN->getpemeriksaan_penyerahaan($no_permintaan);

        //Data Permintaan Layanan
        $data['data_permintaan'] = $this->db->get_where('tb_permintaan_layanan', ['no_permintaan' => $no_permintaan])->result_array();

        //Data Permintaan User
        $data['data_user'] = $this->db->get_where('detail_user', ['email' => $email])->result_array();


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

        $pdf->SetFont('Arial', 'UB', 11);
        $pdf->Cell(172, 8, 'PERMINTAAN JASA PELAYANAN UMUM', '', 1, 'C');
        $pdf->Ln(3);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(45, 6, 'No. Inventaris', '', 0, 'L');
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(119, 6, '', 0, 0, 'L');
        $pdf->Cell(4, 6, '', '', 1, 'C');

        $data_user = $data['data_user'];
        foreach ($data_user as $dt_usr) {

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Nama', '', 0, 'L');
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(119, 6, $dt_usr['nama'], 0, 0, 'L');
            $pdf->Cell(4, 6, '', '', 1, 'C');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'NIP', '', 0, 'L');
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(119, 6, $dt_usr['nip'], 0, 0, 'L');
            $pdf->Cell(4, 6, '', '', 1, 'C');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Divisi', '', 0, 'L');
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(119, 6, $dt_usr['divisi'], 0, 0, 'L');
            $pdf->Cell(4, 6, '', '', 1, 'C');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Telp.Ext', '', 0, 'L');
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(119, 6, $dt_usr['nomer_telepon'], 0, 0, 'L');
            $pdf->Cell(4, 6, '', '', 1, 'C');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Email', '', 0, 'L');
            $pdf->Cell(4, 6, ':', '', 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(119, 6, $dt_usr['email'], 0, 0, 'L');
            $pdf->Cell(4, 6, '', '', 1, 'C');
        }

        $data_permintaan = $data['data_permintaan'];
        foreach ($data_permintaan as $dt_prmnt) {

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Deskripsi', '', 'J');
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->Cell(123, 6, '', '', 1);
            $pdf->SetFont('Arial', '', 10);
            $pdf->MultiCell(172, 6,  $dt_prmnt['deskripsi'], '', 'J');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Pelaksana Pekerjaan', '', 0, 'L');
            $pdf->Cell(4, 6, ':', 0, 0);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(119, 6, $dt_prmnt['nama_atasan'], 0, 0, 'L');
            $pdf->Cell(4, 6, '', '', 1, 'C');
            $pdf->Ln(5);
        };


        $data_penyerahan_pemeriksaan = $data['data_pemeriksaan_penyerahaan'];
        foreach ($data_penyerahan_pemeriksaan as $dt_pnyrh_prmsk) {

            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(172, 8, 'PEMERIKSAAN', 'LTBR', 1, 'C');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Hasil Pemeriksaan', 'L', 0, 'L');
            $pdf->Cell(127, 6, ':', 'R', 1);
            $pdf->SetFont('Arial', '', 9);
            $pdf->MultiCell(172, 6, $dt_pnyrh_prmsk['hasil_pemeriksaan'], 'RL', 'J');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Usulan Solusi', 'L', 0, 'L');
            $pdf->Cell(127, 6, ':', 'R', 1);
            $pdf->SetFont('Arial', '', 9);
            $pdf->MultiCell(172, 6, $dt_pnyrh_prmsk['usulan_solusi'], 'RLB', 'J');

            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(172, 8, 'SERAH TERIMA', 'LBR', 1, 'C');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Catatan Pemeliharaan', 'L', 0, 'L');
            $pdf->Cell(127, 6, ':', 'R', 1);
            $pdf->SetFont('Arial', '', 9);
            $pdf->MultiCell(172, 6, $dt_pnyrh_prmsk['catatan_pemeliharaan'], 'RL', 'J');

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(45, 6, 'Total Biaya', 'BL', 0, 'L');
            $pdf->Cell(4, 6, ':', 'B', 0, 'L');
            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(123, 6, 'Rp. ' . $dt_pnyrh_prmsk['total_biaya'], 'BR', 1, 'L');

            // Membuat Posisi FIX (Tanda Tangan)
            $pdf->Ln(4);
            $atasbawah = $pdf->SetY(222);
            $kirikanan = $pdf->SetX(30);
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell($atasbawah, $kirikanan, '', 0, 1, 'C', 0);

            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(86, 7, 'Tanggal : ' . $dt_pnyrh_prmsk['tgl_pemeriksaan'], 0, 0, 'C');
            $pdf->Cell(86, 7, 'Tanggal : ' . $dt_pnyrh_prmsk['tgl_kembali'], 0, 0, 'C');
            $pdf->Ln(5);

            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(86, 7, 'TTD Pemeriksa,', 0, 0, 'C');
            $pdf->Cell(86, 7, 'TTD Penerima Layanan,', 0, 0, 'C');
            $pdf->Ln(25);

            $lokasi_ttd_pemeriksaan = base_url('assets/img/permintaan_layanan/ttd_pemeriksaan/' . $dt_pnyrh_prmsk['ttd_pemeriksaan']);
            $lokasi_ttd_penyerhaan = base_url('assets/img/permintaan_layanan/ttd_penyerahaan/' . $dt_pnyrh_prmsk['ttd_penerima_layanan']);
            $fotottd = $pdf->Image($lokasi_ttd_pemeriksaan, 51, 233, 22, 22);
            $fotottd2 = $pdf->Image($lokasi_ttd_penyerhaan, 137, 233, 22, 22);

            $pdf->SetFont('Arial', 'BU', 10);
            $pdf->Cell(86, 7, $fotottd, 0, 0, 'C');
            $pdf->Cell(86, 7, $fotottd2, 0, 0, 'C');
            $pdf->Ln(4);
        }

        $data_permintaan = $data['data_permintaan'];
        foreach ($data_permintaan as $dt_prmnt) {

            $pdf->SetFont('Arial', 'BU', 10);
            $pdf->Cell(86, 7, $dt_prmnt['nama_atasan'], 0, 0, 'C');
            $pdf->Cell(86, 7, $dt_prmnt['nama'], 0, 0, 'C');
        }

        $pdf->Output();
    }
}
