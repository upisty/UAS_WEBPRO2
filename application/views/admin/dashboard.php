<div class="container-fluid">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="true">
        <div class="carousel-indicators">
            <!-- Indikator untuk slide pertama (index 0), aktif -->
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></button>
            <!-- Indikator untuk slide kedua (index 1) -->
            <li data-target="#carouselExampleIndicators" data-slide-to="2" ></button>
        </div>

        <!-- Item Carousel -->
        <div class="carousel-inner">
            <!-- Slide pertama -->
            <div class="carousel-item active">
                 <!-- Gambar slider dari URL -->
            <img src="<?php echo base_url('assets/img/slider-admin.jpg') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <!-- Kontrol Carousel - Tombol Previous -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <!-- Kontrol Carousel - Tombol Next -->
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
   