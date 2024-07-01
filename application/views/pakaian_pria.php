<div class="container-fluid">

    <!-- Carousel untuk gambar slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="true">
        <div class="carousel-indicators">
            <!-- Indikator untuk slide -->
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></button>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" ></button>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" ></button>
        </div>
        <div class="carousel-inner">
            <!-- Slide pertama dengan gambar slider-man1.jpg -->
            <div class="carousel-item active">
            <img src="<?php echo base_url('assets/img/slider-man1.jpg') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/slider-man1.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Baris untuk menampilkan produk pakaian pria -->
    <div class="row text-center mt-3">
        
        <?php foreach ($pakaian_pria as $brg) : ?>
            <!-- Kartu untuk setiap produk -->
            <div class="card ml-3 mb-3" style="width: 16rem;">
                <!-- Gambar produk -->
                <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body">
                     <!-- Nama produk -->
                    <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
                    <!-- Keterangan produk -->
                    <small><?php echo $brg->keterangan ?></small><br>
                    <!-- Harga produk -->
                    <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span>
                     <!-- Tombol untuk menambahkan produk ke keranjang -->
                    <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_brg,'<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>')?>
                    <!-- Tombol untuk melihat detail produk -->
                    <?php echo anchor('dashboard/detail/'.$brg->id_brg,'<div class="btn btn-sm btn-success">Detail</div>')?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>