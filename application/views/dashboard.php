<div>
        <h3>Selamat Datang <?= $this->session->userdata('nama_lengkap'); ?></h3>
</div>
<div class="row">

    <?php if ($this->session->userdata('akses') == 'admin') { ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-user" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Karyawan</span>
                    <span class="info-box-number"><?= $jumlah_karyawan; ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jabatan</span>
                    <span class="info-box-number"><?= $jumlah_jabatan; ?></span>
                </div>
            </div>
        </div>
    
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-university" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Master Gaji Pokok</span>
                    <span class="info-box-number"><?= $jumlah_master; ?></span>
                </div>
            </div>
        </div>
    
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Transaksi Gaji</span>
                    <span class="info-box-number"><?= $jumlah_transaksi; ?></span>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->session->userdata('akses') == 'karyawan') { ?>    
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Transaksi Gaji</span>
                    <span class="info-box-number"><?= $jumlah_transaksi; ?></span>
                </div>
            </div>
        </div>
    <?php } ?>


</div>