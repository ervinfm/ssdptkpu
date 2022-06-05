<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> <?= ucfirst($this->uri->segment(2)) ?> - Pemetaan DPT KPU Kota Yogyakarta</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/templates/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="<?= base_url() ?>assets/templates/assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url() ?>assets/templates/assets/js/config.js"></script>
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.css" integrity="sha512-qWufF7Q/gWXkGNDLvqEBFmg2ZfZGtPK5i4syfx7eazH4cUO7FVRnwHzmdgKfJyyXn4koxBCXknEwIIgyE0GZPA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.7.0/sweetalert2.js" integrity="sha512-EY+sOlhMaflzdMPOJAw2CazW4nADfI5B+tFFnfiqQj/4Zjz+S2uWzmx9963PqnCFYFc4qo6ev4pcULlnUdAA0g==" crossorigin="anonymous"></script>
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

</head>

<body>
    <?php $this->view('messages') ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">


                        </span>
                        <span class="app-brand-text menu-text h5" style="color:black">KPU KOTA YOGYAKARTA</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item <?= $this->uri->segment(2) == 'dashboard' ? 'active' : null ?>">
                        <a href="<?= site_url('admin/dashboard') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item <?= $this->uri->segment(2) == 'pemilih' || $this->uri->segment(2) == 'pindah' || $this->uri->segment(2) == 'domisili' ? 'open active' : null ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-data"></i>
                            <div data-i18n="Layouts">Master Data</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item <?= $this->uri->segment(2) == 'pemilih' ? 'active' : null ?>">
                                <a href="<?= site_url('admin/pemilih') ?>" class="menu-link">
                                    <div data-i18n="Without menu">Data DPT</div>
                                </a>
                            </li>
                            <li class="menu-item <?= $this->uri->segment(2) == 'pindah' ? 'active' : null ?>">
                                <a href="<?= site_url('admin/pindah') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Pindah DPT</div>
                                </a>
                            </li>
                            <li class="menu-item <?= $this->uri->segment(2) == 'domisili' ? 'active' : null ?>">
                                <a href="<?= site_url('admin/domisili') ?>" class="menu-link">
                                    <div data-i18n="Without navbar">Domisili</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?= $this->uri->segment(2) == 'clustering' ? 'active' : null ?>">
                        <a href="<?= site_url('admin/clustering') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-customize"></i>
                            <div data-i18n="Analytics">Clustering</div>
                        </a>
                    </li>

                    <li class="menu-item <?= $this->uri->segment(2) == 'hasil' ? 'active' : null ?>">
                        <a href="<?= site_url('admin/hasil') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-briefcase"></i>
                            <div data-i18n="Analytics">Hasil</div>
                        </a>
                    </li>

                    <li class="menu-item <?= $this->uri->segment(2) == 'peta' ? 'active' : null ?>">
                        <a href="<?= site_url('admin/peta') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-map"></i>
                            <div data-i18n="Analytics">Peta Sebaran</div>
                        </a>
                    </li>


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Tools</span>
                    </li>
                    <li class="menu-item <?= $this->uri->segment(2) == 'account' ? 'active' : null ?>">
                        <a href="<?= site_url('admin/account') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Analytics">Account</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $this->uri->segment(2) == 'sistem' ? 'active' : null ?>">
                        <a href="<?= site_url('admin/sistem') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Analytics">Setting</div>
                        </a>
                    </li>

                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <strong>Portal Management Daftar Pemilih Tetap (DPT) KPU Kota Yogyakarta</strong>
                            </div>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= base_url() ?>assets/templates/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= base_url() ?>assets/templates/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block"><?= profil()->nama_user ?></span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('admin/pindah') ?>">
                                            <i class="bx bx-info-circle me-2"></i>
                                            <span class="align-middle">Permohonan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('profil') ?>">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('logout') ?>">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <?= @$contents ?>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme ">
                            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by
                                    <a href="https://mabesgroup.org/" target="_blank" class="footer-link fw-bolder"></a>
                                </div>
                                <div>
                                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                                    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>



            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="<?= base_url() ?>assets/templates/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="<?= base_url() ?>assets/templates/assets/vendor/libs/popper/popper.js"></script>
        <script src="<?= base_url() ?>assets/templates/assets/vendor/js/bootstrap.js"></script>
        <script src="<?= base_url() ?>assets/templates/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="<?= base_url() ?>assets/templates/assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- datatables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>


        <!-- Vendors JS -->
        <script src="<?= base_url() ?>assets/templates/assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <!-- Main JS -->
        <script src="<?= base_url() ?>assets/templates/assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="<?= base_url() ?>assets/templates/assets/js/dashboards-analytics.js"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>