<?php

class Model_invoice extends CI_Model{

    // Untuk menyimpan invoice baru ke dalam database
    public function index(){
        
        // Set zona waktu default menjadi Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');
        // Ambil data nama dan alamat dari input POST
        $nama   = $this->input->post('nama');
        $alamat   = $this->input->post('alamat');

        // Buat array data invoice
        $invoice = array(

            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
        );

        // Masukan data invoice  ke dalam tabel 'tb_invoice' di database
        $this->db->insert('tb_invoice', $invoice);
        // Ambil ID invoice yang baru dimasukan
         $id_invoice = $this->db->insert_id();

            // Iterasi setiap item yang ada di dalam keranjang belanja
            foreach($this->cart->contents() as $item){
                // Buat array data pesanan
                $data = array(
                    'id_invoice'    => $id_invoice,
                    'id_brg'        => $item['id'],
                    'nama_brg'      => $item['name'],
                    'jumlah'        => $item['qty'],
                    'harga'         => $item['price']
                );
                // Masukkan data pesanan ke dalam tabel 'tb_pesanan' di database
                $this->db->insert('tb_pesanan', $data);
            }
             // Mengembalikan TRUE jika proses penyimpanan invoice berhasil
            return TRUE;
    }    
        // Untuk menampilkan semua data invoice dari tabel 'tb_invoice'
        public function tampil_data(){
            
            $result = $this->db->get('tb_invoice');
            if($result->num_rows() > 0){
                return $result->result(); // Mengembalikan hasil query dalam bentuk array objek jika ada data
                
            }else{
                return false;
            }
        }
        // Untuk mengambil data invoice berdasarkan ID invoice
        public function ambil_id_invoice($id_invoice){

            $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
            if($result->num_rows() > 0){
                return $result->row();
            
            } else{
                return false;
            }
        }
        // untuk mengambil data pesanan (detail pesanan) berdasarkan ID invoice
        public function ambil_id_pesanan($id_invoice){

            $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
            if($result->num_rows() > 0){
                return $result->result();
            
            } else{
                return false;
            }
        }

}