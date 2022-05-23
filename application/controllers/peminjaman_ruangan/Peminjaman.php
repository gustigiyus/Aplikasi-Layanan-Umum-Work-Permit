<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	//Menampilkan Halaman Peminjaman
	public function index()
	{
		$data['title'] = 'Peminjaman Ruangan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

		$this->load->model('Profile_model', 'PM');
		$data['role_user'] = $this->PM->role_user()->result_array();
		$data['detail_user'] = $this->PM->detailuser()->result_array();

		$data['data_peminjaman'] = $this->db->get_where('tb_peminjaman_ruangan', ['email' => $this->session->userdata('email')])->result_array();

		$data['layout_ruangan'] = $this->db->get('tb_master_layout_ruangan')->result_array();
		$data['perlengkapan_ruangan'] = $this->db->get('tb_master_perlengkapan_ruangan')->result_array();

		//load view
		$this->load->view('templates/user_template/header_user', $data);
		$this->load->view('templates/user_template/navbar_user', $data);
		$this->load->view('umum/pengguna/peminjaman-ruangan/peminjaman.php', $data);
		$this->load->view('templates/user_template/sidebar_modal_user', $data);
		$this->load->view('templates/user_template/footer_user');
	}

	//Tambah peminjaman
	public function addpeminjaman()
	{
		$no_pjm = $this->input->post('id_peminjaman_ruangan');
		$nm = $this->input->post('nama_peminjaman');
		$mail = $this->input->post('email_peminjaman');
		$nip = $this->input->post('nip');
		$divisi = $this->input->post('divisi');
		$ext_hp = $this->input->post('ext/hp');
		$kgt_pjm = $this->input->post('kegiatan_pinjam');
		$rng_pjm = $this->input->post('ruang_pinjaman');
		$jns_lyt = $this->input->post('jenis_layout');
		$mulai_pjm = $this->input->post('waktu_mulai');
		$selesai_pjm = $this->input->post('waktu_selesai');
		$tgl_mulai = $this->input->post('tanggal_mulai');
		$tgl_selesai = $this->input->post('tanggal_selesai');
		$jml_org = $this->input->post('jml_orang');
		$prlkp = $this->input->post('perlengkapan');
		$sts_pjm = $this->input->post('status_peminjaman');
		$nama_atasan = $this->input->post('nm_atasan');
		$email_atasan = $this->input->post('em_atasan');
		$nomor_atasan = $this->input->post('no_atasan');
		$tgl_req = date('Y-m-d H:i:s');

		$data_pinjam_ruangan = [
			'no_peminjaman' => $no_pjm,
			'nama' => $nm,
			'email' => $mail,
			'nip' => $nip,
			'divisi' => $divisi,
			'ext/hp' => $ext_hp,
			'nama_kegiatan' => $kgt_pjm,
			'ruangan' => $rng_pjm,
			'jenis_layout' => $jns_lyt,
			'waktu_mulai' => $mulai_pjm,
			'waktu_selesai' => $selesai_pjm,
			'tanggal_mulai' => $tgl_mulai,
			'tanggal_selesai' => $tgl_selesai,
			'jumlah_orang' => $jml_org,
			'tanggal_request' => $tgl_req,
			'status_peminjaman' => $sts_pjm,
			'nama_atasan' => $nama_atasan,
			'email_atasan' => $email_atasan,
			'nomor_atasan' => $nomor_atasan,
			'perlengkapan' => substr(implode(', ', $prlkp), 0)
		];

		$data_agenda = [
			'no_peminjaman' => $no_pjm,
			'kegiatan' => $kgt_pjm,
			'tanggal_mulai' => $tgl_mulai,
			'tanggal_selesai' => $tgl_selesai,
			'waktu_mulai' => $mulai_pjm,
			'waktu_selesai' => $selesai_pjm,
			'waktu_buat' => $tgl_req,
			'nama_peminjam' => $nm
		];

		$this->db->insert('tb_peminjaman_ruangan', $data_pinjam_ruangan);
		$this->db->insert('tb_agenda', $data_agenda);

		$this->session->set_flashdata('message', $this->input->post('nama_peminjaman') . ' Data peminjaman ruangan anda berhasil diajukan');
		redirect('peminjaman_ruangan/Peminjaman');
	}

	//Edit Peminjaman
	public function editpeminjaman($id_peminjaman)
	{
		$data['title'] = 'Edit Peminjaman Ruangan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

		$this->load->model('Profile_model', 'PM');
		$data['role_user'] = $this->PM->role_user()->result_array();
		$data['detail_user'] = $this->PM->detailuser()->result_array();

		$data['data_peminjaman'] = $this->db->get_where('tb_peminjaman_ruangan', ['no_peminjaman' => $id_peminjaman])->result_array();
		$data['layout_ruangan'] = $this->db->get('tb_master_layout_ruangan')->result_array();
		$data['perlengkapan_ruangan'] = $this->db->get('tb_master_perlengkapan_ruangan')->result_array();

		$this->form_validation->set_rules('edit_id_peminjaman_ruangan', 'ID Peminjaman', 'required|trim');

		if ($this->form_validation->run() == false) {
			//load view
			$this->load->view('templates/user_template/header_user', $data);
			$this->load->view('templates/user_template/navbar_user', $data);
			$this->load->view('umum/pengguna/peminjaman-ruangan/edit_peminjaman', $data);
			$this->load->view('templates/user_template/sidebar_modal_user', $data);
			$this->load->view('templates/user_template/footer_user', $data);
		} else {
			//Validasi Success
			$no_pjm = $this->input->post('edit_id_peminjaman_ruangan');
			$nm = $this->input->post('edit_nama_peminjaman');
			$mail = $this->input->post('edit_email_peminjaman');
			$nip = $this->input->post('edit_nip');
			$divisi = $this->input->post('edit_divisi');
			$ext_hp = $this->input->post('edit_ext/hp');
			$kgt_pjm = $this->input->post('edit_kegiatan_pinjam');
			$rng_pjm = $this->input->post('edit_ruang_pinjaman');
			$jns_lyt = $this->input->post('edit_jenis_layout');
			$mulai_pjm = $this->input->post('edit_waktu_mulai');
			$selesai_pjm = $this->input->post('edit_waktu_selesai');
			$tgl_mulai = $this->input->post('edit_tanggal_mulai');
			$tgl_selesai = $this->input->post('edit_tanggal_selesai');
			$jml_org = $this->input->post('edit_jml_orang');
			$prlkp = $this->input->post('edit_perlengkapan');
			$sts_pjm = $this->input->post('edit_status_peminjaman');
			$tgl_req = date('Y-m-d H:i:s');

			$data_pinjam_ruangan = [
				'no_peminjaman' => $no_pjm,
				'nama' => $nm,
				'email' => $mail,
				'nip' => $nip,
				'divisi' => $divisi,
				'ext/hp' => $ext_hp,
				'nama_kegiatan' => $kgt_pjm,
				'ruangan' => $rng_pjm,
				'jenis_layout' => $jns_lyt,
				'waktu_mulai' => $mulai_pjm,
				'waktu_selesai' => $selesai_pjm,
				'tanggal_mulai' => $tgl_mulai,
				'tanggal_selesai' => $tgl_selesai,
				'jumlah_orang' => $jml_org,
				'tanggal_request' => $tgl_req,
				'status_peminjaman' => $sts_pjm,
				'perlengkapan' => substr(implode(', ', $prlkp), 0)
			];

			$data_agenda = [
				'no_peminjaman' => $no_pjm,
				'kegiatan' => $kgt_pjm,
				'tanggal_mulai' => $tgl_mulai,
				'tanggal_selesai' => $tgl_selesai,
				'waktu_mulai' => $mulai_pjm,
				'waktu_selesai' => $selesai_pjm,
				'waktu_buat' => $tgl_req,
				'nama_peminjam' => $nm
			];

			$this->db->where('no_peminjaman', $no_pjm);
			$this->db->replace('tb_peminjaman_ruangan', $data_pinjam_ruangan);
			$this->db->where('no_peminjaman', $no_pjm);
			$this->db->update('tb_agenda', $data_agenda);

			$this->session->set_flashdata('message', $this->input->post('edit_nama_peminjaman') . ' Data peminjaman ruangan anda berhasil diedit');
			redirect('peminjaman_ruangan/Peminjaman');
		}
	}

	//////////////////////////////////////////////// BAGIAN ATASAN //////////////////////////////////////////

	//Menampilkan Halaman Peminjaman
	public function kelola_peminjaman()
	{
		$data['title'] = 'Kelola Peminjaman';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

		$this->load->model('Profile_model', 'PM');
		$data['role_user'] = $this->PM->role_user()->result_array();
		$data['detail_user'] = $this->PM->detailuser()->result_array();

		$data['data_peminjaman'] = $this->db->get_where('tb_peminjaman_ruangan')->result_array();

		//load view
		$this->load->view('templates/user_template/header_user', $data);
		$this->load->view('templates/user_template/navbar_user', $data);
		$this->load->view('umum/atasan/peminjaman-ruangan/peminjaman.php', $data);
		$this->load->view('templates/user_template/sidebar_modal_user', $data);
		$this->load->view('templates/user_template/footer_user');
	}

	//Menampilkan Halaman Kelola Permintaan Properti (Karyawan)
	public function edit_persetujuan($no_peminjaman)
	{
		$data['title'] = 'Edit Persetujuan Peminjaman Ruangan Atasan';

		$data['no_peminjaman'] = $no_peminjaman;

		//Data Sesuai Session Email User 
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();

		//Mengambil data dari model
		$this->load->model('Profile_model', 'PM');
		$this->load->model('Permintaanlayanan_model', 'PRMLYN');

		//Data Profile dan Role User
		$data['role_user'] = $this->PM->role_user()->result_array();
		$data['detail_user'] = $this->PM->detailuser()->result_array();

		//Data Peminjaman Ruangan
		$data['data_peminjaman'] = $this->db->get_where('tb_peminjaman_ruangan', ['no_peminjaman' => $no_peminjaman])->result_array();

		$this->load->view('templates/user_template/header_user', $data);
		$this->load->view('templates/user_template/navbar_user', $data);
		$this->load->view('umum/atasan/peminjaman-ruangan/kelola_peminjaman.php', $data);
		$this->load->view('templates/user_template/sidebar_modal_user', $data);
		$this->load->view('templates/user_template/footer_user', $data['no_peminjaman']);
	}

	//Proses Closing Status Peminjaman Ruangan (Atasan)
	public function proses_kelola_peminjaman_close()
	{
		if (isset($_POST["no_peminjaman"])) {

			$no_peminjaman = $this->input->post('no_peminjaman');
			$status_peminjaman = $this->input->post('status_peminjaman');

			$data = [
				'status_peminjaman' => $status_peminjaman,
			];

			$this->db->where('no_peminjaman', $no_peminjaman);
			$this->db->update('tb_peminjaman_ruangan', $data);
		}
	}

	//Proses Cencel Status Peminjaman Ruangan (Atasan)
	public function proses_kelola_peminjaman_cencel_request($no_peminjaman)
	{
		$data = [
			'status_peminjaman' => 'Cencel Request',
		];

		$this->db->where('no_peminjaman', $no_peminjaman);
		$this->db->update('tb_peminjaman_ruangan', $data);

		$this->session->set_flashdata('message', 'Data peminjaman ruangan berhasil ditolak');
		redirect('peminjaman_ruangan/Peminjaman/kelola_peminjaman');
	}

	//Proses Hapus Peminjaman Ruangan (Atasan)
	public function proses_hapus_peminjaman($no_peminjaman)
	{

		$this->db->where('no_peminjaman', $no_peminjaman);
		$this->db->delete('tb_peminjaman_ruangan');

		$this->db->where('no_peminjaman', $no_peminjaman);
		$this->db->delete('tb_agenda');

		$this->session->set_flashdata('message', 'Data peminjaman ruangan berhasil ditolak');
		redirect('peminjaman_ruangan/Peminjaman/kelola_peminjaman');
	}

	//ADD TTD PEMINJAMAN
	public function upload_ttd_peminjaman($no_ttd_peminjaman)
	{
		$config['upload_path']   = FCPATH . './assets/img/peminjaman_ruangan';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('ttd_peminjaman')) {
			$token_peminjaman = $this->input->post('token_TTD_Peminjaman');
			$nama_TTD_peminjaman = $this->upload->data('file_name');
			$this->db->where('no_peminjaman', $no_ttd_peminjaman);
			$this->db->update('tb_peminjaman_ruangan', array('ttd_peminjaman_ruangan' => $nama_TTD_peminjaman, 'token_peminjaman_ruangan' => $token_peminjaman));
		}
	}

	//DELETE PEMINJAMAN
	public function remove_foto_TTD_peminjaman()
	{
		//Ambil token foto
		$token_peminjaman = $this->input->post('token');
		$foto = $this->db->get_where('tb_peminjaman_ruangan', array('token_peminjaman_ruangan' => $token_peminjaman));

		if ($foto->num_rows() > 0) {
			$hasil = $foto->row();
			$nama_foto_ttd = $hasil->ttd_peminjaman_ruangan;
			if (file_exists($file = FCPATH . './assets/img/peminjaman_ruangan/' . $nama_foto_ttd)) {
				unlink($file);
			}
			$this->db->where('token_peminjaman_ruangan', $token_peminjaman);
			$this->db->update('tb_peminjaman_ruangan', array('ttd_peminjaman_ruangan' => '', 'token_peminjaman_ruangan' => ''));
		}

		echo "{}";
	}
}
