<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Master Gaji</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama Master Gaji<?= form_error('nama_master') ?></label>
                            <div class="col-md-6">
                                <input autocomplete="off" type="text" class="form-control" name="nama_master" id="nama_master" placeholder="Nama Master Gaji" value="<?= $nama_master; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Nominal Gaji Pokok <?= form_error('gaji_master') ?></label>
                            <div class="col-md-6">
                                <input autocomplete="off" type="text" class="form-control uang" name="gaji_master" id="gaji_master" placeholder="Nominal Gaji Pokok" value="<?= $gaji_master; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Persen Pajak <?= form_error('persen_pajak') ?></label>
                            <div class="col-md-6">
                                <select class="form-control" name="persen_pajak" id="persen_pajak">
                                    <option selected disabled> -- pilih persen pajak -- </option>
                                    <option value="0" <?php if ($persen_pajak == "0") { ?> selected <?php } ?>>0%</option>
                                    <option value="5" <?php if ($persen_pajak == "5") { ?> selected <?php } ?>>5%</option>
                                    <option value="11" <?php if ($persen_pajak == "11") { ?> selected <?php } ?>>11%</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_master" value="<?= $id_master; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('master_gaji_pokok') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>