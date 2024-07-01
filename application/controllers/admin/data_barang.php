<?php

class data_barang extends CI_Controller{

    public function __construct(){
        parent::__construct();

// Memeriksa apakah pengguna sudah login sebagai admin
        if($this->session->userdata('role_id') != '1'){
            // Menyimpan pesan kesalahan jika blm login
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('auth/login');
        }
    }

//Menampilkan halaman utama data barang
    public function index(){
        //Mengambil data barang dari model
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

// Fungsi buat menambah barang baru
    public function tambah_aksi(){
        // Mengambil input dari form
        $nama_brg       = $this->input->post('nama_brg');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar']['name'];
        
        // Mengecek apakah ada gambar yang diupload
        if ($gambar=''){} else{
            $config ['upload_path'] = './uploads'; // Direktori penyimpanan gambar
            $config ['allowed_types'] = 'jpg|jpeg|png|gif'; // Tipe file yang diizinkan

            // Memuat library upload dengan konfigurasi
            $this->load->library('upload',$config);

            // Mengecek apakah upload berhasil
            if(!$this->upload->do_upload('gambar')){
                // Menampilkan pesan kesalahan jika upload gagal
                echo "Gambar gagal di Upload!";
                
            }else {
                // Mendapatkan nama file yang diupload
                $gambar = $this->upload->data('file_name');
            }
        }

        // Menyiapkan data untuk disimpan ke database
        $data = array (
            'nama_brg'      => $nama_brg,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok,
            'gambar'        => $gambar
        );

        // Menambah data barang ke database
        $this->model_barang->tambah_barang($data, 'tb_barang');
       // Mengarahkan kembali ke halaman data barang
        redirect('admin/data_barang/index');
    }

    // Fungsi untuk menampilkan halaman edit barang
    public function edit($id){
        
        // Menyiapkan data barang berdasarkan id
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    // Untuk update data barang
    public function update(){

        // Mengambil input dari form
        $id             = $this->input->post('id_brg');
        $nama_brg       = $this->input->post('nama_brg');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');

        // Menyiapkan data untuk diupdate
        $data = array(

            'nama_brg'      => $nama_brg,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok
        );
        // Menyiapkan kondiri where untuk update
        $where = array(
            'id_brg' => $id
        );

        // Mengupdate data barang di database
        $this->model_barang->update_data($where,$data,'tb_barang');
        redirect('admin/data_barang/index');
    }

    // Untuk menghapus
    public function hapus ($id){
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}