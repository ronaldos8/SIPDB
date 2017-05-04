<div class="page-header">
	<h2>Penerbit</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<?php
	if ($penerbit != NULL) {
?>
		<table class="table table-striped table-hover">
			<tr>
				<th>No</th>
				<th>Nama Penerbit</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Deskripsi</th>
				<th>Aksi</th>
			</tr>
			<?php
				foreach ($penerbit as $value) {
			?>
					<tr>
						<td><?php echo $counter; ?></td>
						<td><?php echo $value->penerbit; ?></td>
						<td><?php echo $value->alamat; ?></td>
						<td><?php echo $value->telpon; ?></td>
						<td><?php echo $value->email; ?></td>
						<td><?php echo $value->deskripsi; ?></td>
						<td><a href="<?php echo site_url("admin/editPenerbit/$value->kd_penerbit"); ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>  <a href="<?php echo site_url("admin/hapus/penerbit/kd_penerbit/$value->kd_penerbit/penerbit"); ?>" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a></td>
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
		<div class="alert alert-danger" role="alert">Belum ada Data Penerbit</div>
<?php
	}
?>
<br>
<div class="page-header">
	<h2>Tambah Penerbit</h2>
</div>
<form action="<?php echo site_url("admin/proses") ?>" method="POST">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="nama">Nama Penerbit</label>
				<input type="text" name="penerbit" id="nama" class="form-control" placeholder="Nama Penerbit" required />
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="form-goup">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Email Penerbit" required />
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="telpon">Telpon</label>
				<input type="text" name="telpon" id="telpon" class="form-control" placeholder="Telpon Penerbit" required />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="deskripsi">Deskripsi</label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="4" placeholder="Deskripsi Penerbit" required /></textarea>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="alamat">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" placeholder="Alamat Penerbit" required /></textarea>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group pull-right">
				<input type="hidden" name="table" value="penerbit">
				<input type="hidden" name="req" value="penerbit">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</div>
	</div>
</form>