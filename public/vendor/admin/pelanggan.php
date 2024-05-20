<h2 style= "color:#022457"><b> Data Pelanggan </b></h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama</th>
            <th>email</th>
            <th>telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_pelanggan']; ?></td>
                <td><?php echo $pecah['email_pelanggan']; ?></td>
                <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                <td>
                    <a href="proses_pelanggan.php?action=hapus&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn" style="background-color: #333740; color: #f7f8fa;"> <i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
