<div class="row">
	<div class="col-md-12">
		<div class="box box-success box-solid">
			<div class="box-header">
				<h4><b><i class="fa fa-eye"></i> Detail Data Master Gaji</b></h4>
			</div>
			<div class="box-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>ID Master</b></td>
							<td><?= $id_master; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Master</b></td>
							<td><?= $nama_master; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Gaji Master</b></td>
							<td class="uang"><?= $gaji_master; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Persen Pajak</b></td>
							<td><?= $persen_pajak; ?>%</td>
						</tr>
					</table>
					<a href="<?= site_url('master_gaji_pokok') ?>" class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>