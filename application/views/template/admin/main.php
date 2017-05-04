<!--
menampilkan header yang berisi informasi halaman
termasuk meta dan title halaman
-->
<?php echo $__header; ?>

<!-- batas header -->


<!--
menampilkan bagian menu navigasi halaman
-->
<?php echo $__navigation; ?>

<!-- batas navigation -->


<!--
menampilkan isi atau konten dari halaman
akan tampil di tengah-tangah antara navigation dan footer
-->
<div class="container">
	<?php
		if (is_array($__body)) {
			foreach ($__body as $value) {
				echo $value;
			}
		}else echo $__body;
	?>
</div>

<!-- batas body -->


<!-- menampilkan footer -->
<?php echo $__footer; ?>

<!-- batas footer -->