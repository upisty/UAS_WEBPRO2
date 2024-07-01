<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <!-- Tabel untuk menampilkan isi keranjang belanja -->
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>

        <?php
        $no = 0;
        foreach($this->cart->contents() as $items) : ?>

            <tr>
                <!-- Menampilkan nomor urut -->
                <td><?php echo $no++ ?></td>
                <td><?php echo $items['name'] ?></td>
                 <!-- Menampilkan jumlah produk yang dibeli -->
                <td><?php echo $items['qty'] ?></td>
                <!-- Menampilkan harga satuan produk dengan format rupiah -->
                <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                 <!-- Menampilkan sub-total harga untuk produk tersebut -->
                <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
            </tr>
            
        <?php endforeach; ?>
            <!-- Baris untuk menampilkan total keseluruhan harga -->
            <tr>
                <td colspan="4"></td>
                <td align="right">Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?></td>
            </tr>
    </table>

    <!-- Tombol-tombol aksi di bagian bawah tabel -->
    <div align="right"> 
        <!-- Tombol untuk menghapus seluruh isi keranjang -->
        <a href="<?php echo base_url('dashboard/hapus_keranjang')?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
        <!-- Tombol untuk kembali ke halaman belanja -->
        <a href="<?php echo base_url('dashboard/index')?>"><div class="btn btn-sm btn-primary">Lanjut Belanja</div></a>
        <!-- Tombol untuk menuju halaman pembayaran -->
        <a href="<?php echo base_url('dashboard/pembayaran')?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
    </div>
</div>