<body class="bg-gradient-primary">

    <div class="container">

        <!-- Kartu untuk formulir registrasi akun baru -->
        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Baris di dalam badan kartu -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                            </div>
                            <!-- Formulir untuk registrasi akun -->
                            <form method="post" action="<?php echo base_url('registrasi/index') ?>" class="user">
                               
                                <!-- Input untuk nama pengguna -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nama Anda" name="nama">
                                    <!-- Menampilkan pesan error jika ada kesalahan pada input nama -->
                                        <?php echo form_error('nama', '<div class="text-danger" small ml-2>', '</div>') ?>
                                </div>

                                <!-- Input untuk username -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Username Anda" name="username">
                                    
                                    <!-- Menampilkan pesan error jika ada kesalahan pada input username -->
                                        <?php echo form_error('username', '<div class="text-danger" small ml-2>', '</div>') ?>
                                </div>
                                
                                <!-- Input untuk password dan konfirmasi password -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password_1">
                                        <?php echo form_error('password_1', '<div class="text-danger" small ml-2>', '</div>') ?>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Ulangi Password" name="password_2">
                                    </div>
                                </div>

                                <!-- Tombol untuk mengirimkan formulir registrasi -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>

                            </form>
                            <hr>

                            <!-- Link untuk pengguna yang sudah memiliki akun agar bisa login -->
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah Punya Akun? Silahkan Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>