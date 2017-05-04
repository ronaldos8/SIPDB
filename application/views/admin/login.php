<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Admin</title>
	<!-- untuk menghubungkan HTML atau halaman ini dengan CSS bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
	<style type="text/css">
		body {
			margin-top: 100px;
		}
	</style>
</head>
<body>
	<div class="col-md-offset-4 col-sm-offset-3 col-xs-offset-3 col-md-4 col-sm-6 col-xs-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
			    <h2 align="center"><b>Login Admin</b></h2>
			</div>
			<div class="panel-body">
		    	<form action="<?php echo site_url('login/proses_login'); ?>" method="POST">
		    		<div class="form-group">
		    			<label for="username">Username</label>
		    			<input type="text" name="username" placeholder="Username" class="form-control" id="username" autofocus required />
		    		</div>

		    		<div class="form-group">
		    			<label for="password">Password</label>
		    			<input type="password" name="password" placeholder="Password" class="form-control" id="password" required />
		    		</div>
					<?php
						if ($this->session->has_userdata('status')) {
					?>
							<div class="form-group" align="center">
								<span class="text-danger"><?php echo $this->session->flashdata('status'); ?></span>
							</div>
					<?php
						}
					?>
		    		<div class="form-group">
		    			<button type="submit" class="btn btn-primary">Login</button>
		    		</div>
		    	</form>
			</div>
		</div>
	</div>
</body>
</html>