<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
      redirect('menu');
    }
  }

  public function submenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
      redirect('menu/submenu');
    }
  }
  public function editmenu($id)
  {
    $nama = $this->input->post('menu');
    $this->db->where('id', $id);
    $this->db->update('user_menu', ['menu' => $nama]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Diedit!</div>');
    redirect('menu');
  }
  public function hapusmenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_menu');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Dihapus!</div>');
    redirect('menu');
  }
  //submenu
  public function editsubmenu($id)
  {
    $data = [
      'title' => $this->input->post('title'),
      'menu_id' => $this->input->post('menu'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('aktif')
    ];
    $nama = $this->input->post('menu');
    $this->db->where('id', $id);
    $this->db->update('user_sub_menu', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Diedit!</div>');
    redirect('menu/submenu');
  }
  public function hapussubmenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Dihapus!</div>');
    redirect('menu/submenu');
  }
	//KELOLA TREE MENU 

  //SSMenu
  public function ssmenu()
  {
    $data['title'] = 'SSubmenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $this->load->model('Menu_model', 'menu');

    $data['ssubMenu'] = $this->menu->getSSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/ssmenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_ss_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
      redirect('menu/ssmenu');
    }
  }

  public function editssmenu($id)
  {
    $data = [
      'title' => $this->input->post('title'),
      'menu_id' => $this->input->post('menu'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('aktif')
    ];
    $nama = $this->input->post('menu');
    $this->db->where('id', $id);
    $this->db->update('user_ss_menu', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Diedit!</div>');
    redirect('menu/ssmenu');
  }

  public function delssmenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_ss_menu');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Dihapus!</div>');
    redirect('menu/ssmenu');
  }

  //TreeMenu
  public function treemenu()
  {
    $data['title'] = 'Treemenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $this->load->model('Menu_model', 'menu');

    $data['treeMenu'] = $this->menu->getTreeMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['ssmenu'] = $this->db->get('user_ss_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/treemenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'menu_tree' => $this->input->post('ssmenu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->db->insert('user_tree_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tree menu berhasil ditambahkan!</div>');
      redirect('menu/treemenu');
    }
  }

  public function get_idmenu()
  {
    $this->load->model('Menu_model', 'menu');
    $id = $this->input->post('menu_id');
    $data = $this->menu->getSSNameMenu($id);

    echo json_encode($data);
  }

  public function edittreemenu($id)
  {
    $data = [
      'title' => $this->input->post('title'),
      'menu_id' => $this->input->post('menu_id'),
      'menu_tree' => $this->input->post('ss_menu_id'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => $this->input->post('aktif')
    ];
    $nama = $this->input->post('menu');
    $this->db->where('id', $id);
    $this->db->update('user_tree_menu', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tree menu berhasil diedit!</div>');
    redirect('menu/treemenu');
  }

  public function deltreemenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_tree_menu');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tree menu berhasil dihapus!</div>');
    redirect('menu/treemenu');
  }
}
