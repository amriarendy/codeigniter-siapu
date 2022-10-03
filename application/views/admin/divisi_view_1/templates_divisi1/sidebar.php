

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url() ?>assets/file/data_file/siap_putih.png" style="width: 100%">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Heading -->
              <div class="sidebar-heading mt-2">
               Divisi Database Dan Sistem Terintegrasi
              </div>

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('akun/dashboard') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#layanan_dosen"
                    aria-expanded="true" aria-controls="layanan_dosen">
                    <i class="fas fa-address-card"></i>
                    <span>Menu Layanan</span>
                </a>
                <div id="layanan_dosen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/LayananEmailInstitusi_divisi1') ?>">Layanan Email Institusi</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/nidn_divisi1') ?>">Pengajuan NIDN</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/nup_divisi1') ?>">Pengajuan NUP</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/nidk_divisi1') ?>">Pengajuan NIDK</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/dos_dikti_divisi1') ?>">Pengajuan PD Dikti Dosen</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/homdos_in_divisi1') ?>">Hombase Dosen Internal</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/homdos_ex_divisi1') ?>">Hombase Dosen Eksternal</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/divisi1/layanan_divisi1/mhs_dikti_divisi1') ?>">Perubahan PD Dikti Mhs</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Ubah Password</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Welcome/logout')?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h4 class="font-weight-bold">UIN Sulthan Thaha Saifuddin Jambi</h4>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Selamat Datang Admin | <span class="badge badge-primary"><?php echo $this->session->userdata('nama_admin') ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('admin/divisi1/dashboard') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->