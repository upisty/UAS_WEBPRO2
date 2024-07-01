<div class="container-fluid">

<div class="card">
  <h5 class="card-header">Detail Produk</h5>
  <div class="card-body">

        <?php foreach($barang as $brg): ?>
            <div class="row">
                <!-- Kolom untuk gambar produk -->
                <div class="col-md-4">
                    <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top">
                </div>

                 <!-- Kolom untuk detail produk -->
                <div class="col-md-8">
                    <table class="table">
                        <!-- Baris untuk nama produk -->
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?php echo $brg->nama_brg ?></strong></td>
                        </tr>

                        <tr>
                            <td>Keterangan</td>
                            <td><strong><?php echo $brg->keterangan ?></strong></td>
                        </tr>

                        <tr>
                            <td>Kategori</td>
                            <td><strong><?php echo $brg->kategori ?></strong></td>
                        </tr>

                        <tr>
                            <td>Stok</td>
                            <td><strong><?php echo $brg->stok ?></strong></td>
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td><strong><div class="btn btn-sm btn-success"> Rp. <?php echo number_format($brg->harga,0,',','.') ?></div></strong></td>
                        </tr>

                    </table>

                    <!-- Tombol untuk menambahkan produk ke keranjang -->
                    <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_brg,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>')?>
                    <!-- Tombol untuk kembali ke halaman sebelumnya -->
                    <?php echo anchor('dashboard/index/','<div class="btn btn-sm btn-danger">Kembali</div>')?>

                </div>
            </div>
        <?php endforeach; ?>    
  </div>
</div>

</div>