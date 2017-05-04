<div class="page-header">
	<h2><?php echo $title; ?></h2>
</div>

<div class="row">
	<?php
		if ($this->session->has_userdata('status')) {
			echo $this->session->flashdata('status');
		}
	?>
	<div class="form">
		<form class="form-horizontal" method="POST" action="<?php echo site_url('user/proses'); ?>">
		  <div class="form-group">
		    <label for="nama_lengkap" class="col-sm-offset-2 col-sm-2 control-label">Nama Lengkap</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="nama_lengkap" name="nama" placeholder="Nama Lengkap" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Jenis Kelamin</label>
		    <div class="col-sm-6" align="left">
		      	<label class="radio-inline">
					<input type="radio" name="jk" id="jk" value="Laki-laki" checked required> Laki-laki
				</label>
				<span style="display:inline-block; width: 100px;"></span>
				<label class="radio-inline">
					<input type="radio" name="jk" id="jk" value="Perempuan" required> Perempuan
				</label>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Email</label>
		    <div class="col-sm-6">
		      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="telepon" class="col-sm-offset-2 col-sm-2 control-label">No Handphone</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="telepon" name="telpon" placeholder="No Handphone" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="deskripsi" class="col-sm-offset-2 col-sm-2 control-label">Ceritakan sedikit tentang kamu</label>
		    <div class="col-sm-6">
		      <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10" required></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="username" class="col-sm-offset-2 col-sm-2 control-label">Username</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="telepon" name="user" placeholder="Username" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-offset-2 col-sm-2 control-label">Password</label>
		    <div class="col-sm-6">
		      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-8">
		      <div class="checkbox" align="left">
		        <label>
		          <input type="checkbox" required > Saya setuju dengan syarat dan ketentuan yang berlaku
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-12">
		    	<input type="hidden" name="table" value="anggota">
		    	<input type="hidden" name="req" value="user/daftar">
		    	<input type="hidden" name="sukses" value="Pendaftaran Berhasil! Silahkan masuk menggunakan username dan password yang telah dibuat">
		    	<button type="submit" class="btn btn-default">Daftar</button>
		    </div>
		  </div>
		</form>
	</div>
</div>