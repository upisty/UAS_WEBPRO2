<?php

class Auth extends CI_Controller{

    public function login(){

        // Validasi form untuk username dan password
        $this->form_validation->set_rules('username','Username','required',['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib diisi!']);

        // Mengecek apakah validasi berhasil
        if($this->form_validation->run() == FALSE){
            // Memuat tampilan form login jika gagal
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        
        } else{
            // Mengecek kredensial login lewat model
            $auth = $this->model_auth->cek_login();
            
            // Jika login gagal
            if($auth == FALSE){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>');
                
                redirect('auth/login');
            } else{
                // Menyimpan data pengguna ke session
                $this->session->set_userdata('username',$auth->username);
                $this->session->set_userdata('role_id',$auth->role_id);

                // Mengarahkan pengguna sesuai dengan role_id
                switch($auth->role_id){
                    case 1 : redirect('admin/dashboard_admin');
                             break;
                    case 2 : redirect('welcome');
                             break;
                    default: break;
                }
            }
        }
    }

    public function logout(){
        // Menghancurkan semua data session
        $this->session->sess_destroy();
        redirect('auth/login');
    }

}

