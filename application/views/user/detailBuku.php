<div class="page-header">
	<h2><?php echo $buku->judul; ?></h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="iso-box-section wow fadeIn" data-wow-delay="0.9s">
		    <div class="iso-box-wrapper col4-iso-box">
		    	<div class="iso-box2 col-lg-12 col-md-12 col-sm-12">
				 	<a href="<?php echo base_url("cover/$buku->gambar"); ?>" data-lightbox-gallery="portfolio-gallery">
				 		<img src="<?php echo base_url("cover/$buku->gambar"); ?>" class="img-responsive" alt="<?php echo $buku->judul; ?>">
				 	</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8 col-sm-6 col-xs-12">
		<table class="table">
			<tr>
				<td><b>Penulis</b></td>
				<td>:</td>
				<td><?php echo $buku->penulis; ?></td>
			</tr>
			<tr>
				<td><b>No ISBN</b></td>
				<td>:</td>
				<td><?php echo $buku->isbn; ?></td>
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
			<tr>
				<td><b>Stok</b></td>
				<td>:</td>
				<td><?php echo $buku->jml_buku; ?></td>
			</tr>
			<tr>
				<td><b>Deskripsi</b></td>
				<td>:</td>
				<td><?php echo $buku->deskripsi; ?></td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12" align="center">
		<?php
			if ($this->session->has_userdata('log')) {
		?>
				<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Pinjam</a>
				<a href="<?php echo site_url("buku/tambahKeranjang/$buku->kd_karangan"); ?>" class="btn btn-warning">Simpan ke Keranjang</a>
		<?php
			}
		?>
	</div>
</div>
<br>
<div class="row">
	<div class="collapse" id="collapseExample">
	  <div class="well">
	    <form class="form-horizontal" action="<?php echo site_url("buku/pinjam"); ?>" method="POST">
	    	 <div class="form-group">
			    <label for="jaminan" class="col-sm-2 control-label">Jaminan</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="jaminan" name="jaminan" placeholder="Jaminan" required />
			    </div>
			  </div>
			  <div class="form-group">
			  	<input type="hidden" name="kd_karangan" value="<?php echo $buku->kd_karangan; ?>">
			  	<button type="submit" class="btn btn-primary">Simpan</button>
			  </div>
	    </form>
	  </div>
	</div>
</div>