<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Slip Gaji</title>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center lh-1 mb-2">
                    <img height="50px" src="<?php echo base_url() ?>assets/images/logo1.png" alt="">
                    <span style="font-weight: bold; font-size:24px" class="">CV JENDERAL SOLUSI DIGITAL</span>
                </div>
                <hr>
                <div class="fw-normal text-center">Slip Gaji Karyawan</div>
                <table class="mt-4 table table-bordered">
                    <tr>
                        <th style="width:20%">Nama Karyawan</th>
                        <td><?= $nama_karyawan; ?></td>
                        <td style="width:20%"></td>
                        <th style="width:20%">Gaji Periode</th>
                        <td><?= $waktu_gaji; ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?= $jabatan; ?></td>
                        <td></td>
                        <th>ID Transaksi</th>
                        <td><?= $id_transaksi; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $alamat; ?></td>
                        <td></td>
                        <th>ID Karyawan</th>
                        <td><?= $id_karyawan; ?></td>
                    </tr>
                </table>
                <hr>
                <table class="mt-4 table table-bordered" style="width: 100%">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Gaji Pokok</td>
                            <td>Rp <?= number_format($nominal_gaji, 0, ',', '.');  ?></td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Bonus Gaji</td>
                            <td>Rp <?= number_format($bonus_gaji, 0, ',', '.');  ?></td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Potongan Pajak</td>
                            <td>Rp <?= number_format($potongan_pajak, 0, ',', '.');  ?></td>
                        </tr>
                        <tr>
                            <td style="width:10%"></td>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>Total gaji</td>
                            <td>Rp <?= number_format($total, 0, ',', '.');  ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <table style="width: 100%">
                    <tr>
                        <td style="width: 30%"></td>
                        <td style="width: 30%"></td>
                        <td style="width: 40%; text-align:center">Purwokerto, <?= $tanggal_sekarang; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 30%; height:120px"></td>
                        <td style="width: 30%"></td>
                        <td style="width: 40%; text-align:right"></td>
                    </tr>
                    <tr>
                        <td style="width: 30%"></td>
                        <td style="width: 30%"></td>
                        <td style="width: 40%; text-align:center; text-decoration: underline; font-weight: bold">Rian Kusdiono</td>
                    </tr>
                    <tr>
                        <td style="width: 30%"></td>
                        <td style="width: 30%"></td>
                        <td style="width: 40%; text-align:center">Bendahara</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>