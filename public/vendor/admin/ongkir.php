<?php
include '../koneksi.php';
?>
<h2 style= "color:#044ab3"><b> Data Ongkir </b></h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama kota</th>
			<th>tarif</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM ongkir"); ?>
		<?php while($pecah = $ambil -> fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_kota']; ?></td>
			<td><?php echo $pecah['tarif']; ?></td>
			<td>
				<a href="index.php?halaman=hapusongkir&id=<?php echo $pecah['id_ongkir']; ?>" class="btn" style="background-color: #333740; color: #f7f8fa;"><i class="bi bi-trash"></i> </a>
				<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah['id_ongkir'];?>" class="btn" style="background-color: #515459; color: #f7f8fa;"><i class="bi bi-pencil-square"></i></a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahongkir" class="btn" style="background-color: #151617; color: #f7f8fa;"><i class="bi bi-building-add"></i> Tambah Data</a>