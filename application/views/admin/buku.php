<div class="page-header">
	<h2>Data Buku</h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="pull-right">
			<a href="<?php echo site_url("admin/tambahbuku"); ?>">Tambah Buku</a>
		</div>
	</div>
</div>
<div class="clear-fix"></div>
<br>
<?php
	if ($buku != NULL) {
?>
		<table class="table table-striped table-hover">
			<tr>
				<th>No</th>
				<th>ISBN</th>
				<th>Judul Buku</th>
				<th>Jenis Buku</th>
				<th>Tahun Terbit</th>
				<th>Aksi</th>
			</tr>
			<?php
				foreach ($buku as $value) {
			?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $value->isbn; ?></td>
						<td><?php echo $value->judul; ?></td>
						<td><?php echo $value->jenis_buku; ?></td>
						<td><?php echo $value->thn_terbit; ?></td>
						<td>
							<a href="<?php echo site_url("admin/editBuku/$value->no_buku"); ?>"><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
							<a href="<?php echo site_url("admin/lihatBuku/$value->no_buku"); ?>"><i class="glyphicon glyphicon-eye-open" title="Lihat Detail"></i></a>
							<a href="<?php echo site_url("admin/hapusBuku/$value->no_buku"); ?>"><i class="glyphicon glyphicon-trash" title="Hapus"></i></a>
						</td>
					</tr>
			<?php
					$no++;
				}
			?>
		</table>
		<div class="pull-right">
			<?php echo $pagination; ?>
		</div>
<?php
	}else {
?>
		<div class="alert alert-danger" role="alert">Belum ada data buku</div>
<?php
	}
?>