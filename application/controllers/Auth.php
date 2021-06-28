<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    //Function Buat Login Internal
    public function index()
    {
        if ($this->session->userdata('email')) {
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            if ($user['role_id'] == 1) {
                redirect('user');
            } elseif ($user['role_id'] == 2) {
                redirect('beranda');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user-auth_template/auth-inti_header');
            $this->load->view('auth/login-inti');
            $this->load->view('templates/user-auth_template/auth-inti_footer');
        } else {
            //Validasi Success
            $this->_login();
        }
    }

    //Method Proses Buat Login Internal
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika Usernya ada
        if ($user) {
            // Jika User Aktif
            if ($user['is_active'] == 1) {
                // Cek Passwordnya (Hanya User yang Aktif)
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'name' => $user['name']

                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        // Administator
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        // Karyawan
                        if ($password == '1234') {
                            redirect('profile/changepassword');
                        } else {
                            redirect('beranda');
                        }
                    } elseif ($user['role_id'] == 3) {
                        // Admin Complian
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi ini salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum diaktifkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button></div>');
            redirect('auth');
        }
    }


    /// AUTH EKSTERNAL (TENANT) ///

    //Function Buat Login Lupa Password
    public function forgetpassword()
    {
        $this->load->view('templates/user-auth_template/auth_header');
        $this->load->view('auth/forget-tenant');
        $this->load->view('templates/user-auth_template/auth_footer');
    }

    //Function Buat Login Eksternal
    public function loginTenant()
    {
        if ($this->session->userdata('email')) {
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            if ($user['role_id'] == 4) {
                redirect('beranda');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user-auth_template/auth_header');
            $this->load->view('auth/login-tenant');
            $this->load->view('templates/user-auth_template/auth_footer');
        } else {
            //Validasi Success
            $this->_loginTenant();
        }
    }

    //Proses Buat Login Eksternal
    private function _loginTenant()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika Usernya ada
        if ($user) {
            // Jika Role id sama dengan 4 (Tenant)
            if ($user['role_id'] == 4) {
                // Jika User Aktif
                if ($user['is_active'] == 1) {
                    // Cek Passwordnya (Hanya User yang Aktif)
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'name' => $user['name']

                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 4) {
                            // Tenant
                            redirect('beranda');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        <div class="alert-icon">
                          <i class="now-ui-icons objects_support-17"></i>
                        </div>
                        <strong>Peringatan!</strong> Kata sandi ini salah.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>');
                        redirect('auth/loginTenant');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <div class="alert-icon">
                      <i class="now-ui-icons objects_support-17"></i>
                    </div>
                    <strong>Peringatan!</strong> Email ini belum diaktifkan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>');
                    redirect('auth/loginTenant');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                  <div class="alert-icon">
                    <i class="now-ui-icons objects_support-17"></i>
                  </div>
                  <strong>Peringatan!</strong> Akun tidak ditemukan.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                  </button>
              </div>');
                redirect('auth/loginTenant');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <div class="alert-icon">
              <i class="now-ui-icons objects_support-17"></i>
            </div>
            <strong>Peringatan!</strong> Email Tidak Terdaftar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>');
            redirect('auth/loginTenant');
        }
    }

    // Function Buat Registrasi
    public function registrtionTenant()
    {
        if ($this->session->userdata('email')) {
            redirect('beranda');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email tersebut telah digunakan, coba email lain!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user-auth_template/auth_header');
            $this->load->view('auth/registrasi-tenant');
            $this->load->view('templates/user-auth_template/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 4,
                'is_active' => 0,
                'date_created' => time()
            ];

            $upload_image3 = $_FILES['ft_ktp'];
            //gambar 1
            if ($upload_image3 = '') {
                echo $this->upload->display_errors();
            } else {

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/ktp';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('ft_ktp')) {
                    echo $this->upload->display_errors();
                    die;
                } else {
                    $upload_image3 = $this->upload->data('file_name');
                }
            }

            // Kirim ke table detail user
            $data2 = [
                'email' => htmlspecialchars($email),
                'alamat1' => $this->input->post('alm1'),
                'alamat2' => $this->input->post('alm2'),
                'nama_perusahaan' => $this->input->post('nm_perushaan'),
                'kota' => $this->input->post('nm_kota'),
                'tanggal_lahir' => $this->input->post('tgl_lahir'),
                'tempat_lahir' => $this->input->post('tmp_lahir'),
                'jenis_kelamin' => $this->input->post('js_kelamin'),
                'nomer_telepon' => $this->input->post('no_tlp'),
                'nomer_ktp' => $this->input->post('no_ktp'),
                'foto_ktp' => $upload_image3
            ];

            // Menyiapkan Token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('detail_user', $data2);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <div class="alert-icon">
              <i class="now-ui-icons objects_support-17"></i>
            </div>
            <strong>Selamat!</strong> Akun Anda telah dibuat, harap aktifkan akun Anda!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>');
            redirect('auth/loginTenant');
        }
    }

    //Proses Buat SendEmail Saat Registrasi
    private function _sendEmail($token, $type)
    {

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'cocmarvel5@gmail.com';
        $config['smtp_pass'] = 'draxx123';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('cocmarvel5@gmail.com', 'Admin PT INTI');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Klik tautan ini untuk memverifikasi akun Anda : <a href=' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '> Aktivasi </a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    //Function Buat Verif Registrasi
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah diaktifkan! Silahkan masuk</div>');
                    redirect('auth/loginTenant');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Token kedaluwarsa</div>');
                    redirect('auth/loginTenant');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Token tidak valid</div>');
                redirect('auth/loginTenant');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal! Email yang digunakan salah</div>');
            redirect('auth/loginTenant');
        }
    }

    public function ttd()
    {
        $this->load->view('auth/tanda_tangan');
    }

    /// BUAT LOGOUT DAN LAINNYA ///

    public function logoutInternal()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda telah Keluar!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button></div>');
        redirect('auth/');
    }

    public function logoutEksternal()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda telah Keluar!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button></div>');
        redirect('auth/loginTenant');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
