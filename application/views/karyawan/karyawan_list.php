<div class="row">
    <div class="col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                <h4><b><i class="fa fa-newspaper-o"></i> Data Karyawan</b></h4>
            </div>
            <div class="box-body">
                <div style="padding-left: 15px; padding-bottom: 15px;">
                    <?= anchor(site_url('karyawan/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                </div>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Karyawan</th>
                                <th>NIK</th>
                                <th>Nama Jabatan</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <!-- <th>Username</th> -->
                                <!-- <th>Password</th> -->
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($karyawan_data as $karyawan) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $karyawan->nama_karyawan ?></td>
                                    <td><?= $karyawan->nik ?></td>
                                    <td><?= $karyawan->nama_jabatan ?></td>
                                    <td><?= $karyawan->jenis_kelamin ?></td>
                                    <td><?= $karyawan->alamat ?></td>
                                    <td><?= $karyawan->tanggal_lahir ?></td>
                                    <!-- <td><?= $karyawan->username ?></td> -->
                                    <!-- <td><?= $karyawan->password ?></td> -->
                                    <td style="text-align:center">
                                        <a href="<?= site_url('karyawan/read/' . $karyawan->id_karyawan) ?>" title="Lihat Detail Data" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <a href="<?= site_url('karyawan/update/' . $karyawan->id_karyawan) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?= site_url('karyawan/delete/' . $karyawan->id_karyawan) ?>" title="Hapus Data" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash-o"></i></a>
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