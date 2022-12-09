<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-tasks"></i> <?= $button ?> Data Karyawan</b></h4>
            </div>
            <div class="box-body">
                <form style="padding: 15px;" action="<?= $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">Id Jabatan <?= form_error('id_jabatan') ?></label>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?= $id_jabatan; ?>" /> -->
                                <select class="form-control select2" name="id_jabatan" id="id_jabatan">
                                    <option selected disabled value> -- pilih jabatan -- </option>
                                    <?php foreach ($jabatan as $value) { ?>
                                        <option value="<?= $value->id_jabatan ?>" <?php if ($value->id_jabatan == $id_jabatan) { ?> selected <?php } ?>><?= $value->id_jabatan ?> - <?= $value->nama_jabatan ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="int">NIK <?= form_error('nik') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?= $nik; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Nama Karyawan <?= form_error('nama_karyawan') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?= $nama_karyawan; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Jenis Kelamin <?= form_error('jenis_kelamin') ?></label>
                            <div class="col-md-6">
                                <!-- <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?= $jenis_kelamin; ?>" /> -->
                                <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin">
                                    <option selected disabled value> -- pilih jenis kelamin -- </option>
                                    <option value="laki-laki" <?php if ($jenis_kelamin == 'laki-laki') { ?> selected <?php } ?>>Laki-laki</option>
                                    <option value="perempuan" <?php if ($jenis_kelamin == 'perempuan') { ?> selected <?php } ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Alamat <?= form_error('alamat') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= $alamat; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="date">Tanggal Lahir <?= form_error('tanggal_lahir') ?></label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $tanggal_lahir; ?>" />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Username <?= form_error('username') ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $username; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2" for="varchar">Password <?= form_error('password') ?></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <input type="hidden" name="id_karyawan" value="<?= $id_karyawan; ?>" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?= $button ?></button>
                                <a href="<?= site_url('karyawan') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>