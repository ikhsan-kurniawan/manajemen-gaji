<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Laporan Gaji <?= $nama_karyawan; ?></b></h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div style="padding-left: 15px; padding-bottom: 15px;">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Data Gaji</span>
                                    <span class="info-box-number"><?= $baris_gaji; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div style="padding-left: 15px; padding-bottom: 15px;">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jabatan</span>
                                    <span class="info-box-number"><?= $jabatan; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Karyawan</th>
                                <th>Waktu Gaji</th>
                                <th>Nominal Gaji</th>
                                <th>Bonus Gaji</th>
                                <th>Total Gaji</th>
                                <th>Keterangan</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_laporan as $transaksi_gaji) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $transaksi_gaji->nama_karyawan ?></td>
                                    <td><?= $transaksi_gaji->waktu_gaji ?></td>
                                    <td class="uang"><?= $transaksi_gaji->nominal_gaji ?></td>
                                    <td class="uang"><?= $transaksi_gaji->bonus_gaji ?></td>
                                    <td class="uang"><?= ($transaksi_gaji->nominal_gaji) + ($transaksi_gaji->bonus_gaji) ?></td>
                                    <td><?= $transaksi_gaji->keterangan ?></td>
                                    <td style="text-align:center">
                                        <a href="<?= site_url('transaksi_gaji/read/' . $transaksi_gaji->id_transaksi) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').DataTable({
            responsive: true
        });
    });
</script>