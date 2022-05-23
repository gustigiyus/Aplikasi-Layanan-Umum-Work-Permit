<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Kelola Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function addrole()
    {
        $data = [
            'role' => $this->input->post('role')
        ];

        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru telah ditambahkan!</div>');
        redirect('admin/role');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Hak Akses Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_Id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    ////////////////////// KELOLA PENGGUNA ///////////////////////

    public function manageuser()
    {
        $data['title'] = 'Kelola Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->model('UserRole_model', 'role_name');
        $data['role_name'] = $this->role_name->getUserRole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_manage/karyawan-manage', $data);
        $this->load->view('templates/footer');
    }

    public function adduser()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Already Registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $email = $this->input->post('email', true);
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];

        $data2 = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
        ];

        $this->db->insert('user', $data);
        $this->db->insert('detail_user', $data2);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karyawan baru telah ditambahkan!</div>');
        redirect('admin/manageuser');
    }

    public function edituser()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $email = $this->input->post('email', true);
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role'),
            'is_active' => 1,
        ];
        $this->db->where('email', $email);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karyawan berhasil diedit!</div>');
        redirect('admin/manageuser');
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->db->where('email', $this->input->post('email'));
        $this->db->delete('detail_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Karyawan berhasil dihapus!</div>');
        redirect('admin/manageuser');
    }

    ////////////////////// RUANGAN ///////////////////////

    public function manageruangan()
    {
        $data['title'] = 'Kelola Ruangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ruangan'] = $this->db->get('tb_master_ruangan')->result_array();

        $data['perlengkapan_ruangan'] = $this->db->get('tb_master_perlengkapan_ruangan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/ruangan-manage', $data);
        $this->load->view('templates/footer');
    }

    public function addruangan()
    {
        $this->form_validation->set_rules(
            'tipe_ruangan',
            'Tipe Ruangan',
            'required|trim|is_unique[tb_master_ruangan.tipe_ruangan]',
            [
                'is_unique' => 'Tipe Ruangan tersebut Sudah Ada!'
            ]
        );
        $this->form_validation->set_rules('kapasitas_ruangan', 'Kapasitas Ruangan', 'required|numeric|greater_than[0.99]');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'tipe_ruangan' => htmlspecialchars($this->input->post('tipe_ruangan', true)),
            'kapasitas_ruangan' => $this->input->post('kapasitas_ruangan', true),
            'perlengkapan' => substr(implode(', ', $this->input->post('perlengkapan')), 0)
        ];

        $this->db->insert('tb_master_ruangan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ruangan baru telah ditambahkan!</div>');
        redirect('admin/manageruangan');
    }

    public function editruangan()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $ruangan = $this->input->post('tipe_ruangan', true);
        $data = [
            'tipe_ruangan' => htmlspecialchars($this->input->post('tipe_ruangan', true)),
            'kapasitas_ruangan' => $this->input->post('kapasitas_ruangan', true),
            'perlengkapan' => $this->input->post('perlengkapan', true)
        ];
        $this->db->where('tipe_ruangan', $ruangan);
        $this->db->update('tb_master_ruangan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ruangan Telah Diedit!</div>');
        redirect('admin/manageruangan');
    }

    public function delete_ruangan($id)
    {
        $this->db->where('id_master_ruangan', $id);
        $this->db->delete('tb_master_ruangan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ruangan Telah Dihapus!</div>');
        redirect('admin/manageruangan');
    }

    /////////////////////////// ATASAN /////////////////////////////

    public function manageatasan()
    {
        $data['title'] = 'Kelola Atasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['atasan'] = $this->db->get('tb_master_atasan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_manage/atasan-manage', $data);
        $this->load->view('templates/footer');
    }

    public function addatasan()
    {
        $this->form_validation->set_rules(
            'nama_atasan',
            'no_atasan',
            'required|trim|is_unique[tb_master_atasan.nama_atasan]',
            [
                'is_unique' => 'Nama Atasan tersebut Sudah Ada!'
            ]
        );
        $this->form_validation->set_rules('em_atasan', 'Email atasan', 'required');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'nama_atasan' => htmlspecialchars($this->input->post('nama_atasan', true)),
            'email' => htmlspecialchars($this->input->post('em_atasan', true)),
            'divisi' => htmlspecialchars($this->input->post('divisi', true)),
            'kode_atasan' => $this->input->post('no_atasan')
        ];

        $data2 = [
            'name' => htmlspecialchars($this->input->post('nama_atasan', true)),
            'email' => htmlspecialchars($this->input->post('em_atasan', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password_atasan'), PASSWORD_DEFAULT),
            'no_atasan' => $this->input->post('no_atasan'),
            'role_id' => 5,
            'is_active' => 1,
            'date_created' => time()
        ];

        $data3 = [
            'nama' => htmlspecialchars($this->input->post('nama_atasan', true)),
            'email' => htmlspecialchars($this->input->post('em_atasan', true)),
            'no_atasan' => $this->input->post('no_atasan'),
            'divisi' => htmlspecialchars($this->input->post('divisi', true))
        ];

        $this->db->insert('tb_master_atasan', $data);
        $this->db->insert('user', $data2);
        $this->db->insert('detail_user', $data3);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Atasan baru telah ditambahkan!</div>');
        redirect('admin/manageatasan');
    }

    public function editatasan()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $atasan = $this->input->post('nama_atasan', true);

        // Data pada table master_atasan //
        $data1 = [
            'email' => $this->input->post('em_atasan', true),
            'kode_atasan' => $this->input->post('no_atasan', true),
            'divisi' => $this->input->post('divisi')
        ];

        // Data pada table User //
        $data2 = [
            'email' => $this->input->post('em_atasan', true),
            'no_atasan' => $this->input->post('no_atasan', true)
        ];

        // Data pada table detail_user //
        $data3 = [
            'email' => $this->input->post('em_atasan', true)
        ];

        $this->db->where('nama_atasan', $atasan);
        $this->db->update('tb_master_atasan', $data1);

        $this->db->where('name', $atasan);
        $this->db->update('user', $data2);

        $this->db->where('nama', $atasan);
        $this->db->update('detail_user', $data3);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Atasan Berhasil Diedit!</div>');
        redirect('admin/manageatasan');
    }

    public function delete_atasan($id)
    {
        $this->db->where('id_atasan', $id);
        $this->db->delete('tb_master_atasan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Atasan Berhasil Dihapus!</div>');
        redirect('admin/manageatasan');
    }
}
