        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIAP PTIPD</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('akun/dashboard') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#layanan_dosen"
                    aria-expanded="true" aria-controls="layanan_dosen">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Layanan Dosen</span>
                </a>
                <div id="layanan_dosen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/LayananEmailInstitusi') ?>">Layanan Email Institusi</a>

                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/PengajuanNIDN') ?>">Pengajuan NIDN</a>

                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/PengajuanNUP') ?>">Pengajuan NUP</a>

                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/PengajuanNIDK') ?>">Pengajuan NIDK</a>

                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/Pengajuan_PD_Dikti') ?>">Pengajuan PD Dikti</a>

                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/PerubahanDosen_In') ?>">Perubahan Data Dosen In</a>

                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/PerubahanDosen_Ex') ?>">Perubahan Data Dosen Ex</a>

                        <a class="collapse-item" href="<?php echo base_url('layanan_dosen_controllers/PengajuanLabroTI') ?>">Pengajuan Ruang Labor</a> 
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#layanan_infrastruktur"
                    aria-expanded="true" aria-controls="layanan_infrastruktur">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Layanan Infrastruktur</span>
                </a>
                <div id="layanan_infrastruktur" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('layanan_infrastruktur_controllers/PerbaikanJaringanInternet') ?>">Perbaikan Jaringan Internet</a>
                        <a class="collapse-item" href="<?php echo base_url('layanan_infrastruktur_controllers/BuatDomainWebsite') ?>">Buat Domain Webiste</a>
                        <a class="collapse-item" href="<?php echo base_url('layanan_infrastruktur_controllers/BuatDomainOJS') ?>">Buat Domain OJS</a>
                        <a class="collapse-item" href="<?php echo base_url('layanan_infrastruktur_controllers/MaintanceOJS') ?>">Maintence Web/OJS</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mahasiswa_alumni"
                    aria-expanded="true" aria-controls="mahasiswa_alumni">
                    <i class="fal fa-fw fa-copy"></i>
                    <span>Mahasiswa & Alumni</span>
                </a>
                <div id="mahasiswa_alumni" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('mahasiswa_alumni_controllers/Ujian_TI') ?>">Ujian TI</a>
                        <a class="collapse-item" href="<?php echo base_url('mahasiswa_alumni_controllers/Ubah_PD_Dikti') ?>">Ubah Data PD Dikti</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#layanan_umum"
                    aria-expanded="true" aria-controls="layanan_umum">
                    <i class="fal fa-fw fa-copy"></i>
                    <span>Layanan Umum</span>
                </a>
                <div id="layanan_umum" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('layanan_umum_controllers/SewaLaborTI') ?>">Sewa Labor IT</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>About</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('welcome/logout')?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
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
                    <h4 class="font-weight-bold">Universitas Goican Indonesia</h4>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang | Users </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->