<style>
	/* FILTER CSS */
  .filter-wrapper2 {
      width: 100%;
      margin: 40px 0 24px 0;
      overflow: block !important;
      text-align: center;
  }
  .filter-wrapper2 li {
      display: inline-block;
      margin: 4px;
  }
  .filter-wrapper2 li a {
      color: #999999;
      font-size: 13px;
      font-weight: bold;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 8px 17px;
      display: block;
      text-decoration: none;
      transition: none !important;
  }
  .filter-wrapper2 li .selected,
  .filter-wrapper2 li a:focus,
  .filter-wrapper2 li a:hover {
    color: #00c6d7;
    outline: none !important;
  }
</style>

<div class="page-header">
	<h3><?php echo $title; ?></h3>
</div>
<div class="iso-section">
	<ul class="filter-wrapper2 clearfix">
    <li><a href="<?php echo site_url('buku'); ?>" class="<?php if($kd_jenis == 0) echo "selected"; ?> opc-main-bg">Semua</a></li>
      <?php
        if ($jenis != NULL) {
          foreach ($jenis as $value) {
      ?>
            <li><a class="<?php if($value->kd_jenis == $kd_jenis) echo "selected"; ?>" href="<?php echo site_url("buku/index/$value->kd_jenis"); ?>"><?php echo $value->jenis_buku; ?></a></li>
		  <?php
		 		}
		 	}
		  ?>
  </ul>
  <div class="wow fadeIn" data-wow-delay="0.5s">
      <?php
				if ($buku != NULL) {
					foreach ($buku as $value) {
  		?>
						<div class="col-lg-2 col-md-2 col-sm-4">
     				 	<a href="<?php echo base_url("cover/$value->gambar"); ?>">
     				 		<img style="height: auto;" src="<?php echo base_url("cover/$value->gambar"); ?>" class="img-responsive" alt="<?php echo $value->judul; ?>">
     				 	</a>
              <div class="desk" align="center">
                <a href="<?php echo site_url("buku/detail/$value->kd_karangan"); ?>">
                  <?php echo $value->judul; ?>
                </a>
              </div>
     				</div>
		<?php
					}
				}
			?>
	</div>

</div>
<div class="clearfix"></div>
<?php
	echo $pagination;
?>