<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/eksternal_user/landing_header');
        $this->load->view('landingpage/index');
        $this->load->view('templates/eksternal_user/landing_footer');
    }

    public function login()
    {
        $this->load->view('templates/eksternal_user/landing_header');
        $this->load->view('landingpage/login');
        $this->load->view('templates/eksternal_user/landing_footer');
    }

    public function contact()
    {
        $this->load->view('templates/eksternal_user/header_contact');
        $this->load->view('landingpage/contact');
        $this->load->view('templates/eksternal_user/landing_footer');
    }
}
