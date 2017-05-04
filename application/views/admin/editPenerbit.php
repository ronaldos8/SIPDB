<div class="page-header">
	<h2>Edit Penerbit</h2>
</div>
<form action="<?php echo site_url("admin/update") ?>" method="POST">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="nama">Nama Penerbit</label>
				<input type="text" name="penerbit" id="nama" class="form-control" value="<?php echo $penerbit->penerbit; ?>" placeholder="Nama Penerbit" required />
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="form-goup">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" value="<?php echo $penerbit->email; ?>" placeholder="Email Penerbit" required />
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="telpon">Telpon</label>
				<input type="text" name="telpon" id="telpon" class="form-control" value="<?php echo $penerbit->telpon; ?>" placeholder="Telpon Penerbit" required />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="deskripsi">Deskripsi</label>
			<textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="4" placeholder="Deskripsi Penerbit" required /><?php echo $penerbit->deskripsi; ?></textarea>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="alamat">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" placeholder="Alamat Penerbit" required /><?php echo $penerbit->alamat; ?></textarea>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group pull-right">
				<input type="hidden" name="table" value="penerbit">
				<input type="hidden" name="req" value="penerbit">
				<input type="hidden" name="fieldID" value="kd_penerbit">
				<input type="hidden" name="ID" value="<?php echo $penerbit->kd_penerbit; ?>">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</div>
	</div>
</form>