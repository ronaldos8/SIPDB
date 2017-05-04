<div class="page-header">
	<h2><?php echo $buku->judul; ?></h2>
</div>

<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="img-responsive">
			<img src="<?php echo base_url("cover/$buku->gambar"); ?>" class="img-responsive" alt="">
		</div>
	</div>
	<div class="col-md-8 col-sm-6 col-xs-12">
		<table class="table">
			<tr>
				<td><b>No ISBN</b></td>
				<td>:</td>
				<td><?php echo $buku->isbn; ?></td>
			</tr>
			<tr>
				<td><b>Deskripsi</b></td>
				<td>:</td>
				<td><?php echo $buku->deskripsi; ?></td>
			</tr>
			<tr>
				<td><b>Jenis Buku</b></td>
				<td>:</td>
				<td><?php echo $buku->jenis_buku; ?></td>
			</tr>
			<tr>
				<td><b>Penerbit</b></td>
				<td>:</td>
				<td><?php echo $buku->penerbit; ?></td>
			</tr>
			<tr>
				<td><b>Tahun Terbit</b></td>
				<td>:</td>
				<td><?php echo $buku->thn_terbit; ?></td>
			</tr>
			<tr>
				<td><b>Rak Buku</b></td>
				<td>:</td>
				<td><?php echo $buku->rak_buku; ?></td>
			</tr>
			<tr>
				<td><b>Kondisi</b></td>
				<td>:</td>
				<td><?php echo $buku->kondisi; ?></td>
			</tr>
		</table>
	</div>
</div>