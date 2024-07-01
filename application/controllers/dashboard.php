<?php

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();

        // Memeriksa apakah pengguna sudah login sbg user
        if($this->session->userdata('role_id') != '2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('auth/login');
        }
    }

    // Menambah barang ke keranjang
    public function tambah_ke_keranjang($id){
        // Mencari barang berdasarkan ID
        $barang = $this->model_barang->find($id);
        // Data barang yang akan dimasukan ke keranjang
        $data = array(
            'id'        => $barang->id_brg,
            'qty'       => 1,
            'price'     => $barang->harga,
            'name'      => $barang->nama_brg
        );
        // Menambah barang ke keranjang
        $this->cart->insert($data);
        redirect('welcome');
    }
    // Menampilkan detail keranjang
    public function detail_keranjang(){
        // Memuat tampilan detail keranjang
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }
    // Menghapus semua isi keranjang
    public function hapus_keranjang(){
        // Menghapus seluruh isi keranjang
        $this->cart->destroy();
        redirect('welcome');
    }
    // Menampilkan halaman keranjang
    public function pembayaran(){
        // Tampilan pembayaran
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }
    // Memproses pesanan
    public function proses_pesanan(){
        // Memproses pesanan melalui model invoice
        $is_processed = $this->model_invoice->index();
        
        if($is_processed){
        // Menghapus isi keranjang jika pesanan berhasil diproses
        $this->cart->destroy();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('proses_pesanan');
        $this->load->view('templates/footer');

        } else{
            // Pesanan gagal diproses
            echo "Maaf, Pesanan Anda Gagal diproses!";
        }
    }
    // Detail barang
    public function detail($id_brg){
        // Ambil berdasar ID
        $data['barang'] = $this->model_barang->detail_barang($id_brg);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }

}