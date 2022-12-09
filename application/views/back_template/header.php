<header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url('dashboard'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= $mini_judul; ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= $judul; ?></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">       
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $icon; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $nama_user; ?> <i class="fa fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $icon; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?= $nama_user; ?>
                                <small><?= $header_judul; ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer" style="padding: 0">
                            <!-- <div class="">
                                <a href="<?= site_url('profil/index/' . $id) ?>" class="btn btn-primary btn-flat col-sm-12"><i class="fa fa-user"></i> Lihat Profil</a>
                            </div> -->
                            <div class="">
                                <a href="<?= site_url('login/logout') ?>" class="btn btn-danger btn-flat col-sm-12"><i class="fa fa-power-off"></i> Keluar</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>