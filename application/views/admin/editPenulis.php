<div class="page-header">
	<h2>Edit Penulis</h2>
</div>
<form action="<?php echo site_url("admin/update") ?>" method="POST">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nama">Nama Penulis</label>
				<input type="text" name="penulis" id="nama" class="form-control" value="<?php echo $penulis->penulis; ?>" placeholder="Nama Penulis" required />
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-goup">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" value="<?php echo $penulis->email; ?>" placeholder="Email" required />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="deskripsi">Deskripsi</label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="4" placeholder="Deskripsi Penulis" required /><?php echo $penulis->deskripsi; ?></textarea>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="alamat">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" placeholder="Alamat Penulis" required /><?php echo $penulis->alamat; ?></textarea>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group pull-right">
				<input type="hidden" name="table" value="penulis">
				<input type="hidden" name="req" value="penulis">
				<input type="hidden" name="fieldID" value="kd_penulis">
				<input type="hidden" name="ID" value="<?php echo $penulis->kd_penulis; ?>">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</div>
	</div>
</form>