<?php
session_start();
include 'koneksi.php';
include 'navbar.php';

if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location = 'login.php';</script>";
}

// Check if keranjang exists in the session
if (isset($_SESSION["keranjang"]) && is_array($_SESSION["keranjang"]) && count($_SESSION["keranjang"]) > 0) {
    // Initialize total ongkir
    $totalongkir = 0;

    // Check if the form has been submitted
    if (isset($_POST["checkout"])) {
        // Calculate the total value of products in the cart
        $totalbelanja = 0;
        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
            $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            if ($ambil && $ambil->num_rows > 0) {
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_produk"] * $jumlah;
                $totalbelanja += $subharga;
            }
        }

        // Get the selected shipping cost
        $id_ongkir = $_POST["id_ongkir"];
        $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir ='$id_ongkir'");
        $arrayongkir = $ambil->fetch_assoc();
        $tarif = $arrayongkir['tarif'];

        // Calculate the total transaction value
        $total_pembelian = $totalbelanja + $tarif;

        // Start the transaction
        $koneksi->autocommit(FALSE);

        // Insert purchase information
        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $tanggal_pembelian = date("Y-m-d");
        $alamat_pengirim = $_POST['alamat_pengirim'];
        $nama_kota = $arrayongkir['nama_kota'];

        $query_pembelian = "INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengirim) VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif', '$alamat_pengirim')";
        $koneksi->query($query_pembelian);
        $id_pembelian_barusan = $koneksi->insert_id;

        // Update product stock and insert purchase details
        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
            $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk' FOR UPDATE");
            $perproduk = $ambil->fetch_assoc();
            $stok_produk = $perproduk['stok_produk'];
            $stok_baru = $stok_produk - $jumlah;

            if ($stok_baru >= 0) {
                $koneksi->query("UPDATE produk SET stok_produk = $stok_baru WHERE id_produk = $id_produk");
                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];
                $berat = $perproduk['berat_produk'];
                $subberat = $perproduk['berat_produk'] * $jumlah;
                $subharga = $perproduk['harga_produk'] * $jumlah;

                $query_pembelian_produk = "INSERT INTO pembelian_produk (id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')";
                $koneksi->query($query_pembelian_produk);
            } else {
                // Rollback if insufficient stock
                $koneksi->rollback();
                unset($_SESSION["keranjang"]);
                echo "<script>alert('Maaf, stok produk $perproduk[nama_produk] tidak mencukupi untuk jumlah yang Anda pesan. Silahkan pesan kembali dengan jumlah yang lebih sedikit.');</script>";
                echo "<script>location = 'keranjang.php';</script>";
                exit;
            }
        }

        // Commit the transaction
        $koneksi->commit();

        // If the transaction is successful, proceed to the success page
        unset($_SESSION["keranjang"]);
        echo "<script>alert('Pembelian sukses');</script>";
        echo "<script>location = 'nota.php?id=$id_pembelian_barusan';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
</head>
<body>

    <section class="kontent">
        <div class="container">
            <h1 class="text-center">Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        if ($ambil && $ambil->num_rows > 0) {
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah["harga_produk"] * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?></td>
                            <td><?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                        </tr>
                        <?php
                        $nomor++;
                        }
                    endforeach;
                    ?>
                </tbody>
            </table>
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class "form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="id_ongkir">
                            <option value="">Pilih Ongkos kirim</option>
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM ongkir");
                            while ($perongkir = $ambil->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $perongkir["id_ongkir"] ?>"><?php echo $perongkir['nama_kota'] ?> Rp. <?php echo number_format($perongkir['tarif']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <h3>Alamat lengkap pengirim</h3>
                    <textarea class="form-control" name="alamat_pengirim" placeholder="Masukkan alamat lengkap (Kode pos)"></textarea>
                </div>
                <br>
                <button class="btn btn-lg btn-black-default-hover" name="checkout"><i class="bi bi-cart2"></i> Checkout</button>
            </form>
        </div>
    </section>
    <!-- Bootstrap JS and Popper.js (Optional) -->
</body>
</html>
