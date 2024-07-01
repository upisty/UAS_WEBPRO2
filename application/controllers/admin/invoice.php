<?php

class Invoice extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role_id') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('auth/login');
        }
    }
    // Menampilkan halaman daftar invoice
    public function index(){
       // Mengambil data semua invoice dari model
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header'); 
        $this->load->view('templates_admin/sidebar'); 
        $this->load->view('admin/invoice', $data); 
        $this->load->view('templates_admin/footer'); 
    }
    // Menampilkan detail dari invoice
    public function detail($id_invoice){
        // Mengambil data invoice berdasarkan ID
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        // Mengambil data pesanan terkait invoice
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/header'); 
        $this->load->view('templates_admin/sidebar'); 
        $this->load->view('admin/detail_invoice', $data); 
        $this->load->view('templates_admin/footer'); 

    }
}

