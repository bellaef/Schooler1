<?php
include '../koneksi.php';

if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

if (isset($_POST["submit"])) {
    $nama_kota = $_POST["nama_kota"];
    $tarif = $_POST["tarif"];

    $koneksi->query("INSERT INTO ongkir (nama_kota, tarif) VALUES ('$nama_kota', '$tarif')");
    
    echo "<script>alert('Data ongkir berhasil ditambahkan');</script>";
	echo "<script>location='index.php?halaman=ongkir';</script>";
}
?>

<h2>Tambah Data Ongkir</h2>

<form method="post">
    <div class="form-group">
        <label for="nama_kota">Nama Kota</label>
        <input type="text" class="form-control" name="nama_kota" required>
    </div>
    <div class="form-group">
        <label for="tarif">Tarif</label>
        <input type="number" class="form-control" name="tarif" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
</form>
