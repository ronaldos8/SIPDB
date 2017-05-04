<!-- menampilkan header yang berisi informasi halaman termasuk meta dan title halaman -->
<?php echo $__header; ?>
<!-- batas header -->

<!-- menampilkan bagian menu navigasi halaman -->
<?php echo $__navigation; ?>
<!-- batas navigation -->

<!-- menampilkan isi atau konten dari halaman akan tampil di tengah-tangah antara navigation dan footer -->
<section <?php if($isLanding == FALSE) echo "id='work' class='container'"; ?>>
	<?php
		if (is_array($__body)) {
			foreach ($__body as $value) {
				echo $value;
			}
		}else echo $__body;
	?>

	<!-- Modal yang akan menampilkan form login anggota -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<form class="form-horizontal" method="POST" action="<?php echo site_url('user/masuk'); ?>">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" id="myModalLabel" align="center">Masuk</h3>
		      </div>
		      <div class="modal-body">
				  <div class="form-group">
				    <label for="username" class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="username" name="user" placeholder="Username" autofocus="true" required >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label>
				          <input type="checkbox"> Ingat saya
				        </label>
				      </div>
				    </div>
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
		        <button type="submit" class="btn btn-primary">Masuk</button>
		      </div>
		    </div>
		1</form>
	  </div>
	</div>
	</section>
<!-- batas body -->

<!-- menampilkan footer -->
<?php echo $__footer; ?>
<!-- batas footer -->