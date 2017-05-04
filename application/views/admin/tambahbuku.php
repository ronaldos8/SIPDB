<div class="page-header">
	<h2>Tambah Buku</h2>
</div>

<div class="form-responsive">
	<form action="<?php echo site_url("admin/prosesBuku"); ?>" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="judul">Judul Buku</label>
					<input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Buku" required />
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="isbn">No ISBN</label>
					<input type="text" name="isbn" id="isbn" class="form-control" placeholder="No ISBN Buku" required />
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="rak">Rak Buku</label>
					<input type="number" name="rak_buku" id="rak" class="form-control" placeholder="No Rak Buku" required />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="jenis">Kategori Buku</label>
					<select name="kd_jenis" id="jenis" class="form-control" required />
						<?php
							if ($jenis != NULL) {
								foreach ($jenis as $value) {
						?>
									<option value="<?php echo $value->kd_jenis; ?>"><?php echo $value->jenis_buku; ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="penerbit">Penerbit</label>
					<select name="kd_penerbit" id="penerbit" class="form-control" required >
						<?php
							if ($penerbit != NULL) {
								foreach ($penerbit as $value) {
						?>
									<option value="<?php echo $value->kd_penerbit; ?>"><?php echo $value->penerbit; ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="tahun">Tahun Terbit</label>
					<input type="text" name="thn_terbit" id="tahun" class="form-control" placeholder="Tahun terbit" required />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="deskripsi">Deskripsi Buku</label>
					<textarea name="deskripsi" id="desckripsi" class="form-control" cols="30" rows="4" required ></textarea>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="kondisi">Kondisi</label>
					<select name="kondisi" class="form-control" id="kondisi" required >
						<option value="Baru">Baru</option>
						<option value="Bekas">Bekas</option>
					</select>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
					<label for="gambar">Gambar Buku</label>
					<input type="file" name="gambar" value="" placeholder="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<button class="btn btn-info pull-right" type="submit">Simpan</button>
				</div>
			</div>
		</div>
	</form>
</div>