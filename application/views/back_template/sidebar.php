<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $icon; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $nama_user; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <li class="<?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                <a href="<?php echo site_url('dashboard') ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if ($this->session->userdata('akses') == 'admin') { ?>
                <li class="<?php echo ($this->uri->segment(1) == 'karyawan') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('karyawan') ?>">
                        <i class="fa fa-user"></i> <span>Karyawan</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'jabatan') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('jabatan') ?>">
                        <i class="fa fa-briefcase"></i> <span>Jabatan</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'master_gaji_pokok') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('master_gaji_pokok') ?>">
                        <i class="fa fa-university"></i> <span>Master Gaji</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'transaksi_gaji') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('transaksi_gaji') ?>">
                        <i class="fa fa-exchange"></i> <span>Transaksi Gaji</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == 'laporan') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('laporan') ?>">
                        <i class="fa fa-line-chart "></i> <span>Laporan</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>