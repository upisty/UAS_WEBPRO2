<?php

class Registrasi extends CI_Controller{

    public function index(){
        // Validasi form untuk nama
        $this->form_validation->set_rules('nama','Nama', 'required', [
            'required'  => 'Nama Wajib Diisi!'
        ]);
        // username
        $this->form_validation->set_rules('username','Username', 'required', [
            'required'  => 'Username Wajib Diisi!'
        ]);
        // password
        $this->form_validation->set_rules('password_1','Password', 'required|matches[password_2]', [
            'required'  => 'Nama Wajib Diisi!',
            'matches'   => 'Password Tidak Cocok!'
        ]);
        // Validasi konfirmasi password
        $this->form_validation->set_rules('password_2','Password', 'required|matches[password_1]');
        // Mengecek apakah validasi berhasil
        if($this->form_validation->run() == FALSE){
            // Memuat tampilan form registrasi jika validasi gagal
            $this->load->view('templates/header');
            $this->load->view('registrasi');
            $this->load->view('templates/footer');
        } else{
            // Menyiapkan data pengguna baru
            $data = array (
                'id' => '',
                'nama'      => $this->input->post('nama'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password_1'),
                'role_id' => 2, // Role user
            );

            // Menyimpan data user ke dalam database
            $this->db->insert('tb_user',$data);
            redirect('auth/login');

        }
    }
}