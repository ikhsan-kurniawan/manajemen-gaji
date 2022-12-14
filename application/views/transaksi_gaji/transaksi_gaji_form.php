<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Transaksi Gaji</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Karyawan <?= form_error('id_karyawan') ?></label>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="Id Karyawan" value="<?= $id_karyawan; ?>" /> -->
                                <select class="form-control select2" name="id_karyawan" id="id_karyawan">
                                    <option selected disabled value> -- pilih karyawan -- </option>
                                    <?php foreach ($karyawan as $value) { ?>
                                        <option value="<?= $value->id_karyawan ?>" <?php if ($value->id_karyawan == $id_karyawan) { ?> selected <?php } ?>><?= $value->id_karyawan ?> - <?= $value->nama_karyawan ?> - <?= $value->nama_jabatan; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Nominal Gaji <?= form_error('id_master') ?></label>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="id_master" id="id_master" placeholder="Id Master" value="<?= $id_master; ?>" /> -->
                                <select class="form-control select2" name="id_master" id="id_master">
                                    <option selected disabled value> -- pilih gaji pokok-- </option>
                                    <?php foreach ($master as $value) { ?>
                                        <option value="<?= $value->id_master ?>" <?php if ($value->id_master == $id_master) { ?> selected <?php } ?>><?= $value->nama_master ?> - Rp <?= number_format($value->gaji_master, 0, ',', '.');  ?> - <?= $value->persen_pajak; ?>%
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Periode Gaji <?= form_error('waktu_gaji') ?></label>
                            <div class="col-md-6">
                                <input type="month" class="form-control" name="waktu_gaji" id="waktu_gaji" placeholder="Waktu Gaji" value="<?= $waktu_gaji; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Bonus Gaji <?= form_error('bonus_gaji') ?></label>
                            <div class="col-md-6">
                                <input autocomplete="off" type="text" class="form-control uang" name="bonus_gaji" id="bonus_gaji" placeholder="Bonus Gaji" value="<?= $bonus_gaji; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Nominal Gaji <?= form_error('nominal_gaji') ?></label>
                            <div class="col-md-6">
                                <input disabled type="text" class="form-control" name="nominal_gaji" id="nominal_gaji" placeholder="Nominal Gaji" value="<?= $nominal_gaji; ?>" />
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Keterangan <?= form_error('keterangan') ?></label>
                            <div class="col-md-6">
                                <input autocomplete="off" type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?= $keterangan; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_transaksi" value="<?= $id_transaksi; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('transaksi_gaji') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>