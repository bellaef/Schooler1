<?php
session_start();
include 'koneksi.php';

$id_produk = $_GET['id'];
$jumlah = $_POST['jumlah'];

$_SESSION["keranjang"][$id_produk] = $jumlah;

echo "<script>alert('Jumlah produk telah diubah');</script>";
echo "<script>location='keranjang.php';</script>";
?>
