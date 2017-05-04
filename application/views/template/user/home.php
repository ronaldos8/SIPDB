<?php
	$asset_path = base_url('assets/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="stylesheet" href="<?php echo $asset_path; ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $asset_path; ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $asset_path; ?>css/animate.min.css">
	<link rel="stylesheet" href="<?php echo $asset_path; ?>css/et-line-font.css">
	<link rel="stylesheet" href="<?php echo $asset_path; ?>css/nivo-lightbox.css">
	<link rel="stylesheet" href="<?php echo $asset_path; ?>css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="<?php echo $asset_path; ?>css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-circle">
       <div class="sk-circle1 sk-circle"></div>
       <div class="sk-circle2 sk-circle"></div>
       <div class="sk-circle3 sk-circle"></div>
       <div class="sk-circle4 sk-circle"></div>
       <div class="sk-circle5 sk-circle"></div>
       <div class="sk-circle6 sk-circle"></div>
       <div class="sk-circle7 sk-circle"></div>
       <div class="sk-circle8 sk-circle"></div>
       <div class="sk-circle9 sk-circle"></div>
       <div class="sk-circle10 sk-circle"></div>
       <div class="sk-circle11 sk-circle"></div>
       <div class="sk-circle12 sk-circle"></div>
    </div>
</div>

<!-- navigation section -->
<section class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand"><?php echo strtoupper($title); ?></a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">BERANDA</a></li>
				<li><a href="#work" class="smoothScroll">KATEGORI</a></li>
				<li><a href="#about" class="smoothScroll">INSPIRASI</a></li>
				<li><a href="#portfolio" class="smoothScroll">POPULER</a></li>
				<li><a href="#team" class="smoothScroll">ANGGOTA</a></li>
				<li><a href="#contact" class="smoothScroll">KONTAK</a></li>
				<li><a href="<?php echo site_url('buku'); ?>">BUKU</a></li>
				<li><a href="<?php echo site_url('user/masuk'); ?>">MASUK</a></li>
			</ul>
		</div>
	</div>
</section>

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
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.9s">
				<div class="team-wrapper">
					<img src="<?php echo $asset_path; ?>images/team1.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Cindy</h4>
							<h3>Senior Designer</h3>
							<hr>
							<ul class="social-icon">
								<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
								<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
							</ul>
						</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="1.3s">
				<div class="team-wrapper">
					<img src="<?php echo $asset_path; ?>images/team2.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Mary</h4>
							<h3>Core Developer</h3>
							<hr>
							<ul class="social-icon">
								<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
								<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
							</ul>
						</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="1.6s">
				<div class="team-wrapper">
					<img src="<?php echo $asset_path; ?>images/team3.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Linda</h4>
							<h3>Manager</h3>
							<hr>
							<ul class="social-icon">
								<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
								<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
							</ul>
						</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 wow fadeIn" data-wow-delay="1.6s">
				<div class="team-wrapper">
					<img src="<?php echo $asset_path; ?>images/team4.jpg" class="img-responsive" alt="team img">
						<div class="team-des">
							<h4>Sandar</h4>
							<h3>Accountant</h3>
							<hr>
							<ul class="social-icon">
								<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
								<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
								<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
							</ul>
						</div>
				</div>
			</div>
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

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Template from: <a href="http://www.tooplate.com" target="_parent">Tooplate</a> | Redesign by <a href="#">GIK Team</a></p>
				<hr>
				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow fadeIn" data-wow-delay="0.3s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeIn" data-wow-delay="0.6s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-behance wow fadeIn" data-wow-delay="0.9s"></a></li>
					<li><a href="#" class="fa fa-tumblr wow fadeIn" data-wow-delay="0.9s"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>


<script src="<?php echo $asset_path; ?>js/jquery.js"></script>
<script src="<?php echo $asset_path; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $asset_path; ?>js/smoothscroll.js"></script>
<script src="<?php echo $asset_path; ?>js/isotope.js"></script>
<script src="<?php echo $asset_path; ?>js/imagesloaded.min.js"></script>
<script src="<?php echo $asset_path; ?>js/nivo-lightbox.min.js"></script>
<script src="<?php echo $asset_path; ?>js/jquery.backstretch.min.js"></script>
<script src="<?php echo $asset_path; ?>js/wow.min.js"></script>
<script src="<?php echo $asset_path; ?>js/custom.js"></script>
<script>
	$(function(){
		  // HOME BACKGROUND SLIDESHOW
		  $(function(){
		    jQuery(document).ready(function() {
		    $('#home').backstretch([
		       "<?php echo $asset_path ?>images/slide-4.jpg",
		       "<?php echo $asset_path ?>images/slide-1.jpg",
		       "<?php echo $asset_path ?>images/slide-2.jpg",
		       "<?php echo $asset_path ?>images/slide-3.jpg",
		        ],  {duration: 2000, fade: 750});
		    });
		  })

	})
</script>

</body>
</html>