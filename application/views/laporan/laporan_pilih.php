<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Pilih Karyawan</b></h4>
            </div>
            <div class="box-body">
            <form style="padding: 15px;" action="<?= $action; ?>" method="get" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Karyawan <?= form_error('id_karyawan') ?></label>
                            <div class="col-md-6">
                                <select class="form-control select2" name="id_karyawan" id="id_karyawan">
                                    <option selected disabled value> -- pilih karyawan -- </option>
                                    <?php foreach ($karyawan as $value) { ?>
                                        <option value="<?= $value->id_karyawan ?>"><?= $value->nama_karyawan ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>