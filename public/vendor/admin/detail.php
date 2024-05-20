<h2>Detail Pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT pembelian.*, pelanggan.nama_pelanggan, pelanggan.alamat_pelanggan, ongkir.tarif AS tarif, pembelian.alamt_pengiriman AS alamat_pengiriman, pelanggan.telepon_pelanggan, pelanggan.email_pelanggan
    FROM pembelian 
    JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan 
    LEFT JOIN ongkir ON pembelian.id_ongkir = ongkir.id_ongkir 
    WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong>Nama Pelanggan: <?php echo $detail['nama_pelanggan']; ?></strong> <br>
<strong>Alamat Tujuan: <?php echo $detail['alamat_pelanggan']; ?></strong> <br>
<strong>Alamat Pengiriman: <?php echo $detail['alamat_pengiriman']; ?></strong> <br>
<p>
    No Telp:<?php echo $detail['telepon_pelanggan']; ?> <br>
    Email: <?php echo $detail['email_pelanggan']; ?>
</p>

<p>
    Tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
    Total: Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
    Ongkir: Rp. <?php echo number_format($detail['tarif']); ?>
</p>

<?php if ($detail['bukti_transfer'] !== null) : ?>
    <h4>Bukti Transfer</h4>
    <img src="../uploads_pembayaran/<?php echo $detail['bukti_transfer']; ?>" alt="Bukti Transfer" style="max-width: 300px;">
<?php else : ?>
    <p>Bukti transfer belum diupload.</p>
<?php endif; ?>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
            <th>ongkir</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil_produk = $koneksi->query("SELECT * FROM pembelian_produk 
                                       JOIN produk ON pembelian_produk.id_produk = produk.id_produk
                                       WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while ($pecah = $ambil_produk->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                <td><?php echo $pecah['jumlah']; ?></td>
                <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                <td>Rp. <?php echo number_format($detail['tarif']); ?></td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
