<?php
	$asset_path = base_url('assets/');
?>
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

<!-- javascript -->
<script src="<?php echo $asset_path; ?>js/jquery.js"></script>
<script src="<?php echo $asset_path; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $asset_path; ?>js/smoothscroll.js"></script>
<script src="<?php echo $asset_path; ?>js/isotope.js"></script>
<script src="<?php echo $asset_path; ?>js/imagesloaded.min.js"></script>
<script src="<?php echo $asset_path; ?>js/nivo-lightbox.min.js"></script>
<script src="<?php echo $asset_path; ?>js/jquery.backstretch.min.js"></script>
<script src="<?php echo $asset_path; ?>js/wow.min.js"></script>
<?php
	print_r($isLanding);
	if ($isLanding != FALSE) {
?>
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
<?php
	}else {
?>
		<script src="<?php echo $asset_path; ?>js/custom2.js"></script>
<?php
	}
?>
</body>
</html>