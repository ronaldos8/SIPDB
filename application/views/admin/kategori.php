<div class="page-header">
	<h2>Kategori Buku</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<?php
	if ($kategori != NULL) {
		$counter = 1;
		echo "<div class='row'>";
		foreach ($kategori as $value) {
?>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
				    	<h3 class="panel-title"><?php echo $value->jenis_buku; ?></h3>
					</div>
					<div class="panel-body">
				    	<?php echo $value->deskripsi; ?>
				    	<br><br>
				    	<a href="<?php echo site_url("admin/editkategori/$value->kd_jenis"); ?>">Edit</a> | <a href="<?php echo site_url("admin/hapus/jenis/kd_jenis/$value->kd_jenis/kategori"); ?>">Hapus</a>
					</div>
				</div>
			</div>
<?php
			if ($counter % 3 == 0) {
				echo "</div>";
				echo "<div class='row'>";
			}
			$counter++;
		}
		echo "</div>";
	}else {
?>
		<div class="alert alert-danger" role="alert">Belum ada kategori buku</div>
<?php
	}
?>
	<div class="pull-right">
		<?php echo $pagination; ?>
	</div>
<div class="page-header">
	<h2>Tambah Kategori Buku</h2>
</div>
<form action="<?php echo site_url('admin/proses'); ?>" method="POST">
	<div class="row">
		<div class="col-md-3 col-sm-4 col-xs-12">
			<div class="form-group">
				<label for="name">Nama Kategori</label>
				<input type="text" id="name" class="form-control" name="jenis_buku" value="" placeholder="Nama Kategori" required />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-sm-8 col-xs-12">
			<div class="form-group">
				<label for="deskripsi">Deskripsi Kategori</label>
				<textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10" required /></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group">
				<input type="hidden" name="table" value="jenis">
				<input type="hidden" name="req" value="kategori">
				<button type="submit" class="btn btn-info">Simpan</button>
			</div>
		</div>
	</div>
</form>