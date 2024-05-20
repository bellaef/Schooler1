<?php
include '../koneksi.php';

if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

if (isset($_GET["id"])) {
    $id_ongkir = $_GET["id"];
    
    // Hapus data ongkir berdasarkan ID
    $koneksi->query("DELETE FROM ongkir WHERE id_ongkir='$id_ongkir'");
    
    echo "<script>alert('Data ongkir berhasil dihapus');</script>";
	echo "<script>location='index.php?halaman=ongkir';</script>";
} else {
	echo "<script>location='index.php?halaman=ongkir';</script>";
}
?>
