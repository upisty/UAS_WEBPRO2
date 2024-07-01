<?php

class Kategori extends CI_Controller{

    // Menampilkan halaman kategori pakaian pria
    public function pakaian_pria(){
        // Mengambil data dari model
        $data['pakaian_pria'] = $this->model_kategori->data_pakaian_pria()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_pria', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_wanita(){

        $data['pakaian_wanita'] = $this->model_kategori->data_pakaian_wanita()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_wanita', $data);
        $this->load->view('templates/footer');
    }

    public function pakaian_anak_anak(){

        $data['pakaian_anak_anak'] = $this->model_kategori->data_pakaian_anak_anak()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_anak_anak', $data);
        $this->load->view('templates/footer');
    }

    public function sepatu(){

        $data['sepatu'] = $this->model_kategori->data_sepatu()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sepatu', $data);
        $this->load->view('templates/footer');
    }

    public function about(){


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('about');
        $this->load->view('templates/footer');
    }

}