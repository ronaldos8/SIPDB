<style>
	.nav-tabs > li > a {
		color: #000000;
	}
	table tr td {
		text-align: left;
		padding: 5px;
	}
</style>
<div class="page-header">
	<h2><?php echo $anggota->nama; ?></h2>
</div>
<?php
	if ($this->session->has_userdata('status')) {
		echo $this->session->flashdata('status');
	}
?>
<section id="">
	<h3 class="bold"><?php if(isset($inspirasi->judul)) echo $inspirasi->judul; ?></h3>
	<h1 class="heading bold"><?php if(isset($inspirasi->penulis)) echo "Oleh " .$inspirasi->penulis; ?></h1>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="black <?php if(isset($v_datadiri)) echo $v_datadiri; ?>"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">DATA DIRI</a></li>
		<li class="black <?php if(isset($v_peminjaman)) echo $v_peminjaman; ?>"><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">PEMINJAMAN</a></li>
		<li class="black <?php if(isset($v_keranjang)) echo $v_keranjang; ?>"><a href="#keranjang" aria-controls="keranjang" role="tab" data-toggle="tab">KERANJANG</a></li>
		<li class="black"><a href="<?php echo site_url('user/keluar'); ?>">KELUAR</a></li>
	</ul>
	<!-- tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in  <?php if(isset($v_datadiri)) echo $v_datadiri; ?>" id="design">
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?php echo $anggota->nama; ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?php echo $anggota->jk; ?></td>
				</tr>
				<tr>
					<td>No Handphone</td>
					<td>:</td>
					<td><?php echo $anggota->telpon; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $anggota->email; ?></td>
				</tr>
				<tr>
					<td>Deskripsi Diri</td>
					<td>:</td>
					<td><?php echo $anggota->deskripsi; ?></td>
				</tr>
			</table>
		</div>
		<div role="tabpanel" class="tab-pane fade in  <?php if(isset($v_peminjaman)) echo $v_peminjaman; ?>" id="mobile">
			<?php
				if ($pinjaman != NULL) {
			?>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Peminjaman</th>
								<th>Nama Buku</th>
								<th>Penulis</th>
								<th>Tahun</th>
								<th></th>
							</tr>
							<?php
								$no = 1;
								foreach ($pinjaman as $value) {
							?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $value->kd_pinjaman; ?></td>
										<td><a href="<?php echo site_url("buku/detail/$value->kd_karangan"); ?>"><?php echo $value->judul; ?></a></td>
										<td><?php echo $value->penulis; ?></td>
										<td><?php echo $value->thn_terbit; ?></td>
										<td><a href="<?php echo site_url("buku/kembalikan/$value->kd_karangan"); ?>">Kembalikan</i></a></td>
									</tr>
							<?php
									$no++;
								}
							?>
						</thead>
					</table>
			<?php
				}else {
					echo "<div class='alert alert-warning' role='alert'>Belum ada data peminjaman buku</div>";
				}
			?>
		</div>
		<div role="tabpanel" class="tab-pane fade in  <?php if(isset($v_keranjang)) echo $v_keranjang; ?>" id="keranjang">
			<?php
				if ($cart != NULL) {
			?>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Sampul</th>
								<th>Judul</th>
								<th>Penulis</th>
								<th>Jumlah</th>
								<th>Jaminan</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach ($cart as $items)
								{
							?>
									<tr>
										<td><?php echo $no; ?></td>
										<td class="col-md-2"><img src="<?php echo base_url("cover/") .$items['gambar']; ?>" class="img-responsive" alt=""></td>
										<td><a href="<?php echo site_url("buku/detail/") .$items['id']; ?>"><?php echo $items['name']; ?></a></td>
										<td><?php echo $items['penulis']; ?></td>
										<td>1</td>
										<form action="<?php echo site_url("buku/pinjam/") ?>" method="POST">
											<td>
												<input type="text" name="jaminan" value="" placeholder="Jaminan" class="form-control" required />
												<input type="hidden" name="kd_karangan" value="<?php echo $items['id']; ?>">
												<input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>">
											</td>
											<td>
												<p>
													<button type="submit" class="btn btn-success">Pinjam</button>
												</p>
										</form>
												<p>
													<a href="<?php echo site_url("buku/hapuskeranjang/") .$items['rowid']; ?>"><button class="btn btn-warning">Hapus</button></a>
												</p>
											</td>
									</tr>
							<?php
									$no++;
								}
							?>
						</tbody>
					</table>
			<?php
				}else {
					echo "<div class='alert alert-warning' role='alert'>Keranjang kosong</div>";
				}
			?>
		</div>
	</div>
</section>