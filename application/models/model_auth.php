<?php
    class Model_auth extends CI_Model{

        public function cek_login(){
            // Mengambil nilai dari input dengan nama 'username' dan 'password' menggunakan fungsi set_value() dari CI
            $username = set_value('username');
            $password = set_value('password');

            // Melakukan query ke database untuk mencari pengguna dengan username dan password yang sesuai
            $result =$this->db->where('username',$username)
                              ->where('password',$password)
                              ->limit(1)
                              ->get('tb_user');
            // Memeriksa apakah query mengembalikan hasil (ada pengguna yang sesuai)
            if($result->num_rows() > 0){
                // Jika ditemukan, mengembalikan baris pertama dari hasil query sebagai objek
                return $result->row();
            }else{
                // Jika tidak ditemukan, mengembalikan array kosong
                return array();
            }
        }

    }