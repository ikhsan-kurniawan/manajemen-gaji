<div class="row">
	<div class="col-md-12">
		<div class="box box-success box-solid">
			<div class="box-header">
				<h4><b><i class="fa fa-eye"></i> Detail Data Transaksi Gaji</b></h4>
			</div>
			<div class="box-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>ID Transaksi</b></td>
							<td><?= $id_transaksi; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Periode Gaji</b></td>
							<td><?= $waktu_gaji; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Karyawan</b></td>
							<td><?= $nama_karyawan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Jabatan Karyawan</b></td>
							<td><?= $jabatan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nominal Gaji</b></td>
							<td class="uang"><?= $nominal_gaji; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Persen Pajak</b></td>
							<td><?= $persen_pajak; ?>%</td>
						</tr>
						<tr>
							<td width="20%"><b>Potongan Pajak</b></td>
							<td class="uang"><?= $potongan_pajak; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Bonus Gaji</b></td>
							<td class="uang"><?= $bonus_gaji; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Total Gaji</b></td>
							<td class="uang"><?= $total; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Keterangan</b></td>
							<td><?= $keterangan; ?></td>
						</tr>
					</table>
					<div class="text-center">
						<a target="_blank" class="btn btn-primary" href="<?= site_url('transaksi_gaji/laporan/' . $id_transaksi) ?>">
							<i class="fa fa-file-text"></i> PDF
						</a>
					</div>
					<!-- <a href="<?= site_url('transaksi_gaji') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a> -->
				</div>
			</div>
		</div>
	</div>
</div>