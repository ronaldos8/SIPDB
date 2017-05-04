<div class="page-header">
	<h2>Karangan</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php
			if ($karangan != NULL) {
		?>
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Judul Buku</th>
						<th>Tahun Terbit</th>
						<th>Penulis</th>
						<th>Jumlah Buku</th>
						<th>Aksi</th>
					</tr>
					<?php
						$offset = $counter-1;
						foreach ($karangan as $value) {
					?>
							<tr>
								<td><?php echo $counter; ?></td>
								<?php 
									if (isset($id_edit)) {
										if ($value->kd_karangan == $id_edit) {
								?>
											<form action="<?php echo site_url("admin/update") ?>" method="POST">
												<td>
													<select name="kd_buku" class="form-control" required >
													<?php
														if ($buku != NULL) {
													?>
															<option value="">--- Pilih Judul Buku ---</option>
													<?php
															foreach ($buku as $value2) {
													?>
																<option <?php if($value->kd_buku == $value2->no_buku) echo "selected"; ?> value="<?php echo $value2->no_buku; ?>"><?php echo $value2->judul; ?></option>
													<?php
															}
														}
													?>
												</select>
												</td>
												<td>
													<input type="text" value="<?php echo $value->thn_terbit; ?>" class="form-control" readonly />
												</td>
												<td>
													<select name="kd_penulis" class="form-control" required >
													<?php
														if ($penulis != NULL) {
													?>
															<option value="">--- Pilih Nama Penulis ---</option>
													<?php
															foreach ($penulis as $value3) {
													?>
																<option <?php if($value->kd_penulis == $value3->kd_penulis) echo "selected"; ?> value="<?php echo $value3->kd_penulis; ?>"><?php echo $value3->penulis; ?></option>
													<?php
															}
														}
													?>
												</select>
												</td>
												<td>
													<input type="number" name="jml_buku" class="form-control" min="1" value="<?php echo $value->jml_buku; ?>" placeholder="Jumlah Buku" required />
												</td>
												<td>
													<input type="hidden" name="table" value="karangan">
													<?php
														if ($offset >= 5) {
															$page = "/";
															$page .= $offset;
														}else $page = "";
													?>
													<input type="hidden" name="req" value="karangan<?php echo $page; ?>">
													<input type="hidden" name="fieldID" value="kd_karangan">
													<input type="hidden" name="ID" value="<?php echo $value->kd_karangan; ?>">
													<button type="submit" class="btn btn-info">Simpan</button>
												</td>
											</form>
								<?php
										}else {
								?>
											<td><?php echo $value->judul; ?></td>
											<td><?php echo $value->thn_terbit; ?></td>
											<td><?php echo $value->penulis; ?></td>
											<td><?php echo $value->jml_buku; ?></td>
											<td>
												<a href="<?php echo site_url("admin/karangan/$offset/$value->kd_karangan"); ?>"><i class="glyphicon glyphicon-edit"></i></a>
												<a href="<?php echo site_url("admin/hapus/karangan/kd_karangan/$value->kd_karangan/karangan"); ?>"><i class="glyphicon glyphicon-trash"></i></a>
											</td>
								<?php
										}
									}else {
								?>
										<td><?php echo $value->judul; ?></td>
										<td><?php echo $value->thn_terbit; ?></td>
										<td><?php echo $value->penulis; ?></td>
										<td><?php echo $value->jml_buku; ?></td>
										<td>
											<a href="<?php echo site_url("admin/karangan/$offset/$value->kd_karangan"); ?>"><i class="glyphicon glyphicon-edit"></i></a>
											<a href="<?php echo site_url("admin/hapus/karangan/kd_karangan/$value->kd_karangan/karangan"); ?>"><i class="glyphicon glyphicon-trash"></i></a>
										</td>
								<?php
									}
								?>
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
				<div class="alert alert-danger" role="alert">Belum ada data karangan</div>
		<?php
			}
		?>
	</div>
</div>

<div class="page-header">
	<h2>Tambah Karangan</h2>
</div>

<div class="row">
	<div class="form-responsive">
		<form action="<?php echo site_url("admin/proses"); ?>" method="POST">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<select name="kd_buku" class="form-control" required >
						<?php
							if ($buku != NULL) {
						?>
								<option value="">--- Pilih Judul Buku ---</option>
						<?php
								foreach ($buku as $value) {
						?>
									<option value="<?php echo $value->no_buku; ?>"><?php echo $value->judul; ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="form-group">
					<select name="kd_penulis" class="form-control" required >
						<?php
							if ($penulis != NULL) {
						?>
								<option value="">--- Pilih Nama Penulis ---</option>
						<?php
								foreach ($penulis as $value) {
						?>
									<option value="<?php echo $value->kd_penulis; ?>"><?php echo $value->penulis; ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-3" col-sm-3 col-xs-12>
				<div class="form-group">
					<input type="number" name="jml_buku" class="form-control" min="1" placeholder="Jumlah Buku" required />
				</div>
			</div>
			<div class="col-md-3" col-sm-3 col-xs-12>
				<div class="form-group">
					<input type="hidden" name="table" value="karangan">
					<input type="hidden" name="req" value="karangan">
					<button type="submit" class="btn btn-info">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<br><br>