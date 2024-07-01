<body class="bg-dark.bg-gradient-transparant">
    <!-- Video latar belakang yang diputar otomatis, di-mute, dan diulang -->
    <video autoplay muted loop id="background-video">
    <source src="<?php echo base_url('assets/img/tes.mp4'); ?>" type="video/mp4">
    </video>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
        
             <!-- Kolom untuk form login -->
            <div class="col-xl-5 col-lg-12 col-md-9">
            
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                                    </div>
                                    <!-- Menampilkan pesan flash data -->
                                    <?php  echo $this->session->flashdata('pesan') ?>

                                     <!-- Form login -->
                                    <form method='post' action="<?php echo base_url('auth/login') ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan User Anda!!" name="username">
                                                
                                                <!-- Menampilkan error untuk input username -->
                                                <?php echo form_error('username', '<div class="text-danger small ml-2">','</div>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukkan Password Anda!!" name="password">
                                                <?php echo form_error('password', '<div class="text-danger small ml-2">','</div>'); ?>
                                        </div>

                                         <!-- Tombol submit untuk login -->
                                        <button type="submit" class="btn btn-secondary form-control">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- Link untuk registrasi akun baru -->
                                        <a class="small" href="<?php echo base_url('registrasi/index'); ?>">Belum Punya Akun? Daftar!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>