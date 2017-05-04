<div class="page-header">
	<h2>Penulis</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<?php
	if ($penulis != NULL) {
?>
		<table class="table table-striped table-hover">
			<tr>
				<th>No</th>
				<th>Nama Penulis</th>
				<th>Alamat</th>
				<th>email</th>
				<th>Deskripsi</th>
				<th>Aksi</th>
			</tr>
			<?php
				foreach ($penulis as $value) {
			?>
					<tr>
						<td><?php echo $counter; ?></td>
						<td><?php echo $value->penulis; ?></td>
						<td><?php echo $value->alamat; ?></td>
						<td><?php echo $value->email; ?></td>
						<td><?php echo $value->deskripsi; ?></td>
						<td><a href="<?php echo site_url("admin/editPenulis/$value->kd_penulis"); ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>  <a href="<?php echo site_url("admin/hapus/penulis/kd_penulis/$value->kd_penulis/penulis"); ?>" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a></td>
					</tr>
			<?php
					$counter++;
				}
			?>
		</table>
		<div class="pull-right">
			<?php echo $pagination; ?>
		</div>
<?php
	}else {
?>
		<div class="alert alert-danger" role="alert">Belum ada Data Penulis</div>
<?php
	}
?>
<br>
<div class="page-header">
	<h2>Tambah Penulis</h2>
</div>
<form action="<?php echo site_url("admin/proses") ?>" method="POST">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nama">Nama Penulis</label>
				<input type="text" name="penulis" id="nama" class="form-control" placeholder="Nama Penulis" required />
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-goup">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="deskripsi">Deskripsi</label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="4" placeholder="Deskripsi Penulis" required /></textarea>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="alamat">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" placeholder="Alamat Penulis" required /></textarea>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group pull-right">
				<input type="hidden" name="table" value="penulis">
				<input type="hidden" name="req" value="penulis">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</div>
	</div>
</form>