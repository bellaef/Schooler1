<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../koneksi.php';

if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- Bagian HTML lainnya -->

    <h2>Tambah Produk</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>nama</label>
            <input type="text" class="form-control" name="nama">
        </div>

        <div class="form-group">
            <label>stok</label>
            <input type="number" class="form-control" name="stok">
        </div>

        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" class="form-control" name="harga">
        </div>

        <div class="form-group">
            <label>Berat (Gr)</label>
            <input type="number" class="form-control" name="berat">
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <button class="btn btn-primary" name="save">Simpan</button>
    </form>

    <?php
    if (isset($_POST['save'])) {
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../foto_produk/" . $nama);

        // Prepare the SQL statement
        $stmt = $koneksi->prepare("INSERT INTO produk (nama_produk, stok_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("siiiss", $_POST['nama'], $_POST['stok'], $_POST['harga'], $_POST['berat'], $nama, $_POST['deskripsi']);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<div class='alert alert-info'>Data tersimpan</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
    ?>
</html>
