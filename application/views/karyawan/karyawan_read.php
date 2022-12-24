<div class="row">
	<div class="col-md-12">
		<div class="box box-success box-solid">
			<div class="box-header">
				<h4><b><i class="fa fa-eye"></i> Detail Data Karyawan</b></h4>
			</div>
			<div class="box-body">
				<div style="padding: 15px;">
					<table class="table table-striped">
						<tr>
							<td width="20%"><b>Id Karyawan</b></td>
							<td><?= $id_karyawan; ?></td>
						</tr>
						<!-- <tr>
							<td width="20%"><b>Id Jabatan</b></td>
							<td><?= $id_jabatan; ?></td>
						</tr> -->
						<tr>
							<td width="20%"><b>NIK</b></td>
							<td><?= $nik; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Nama Karyawan</b></td>
							<td><?= $nama_karyawan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Jabatan Karyawan</b></td>
							<td><?= $nama_jabatan; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Jenis Kelamin</b></td>
							<td><?= $jenis_kelamin; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Alamat</b></td>
							<td><?= $alamat; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Tanggal Lahir</b></td>
							<td><?= $tanggal_lahir; ?></td>
						</tr>
						<tr>
							<td width="20%"><b>Status</b></td>
							<td><?= $status; ?></td>
						</tr>
						<!-- <tr>
							<td width="20%"><b>Username</b></td>
							<td><?= $username; ?></td>
						</tr> -->
						<!-- <tr>
							<td width="20%"><b>Password</b></td>
							<td><?= $password; ?></td>
						</tr> -->
					</table>
					<!-- <div class="text-center">
						<a class="btn btn-primary" href="<?= site_url('karyawan/update/' . $this->session->userdata('id')) ?>">
							<i class="fa fa-pencil"></i> Ubah Data
						</a>
					</div> -->
					<a 
					<?php if($status == "aktif"){ ?>
						href="<?= site_url('karyawan') ?>"
					<?php }else{ ?>
						href="<?= site_url('karyawan/arsip') ?>"
					<?php } ?>
						class="btn btn-danger pull-right">
						<i class="fa fa-sign-out"></i> Kembali
					</a>
				</div>
			</div>
		</div>
	</div>
</div>