<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Master Gaji</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('master_gaji_pokok/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Master Gaji</th>
                                <th>Nominal Gaji Pokok</th>
                                <th>Persen Pajak</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($master_gaji_pokok_data as $master_gaji_pokok) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $master_gaji_pokok->nama_master ?></td>
                                    <td class="uang"><?= $master_gaji_pokok->gaji_master ?></td>
                                    <td><?= $master_gaji_pokok->persen_pajak ?>%</td>
                                    <td style="text-align:center">
                                        <a href="<?= site_url('master_gaji_pokok/read/' . $master_gaji_pokok->id_master) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <a href="<?= site_url('master_gaji_pokok/update/' . $master_gaji_pokok->id_master) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?= site_url('master_gaji_pokok/delete/' . $master_gaji_pokok->id_master) ?>" title="Hapus Data" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
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