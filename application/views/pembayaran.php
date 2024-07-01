<div class="container-fluid">
    <div class="row">
        <!-- Kolom kiri kosong untuk memberikan spasi -->
        <div class="col-md-2"></div>

        <!-- Kolom utama untuk form pembayaran -->
        <div class="col-md-8">
            <!-- Tombol untuk menampilkan total belanjaan -->
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0; // Inisialisasi total belanjaan
                
                // Memeriksa apakah ada item di keranjang
                if($keranjang = $this->cart->contents()){

                    // Loop melalui setiap item di keranjang
                    foreach ($keranjang as $item){

                        // Menambahkan subtotal setiap item ke total belanjaan
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    // Menampilkan total belanjaan dalam format rupiah
                    echo "<h4>Total Belanjaan anda: Rp. ".number_format($grand_total,0,',','.');

                 ?>
            </div> <br><br>

            <h3>Input Alamat Pengiriman dan Pembayaran</h3>

            <!-- Form untuk input alamat pengiriman dan informasi pembayaran -->
            <form method="post" action="<?php echo base_url() ?>dashboard/proses_pesanan">
                 <!-- Input untuk nama lengkap -->
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>

                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="No Telepon Anda" class="form-control">
                </div>

                <!-- Dropdown untuk memilih jasa pengiriman -->
                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control">
                        <option>JNE</option>
                        <option>TIKI</option>
                        <option>POS</option>
                        <option>GOJEK</option>
                        <option>GRAB</option>
                    </select>
                </div>

                <!-- Dropdown untuk memilih bank -->
                <div class="form-group">
                    <label>Pilih Bank</label>
                    <select class="form-control">
                        <option>BCA - XXXXXXX</option>
                        <option>BNI - XXXXXXX</option>
                        <option>BRI - XXXXXXX</option>
                        <option>MANDIRI - XXXXXXX</option>
                    </select>
                </div>
                
                <!-- Tombol untuk mengirimkan pesanan -->
                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>

            </form>
                <?php } else{
                    // Pesan jika keranjang masih kosong
                    echo "<h4>Keranjang Anda Masih Kosong";
                } ?>
        </div>

        <!-- Kolom kanan kosong untuk memberikan spasi -->
        <div class="col-md-2"></div>
    </div>
</div>