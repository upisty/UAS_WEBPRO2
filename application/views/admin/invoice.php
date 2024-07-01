<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>

    <!-- Tabel untuk menampilkan daftar invoice -->
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
        </tr>

        <!-- Looping untuk setiap invoice -->
        <?php foreach ($invoice as $inv): ?>
            <tr>
                <!-- Kolom ID Invoice -->
                <td><?php echo $inv->id ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_bayar ?></td>
                <!-- Kolom Aksi untuk Detail Invoice -->
                <td><?php echo anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>