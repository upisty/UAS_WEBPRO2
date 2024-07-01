<?php

class Dashboard_admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
//Mengecek user punya peran admin (role_id= 1)
        if($this->session->userdata('role_id') != '1'){
            // Menyimpan pesan kesalahan jika blm login sbg admin
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
          //Mengarahkan pengguna ke halaman login
            redirect('auth/login');
        }
    }
//Fungsi buat tampilin dashboard
    public function index(){
        //Memuat bagian header dari template admin
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates_admin/footer');
    }
}