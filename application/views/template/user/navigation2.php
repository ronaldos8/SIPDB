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
				<?php
					if ($this->session->has_userdata('log')) {
						if ($this->session->userdata('log') == TRUE) {
				?>
							<li>
								<a href="<?php echo site_url('user/'); ?>">
									<?php echo $this->session->userdata('nama'); ?>
								</a>
							</li>
				<?php
						}
					}else {
				?>
						<li><a href="#" data-toggle="modal" data-target="#myModal">MASUK</a></li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
</section>