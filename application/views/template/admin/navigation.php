<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">SIPDB</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php if(isset($v_beranda)) echo $v_beranda; ?>"><a href="<?php echo site_url('admin') ?>">Beranda</a></li>
        <li class="<?php if(isset($v_kategori)) echo $v_kategori; ?>"><a href="<?php echo site_url('admin/kategori'); ?>">Kategori Buku</a></li>
        <li class="<?php if(isset($v_buku)) echo $v_buku; ?>"><a href="<?php echo site_url('admin/buku'); ?>">Data Buku</a></li>
        <li class="<?php if(isset($v_penulis)) echo $v_penulis; ?>"><a href="<?php echo site_url('admin/penulis'); ?>">Penulis</a></li>
        <li class="<?php if(isset($v_penerbit)) echo $v_penerbit; ?>"><a href="<?php echo site_url('admin/penerbit'); ?>">Penerbit</a></li>
        <li class="<?php if(isset($v_karangan)) echo $v_karangan; ?>"><a href="<?php echo site_url('admin/karangan'); ?>">Karangan</a></li>
      </ul>
        
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $nama; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('admin/pengaturan'); ?>">Pengaturan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo site_url('admin/logout'); ?>">Logout</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
          <form class="navbar-form col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Cari disini...">
            </div>
          </form>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>