<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function myprofile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $this->load->view('templates/user_template/header_user', $data);
        $this->load->view('templates/user_template/navbar_user', $data);
        $this->load->view('profile/my_profil', $data);
        $this->load->view('templates/user_template/sidebar_modal_user', $data);
        $this->load->view('templates/user_template/footer_user');
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user2'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();
        $data['detail_user'] = $this->PM->detailuser()->result_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_template/header_user', $data);
            $this->load->view('templates/user_template/navbar_user', $data);
            $this->load->view('profile/change_password', $data);
            $this->load->view('templates/user_template/sidebar_modal_user', $data);
            $this->load->view('templates/user_template/footer_user');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-custom alert-white shadow-lg fade show mb-5" role="alert">
                <div class="alert-icon">
                    <i class="flaticon-warning"></i>
                </div>
                <div class="alert-text">Wrong Current Password!</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="ki ki-close"></i>
                        </span>
                    </button>
                </div>
            </div>');
                redirect('profile/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-custom alert-white shadow-lg fade show mb-5" role="alert">
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">New password cannot be the same as current password!</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
                </div>');
                    redirect('profile/changepassword');
                } else {
                    // Jika password berbeda dengan current (SUDAH OK)
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata['email']);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-custom alert-success shadow-lg fade show mb-5" role="alert">
                    <div class="alert-icon">
                        <i class="flaticon2-check-mark"></i>
                    </div>
                    <div class="alert-text">Password changed!</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
                </div>');
                    redirect('profile/changepassword');
                }
            }
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Profile_model', 'PM');
        $data['role_user'] = $this->PM->role_user()->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_template/header_user', $data);
            $this->load->view('templates/user_template/navbar_user', $data);
            $this->load->view('profile/my_profil', $data);
            $this->load->view('templates/user_template/sidebar_modal_user', $data);
            $this->load->view('templates/user_template/footer_user');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // Cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['profile_avatar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profile_avatar')) {

                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $upload_imagektp = $_FILES['fktp'];
            $old_imagektp = $this->input->post('old_ktp');
            $gambar = $upload_imagektp;
            $gambarlama = $old_imagektp;
            if ($gambar['name'] != '') {
                $filename = $gambar['name'];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $config['file_name'] = rand() . "." . $extension;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/ktp/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('fktp')) {
                    $upload_image = $this->upload->data('file_name');
                    unlink('./assets/img/ktp/' . $gambarlama);
                } else {
                    $upload_image = $gambarlama;
                }
            } else {
                $upload_image = $gambarlama;
            }

            $data = [
                'alamat1' => $this->input->post('alamat1'),
                'alamat2' => $this->input->post('alamat2'),
                'jenis_kelamin' => $this->input->post('jk'),
                'nama_perusahaan' => $this->input->post('na_pe'),
                'kota' => $this->input->post('kota'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'nomer_telepon' => $this->input->post('nopel'),
                'nomer_ktp' => $this->input->post('nktp'),
                'foto_ktp' => $upload_image
            ];
            $this->db->where('email', $email);
            $this->db->update('detail_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile has been update!</div>');
            redirect('profile/myprofile');
        }
    }
}
