    <!-- Halaman register untuk header dan footernya ada di templates header.php dan footer.php -->

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg font-weight-bold">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Registrasi Akun Mahasiswa</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('AuthUser/regisMahasiswa'); ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIM Mahasiswa</label>
                                    <input type="text" class="form-control" name="nim" placeholder="Masukan Nomor NIM Anda..." value="<?= set_value('nim'); ?>">
                                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Nama Lengkap..." value="<?= set_value('name_user'); ?>">
                                    <?= form_error('name_user', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Email Anda" value="<?= set_value('email'); ?>">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTM</label>
                                    <input type="text" class="form-control" name="ktm" placeholder="Masukan Nomor KTM" value="<?= set_value('ktm'); ?>">
                                    <?= form_error('ktm', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" placeholder="Masukan Nomor KTP" value="<?= set_value('no_ktp'); ?>">
                                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                                <label>Semester</label>
                                                <select name="semester" class="form-control">
                                                    <option value="Semester 1 Ganjil">Semester 1 Ganjil</option>
                                                    <option value="Semester 2 Genap">Semester 2 Genap</option>
                                                    <option value="Semester 3 Ganjil">Semester 3 Ganjil</option>
                                                    <option value="Semester 4 Genap">Semester 4 Genap</option>
                                                    <option value="Semester 5 Ganjil">Semester 5 Ganjil</option>
                                                    <option value="Semester 6 Genap">Semester 6 Genap</option>
                                                    <option value="Semester 7 Ganjil">Semester 7 Ganjil</option>
                                                    <option value="Semester 8 Genap">Semester 8 Genap</option>
                                                    <option value="Semester 9 Ganjil">Semester 9 Ganjil</option>
                                                    <option value="Semester 10 Genap">Semester 10 Genap</option>
                                                    <option value="Semester 11 Ganjil">Semester 11 Ganjil</option>
                                                    <option value="Semester 12 Genap">Semester 12 Genap</option>
                                                    <option value="Semester 13 Ganjil">Semester 13 Ganjil</option>
                                                </select>        
                                </div>
                                <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input type="text" class="form-control" name="telp" placeholder="+628xxxxxxx" value="<?= set_value('telp'); ?>">
                                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Anda" value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan Anda"  value="<?= set_value('pekerjaan'); ?>">
                                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Prodi</label>
                                    <input type="text" class="form-control" name="prodi" placeholder="Masukan Prodi Anda"  value="<?= set_value('prodi'); ?>">
                                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto KTM</label>
                                    <input type="file" class="form-control" name="berkas">
                                </div>
                                <div class="form-group">
                                    <label>Foto Diri</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <hr>
                                <button href="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('AuthUser'); ?>">Sudah Punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>