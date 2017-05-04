<?php
	$asset_path = base_url('assets/');
?>
<!-- section BERANDA -->
<section id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>PENGETAHUAN / ILMU / DUNIA</h3>
				<h1><?php echo strtoupper($title); ?></h1>
				<hr>
				<a href="#contact" class="smoothScroll btn btn-danger">HUBUNGI KAMI</a>
				<a href="<?php echo site_url('user/daftar'); ?>" class="smoothScroll btn btn-default">GABUNG</a>
			</div>
		</div>
	</div>		
</section>

<!-- section KATEGORI -->
<section id="work">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<strong><?php echo $jumlah_kategori; ?></strong>
					<h1 class="heading bold">KATEGORI BUKU</h1>
					<hr>
				</div>
			</div>
			<?php
				if ($kategori != NULL) {
					$c = 1;
					foreach ($kategori as $value) {
			?>
						<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="1s">
							<i class="icon-browser medium-icon"></i>
								<h3><?php echo strtoupper($value->jenis_buku); ?></h3>
								<hr>
								<p><?php echo $value->deskripsi; ?></p>
						</div>
			<?php
						if ($c == 3) {
							echo "<div class='clearfix'></div>";
						}
						$c++;
					}
				}
			?>
			<div class="clearfix"></div>
			<div align="center">
				<button class="btn btn-default"><?php echo $sisa ." Kategori Lainnya"; ?></button>
			</div>
		</div>
	</div>
</section>

<!-- section INSPIRASI -->
<section id="about">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<div class="section-title">
					<h1 class="heading bold">BUKU INSPIRASI</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<img src="<?php if(isset($inspirasi->gambar)) echo base_url("cover/$inspirasi->gambar"); ?>" class="img-responsive" alt="about img">
			</div>
			<div class="col-md-6 col-sm-12">
				<h3 class="bold"><?php if(isset($inspirasi->judul)) echo $inspirasi->judul; ?></h3>
				<h1 class="heading bold"><?php if(isset($inspirasi->penulis)) echo "Oleh " .$inspirasi->penulis; ?></h1>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">DESKRIPSI BUKU</a></li>
					<li><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">DEKSRIPSI PENULIS</a></li>
					<li><a href="#social" aria-controls="social" role="tab" data-toggle="tab">PENERBIT</a></li>
				</ul>
				<!-- tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="design">
						<p>
							<?php if(isset($inspirasi->deskripsi)) echo $inspirasi->deskripsi; ?>
						</p>
					</div>
					<div role="tabpanel" class="tab-pane" id="mobile">
						<p>
							<?php
								if (isset($inspirasi->deskripsi_penulis)) {
									echo $inspirasi->deskripsi_penulis;
								}
							?>
						</p>
					</div>
					<div role="tabpanel" class="tab-pane" id="social">
						<p>
							<?php
								if(isset($inspirasi->penerbit)) echo $inspirasi->penerbit;
							?>
						</p>
						<p>
							<?php
								if(isset($inspirasi->deskripsi_penerbit)) echo $inspirasi->deskripsi_penerbit;
							?>
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<!-- section POPULER -->
<div id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<h1 class="heading bold">BUKU POPULER</h1>
					<hr>
				</div>
				<!-- ISO section -->
				<div class="iso-section">
					<ul class="filter-wrapper clearfix">
                   		 <li><a href="#" data-filter="*" class="selected opc-main-bg">Semua</a></li>
                   		 <?php
                   		 	if ($jenis != NULL) {
                   		 		foreach ($jenis as $value) {
                   		?>
									<li><a href="#" class="opc-main-bg" data-filter=".<?php echo $value->jenis_buku; ?>"><?php echo $value->jenis_buku; ?></a></li>
                   		<?php
                   		 		}
                   		 	}
                   		 ?>
               		</ul>
               		<div class="iso-box-section wow fadeIn" data-wow-delay="0.9s">
               			<div class="iso-box-wrapper col4-iso-box">
							<?php
								if ($jenis != NULL) {
									foreach ($jenis as $value) {
										foreach ($buku[$value->kd_jenis] as $value2) {
							?>
											<div class="iso-box <?php echo $value->jenis_buku; ?> col-lg-3 col-md-3 col-sm-6">
				               				 	<a href="<?php echo base_url("cover/$value2->gambar"); ?>" data-lightbox-gallery="portfolio-gallery">
				               				 		<img src="<?php echo base_url("cover/$value2->gambar"); ?>" class="img-responsive" alt="<?php echo $value2->judul; ?>">
				               				 	</a>
				               				</div>
							<?php
										}
							?>
										
							<?php
									}
								}
							?>
               			</div>
               		</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- section ANGGOTA -->
<section id="team">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<strong><?php echo $jumlah_anggota; ?></strong>
					<h1 class="heading bold">ANGGOTA TERDAFTAR</h1>
					<hr>
				</div>
			</div>
			<?php
				if ($anggota != NULL) {
					$delay = 0.9;
					$team = 1;
					foreach ($anggota as $value) {
			?>
						<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="<?php echo $delay; ?>s">
							<div class="team-wrapper">
								<img src="<?php echo $asset_path; ?>images/team<?php echo $team; ?>.jpg" class="img-responsive" alt="team img">
									<div class="team-des">
										<h4><?php echo $value->nama; ?></h4>
										<h3><?php echo $value->email; ?></h3>
										<hr>
										<ul class="social-icon">
											<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
											<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
											<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
										</ul>
									</div>
							</div>
						</div>
			<?php
						$team++;
						$delay += 0.4;
					}
				}
			?>
		</div>
		<br><br><br>
		<div class="row">
			<?php
				if (isset($sisaAnggota)) {
			?>
					<button class="btn btn-default">dan <?php echo $sisaAnggota ." Anggota Lainnya"; ?></button>
			<?php
				}
			?>
		</div>
	</div>
</section>

<!-- section KONTAK -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-center">
				<div class="section-title">
					<h1 class="heading bold">HUBUNGI KAMI</h1>
					<hr>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 contact-info">
				<h2 class="heading bold">INFORMASI KONTAK</h2>
				<address>
					<h3>Perpustakaan GIK</h3>
					<p>Gd. FPMIPA C Lt.1</p>
					<p>Jl. Dr. Setiabudhi No. 229 Bandung 40154 Jawa Barat - Indonesia</p>
				</address>
				<div class="col-md-6 col-sm-4">
					<h3><i class="icon-envelope medium-icon wow bounceIn" data-wow-delay="0.6s"></i> EMAIL</h3>
					<p>cs@gik.com</p>
				</div>
				<div class="col-md-6 col-sm-4">
					<h3><i class="icon-phone medium-icon wow bounceIn" data-wow-delay="0.6s"></i> TELEPON</h3>
					<p>010-020-0340 | 090-080-0760</p>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<form action="#" method="get" class="wow fadeInUp" data-wow-delay="0.6s">
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" placeholder="Name" name="name">
					</div>
					<div class="col-md-6 col-sm-6">
						<input type="email" class="form-control" placeholder="Email" name="email">
					</div>
					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" placeholder="Message" rows="7" name="message"></textarea>
					</div>
					<div class="col-md-offset-4 col-md-8 col-sm-offset-4 col-sm-8">
						<input type="submit" class="form-control" value="SEND MESSAGE">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>