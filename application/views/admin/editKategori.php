<div class="page-header">
	<h2>Edit Kategori Buku</h2>
</div>
<form action="<?php echo site_url('admin/update'); ?>" method="POST">
	<div class="row">
		<div class="col-md-3 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="name">Nama Kategori</label>
				<input type="text" id="name" class="form-control" name="jenis_buku" value="<?php echo $kategori->jenis_buku; ?>" placeholder="Nama Kategori">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-sm-8 col-xs-12">
			<div class="form-group">
				<label for="deskripsi">Deskripsi Kategori</label>
				<textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"><?php echo $kategori->deskripsi; ?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
				<input type="hidden" name="table" value="jenis">
				<input type="hidden" name="req" value="kategori">
				<input type="hidden" name="fieldID" value="kd_jenis">
				<input type="hidden" name="ID" value="<?php echo $kategori->kd_jenis; ?>">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</div>
	</div>
</form>