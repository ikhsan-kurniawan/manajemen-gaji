<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Transaksi Gaji</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('transaksi_gaji/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Karyawan</th>
                                <th>Gaji Periode</th>
                                <th>Nominal Gaji</th>
                                <th>Potongan Pajak</th>
                                <th>Bonus Gaji</th>
                                <th>Total Gaji</th>
                                <th>Keterangan</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($transaksi_gaji_data as $transaksi_gaji) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $transaksi_gaji->nama_karyawan ?></td>
                                    <td><?= $transaksi_gaji->tanggal ?></td>
                                    <td class="uang"><?= $transaksi_gaji->nominal_gaji ?></td>
                                    <td>
                                        <span class="uang"><?= $transaksi_gaji->potongan_pajak ?></span>
                                        <span style="font-style: italic;">(<?= $transaksi_gaji->persen_pajak; ?>%)</span>
                                    </td>
                                    <td class="uang"><?= $transaksi_gaji->bonus_gaji ?></td>
                                    <td class="uang">
                                        <?= ($transaksi_gaji->nominal_gaji) + ($transaksi_gaji->bonus_gaji) - ($transaksi_gaji->potongan_pajak) ?>
                                    </td>
                                    <td><?= $transaksi_gaji->keterangan ?></td>
                                    <td style="text-align:center">
                                        <a href="<?= site_url('transaksi_gaji/read/' . $transaksi_gaji->id_transaksi) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <a href="<?= site_url('transaksi_gaji/update/' . $transaksi_gaji->id_transaksi) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?= site_url('transaksi_gaji/delete/' . $transaksi_gaji->id_transaksi) ?>" title="Hapus Data" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
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