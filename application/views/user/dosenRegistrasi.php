    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg font-weight-bold">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Registrasi Akun Dosen</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('AuthUser/regisDosen'); ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Nama Lengkap" value="<?= set_value('name_user'); ?>">
                                    <?= form_error('name_user', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Email Valid Anda..." value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi password">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukan Nomor KTP..." value="<?= set_value('no_ktp'); ?>">
                                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input type="text" class="form-control" id="telp" name="telp" placeholder="+628xxxxxxxx" value="<?= set_value('telp'); ?>">
                                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor NIDN</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukan Nomor NIDN..." value="<?= set_value('nidn'); ?>">
                                    <?= form_error('nidn', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nomor NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan Nomor NIP..." value="<?= set_value('nip'); ?>">
                                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat Anda..." value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan Anda..."  value="<?= set_value('pekerjaan'); ?>">
                                    <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Unit Kerja</label>
                                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="Bagian Unit Kerja..." value="<?= set_value('unit_kerja'); ?>">
                                    <?= form_error('unit_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Dosen</label>
                                     <select name="jenis_dosen" class="form-control">
                                        <option value="Dosen Terbang">Dosen Terbang</option>
                                        <option value="Dosen Kontrak">Dosen Kontrak</option>
                                        <option value="Dosen Tetap">Dosen Tetap</option>
                                    </select>        
                                </div>
                                <div class="form-group">
                                    <label>Instansi</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Masukan Instantsi Anda..."  value="<?= set_value('instansi'); ?>">
                                    <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>SK Terakhir</label>
                                    <input type="file" class="form-control" name="berkas" id="berkas">
                                </div>
                                <div class="form-group">
                                    <label>Foto Diri</label>
                                    <input type="file" class="form-control" name="image" id="image">
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