<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

     <!-- Form untuk edit data barang -->
    <?php foreach($barang as $brg) : ?>
        
        <form method="post" action="<?php echo base_url().'admin/data_barang/update'?>">

            <!-- Input untuk Nama Barang -->
            <div class="for-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
            </div>

            <!-- Input untuk Keterangan Barang (ID Barang disimpan sebagai hidden input) -->
            <div class="for-group">
                <label>Keterangan</label>
                <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
                <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
            </div>

            <!-- Input untuk Kategori Barang -->
            <div class="for-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
            </div>

            <!-- Input untuk Harga Barang -->
            <div class="for-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
            </div>
            
             <!-- Input untuk Stok Barang -->
            <div class="for-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
            </div>

            <!-- Tombol Simpan untuk mengirimkan perubahan -->
            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>