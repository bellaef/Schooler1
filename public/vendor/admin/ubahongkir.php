<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

if (isset($_GET["id"])) {
    $id_ongkir = $_GET["id"];

    if (isset($_POST["submit"])) {
        $nama_kota = $_POST["nama_kota"];
        $tarif = $_POST["tarif"];

        $koneksi->query("UPDATE ongkir SET nama_kota='$nama_kota', tarif='$tarif' WHERE id_ongkir='$id_ongkir'");
        
        echo "<script>alert('Data ongkir berhasil diubah');</script>";
        echo "<script>location='index.php?halaman=ongkir';</script>";
    }

    $ongkir = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
    $pecah = $ongkir->fetch_assoc();
}
?>

<h2>Ubah Data Ongkir</h2>

<form method="post">
    <div class="form-group">
        <label for="nama_kota">Nama Kota</label>
        <input type="text" class="form-control" name="nama_kota" value="<?php echo $pecah['nama_kota']; ?>" required>
    </div>
    <div class="form-group">
        <label for="tarif">Tarif</label>
        <input type="number" class="form-control" name="tarif" value="<?php echo $pecah['tarif']; ?>" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
</form>
