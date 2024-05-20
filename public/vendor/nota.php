<?php
ob_start();
session_start();
include 'navbar.php';
include 'koneksi.php';


$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'");
$detail = $ambil->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pembelian = $_POST['id_pembelian'];

    $nama_file = $_FILES['bukti_transfer']['name'];
    $ukuran_file = $_FILES['bukti_transfer']['size'];
    $error = $_FILES['bukti_transfer']['error'];
    $tmp_file = $_FILES['bukti_transfer']['tmp_name'];

    $lokasi_upload = 'uploads_pembayaran/';

    if ($error === 0) {
        if (move_uploaded_file($tmp_file, $lokasi_upload . $nama_file)) {
            $koneksi->query("UPDATE pembelian SET bukti_transfer = '$nama_file' WHERE id_pembelian = '$id_pembelian'");
            // Redirect setelah berhasil upload
            header("Location: nota.php?id=$id_pembelian");
            exit();
        } else {
            echo "Upload gagal";
        }
    }
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Pembelian</title>
</head>

<body>
    <!-- Tampilkan informasi pembelian -->
    <div class="container">
        <!-- <h1>Detail Pembelian</h1>
        <div class="mb-4">
            <h4>Informasi Pembelian</h4>
            <p>ID Pembelian: <?php echo $detail['id_pembelian']; ?></p>
            <p>Tanggal Pembelian: <?php echo $detail['tanggal_pembelian']; ?></p>
        </div> -->
<!-- Informasi Detail Pembelian -->
<div class="mb-4" id="print-content">
            <h2 class="mt-4 mb-4" id="print-content">Detail Pembelian</h2>
            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>

            <div class="mb-4" id="print-content">
                <strong>Nama Pelanggan: <?php echo $detail['nama_pelanggan']; ?></strong> <br>
                <strong>Alamat Tujuan: <?php echo $detail['alamat_pelanggan']; ?></strong> <br>
                <strong>Alamat Pengiriman: <?php echo $detail['alamat_pengirim']; ?></strong> <br>
                <p>
                    No Telp:<?php echo $detail['telepon_pelanggan']; ?> <br>
                    Email: <?php echo $detail['email_pelanggan']; ?>
                </p>

                <p>
                    Tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
                    Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
                </p>
            </div>

            <table class="table table-bordered" id="print-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pembelian</th>
                        <th>Tanggal Pembelian</th>
                        <th>Nama Produk</th>
                        <th>Kategori Produk</th>
                        <th>Harga</th>
                        <th>Ongkir</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT pembelian.*, ongkir.tarif AS harga_ongkir FROM pembelian LEFT JOIN ongkir ON pembelian.id_ongkir = ongkir.id_ongkir WHERE pembelian.id_pembelian = '$id_pembelian'");?>
                    <?php $detail = $ambil->fetch_assoc();?>

                    <!-- <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?> -->
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['id_pembelian']; ?></td>
                            <td><?php echo $detail['tanggal_pembelian']; ?></td>
                            <td><?php echo $pecah['nama_produk']; ?></td>
                            <td><?php echo $pecah['kategori']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                            <td>Rp. <?php echo number_format($detail['harga_ongkir']); ?></td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td>
                                Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>

        <!-- Tampilkan bukti transfer -->
        <div class="mb-4" id="print-content">
            <h4>Bukti Transfer</h4>
            <?php if ($detail['bukti_transfer'] !== null) : ?>
                <img src="uploads_pembayaran/<?php echo $detail['bukti_transfer']; ?>" alt="Bukti Transfer" style="max-width: 300px;">
            <?php else : ?>
                <p>Bukti transfer belum diupload.</p>
            <?php endif; ?>
        </div>

        <!-- Form Upload Bukti Transfer -->
        <div class="mb-4">
            <h4>Upload Bukti Transfer</h4>
            <form action="nota.php?id=<?php echo $id_pembelian; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="bukti_transfer" class="form-label">Upload Bukti Transfer:</label>
                    <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer">
                </div>
                <input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>">
                <button type="submit" class="btn btn-lg btn-black-default-hover">Upload</button>
            </form>
        </div>

        
            <div class="row" id="print-alert">
                <div class="col-md-7">
                    <div class="alert alert-success" style="background-color: #333740; color: #fff;">
                        <p>
                            Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke: <br>
                            <strong>BANK MANDIRI 696969 AN. MUHAMMAD RENDI ADRIANSYAH</strong>
                            <br>
                        <p>atau</p>
                        <strong>DANA/OVO 08912690998 AN. MUHAMMAD RENDI ADRIANSYAH</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-lg btn-black-default-hover" onclick="printNota()">Cetak Nota</button>
                <a href="riwayat_pembelian.php" class="btn btn-lg btn-black-default-hover">Lihat Riwayat Pembelian</a>
            </div>
        </div>
    </div>
    <script>
        function printNota() {
            var printContents = document.getElementById("print-content").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>