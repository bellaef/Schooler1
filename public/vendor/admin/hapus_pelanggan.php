<!-- hapus_pelanggan.php -->
<?php
include("../koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_pelanggan = $_GET["id_pelanggan"];

    $query = "DELETE FROM pelanggan WHERE id_pelanggan=$id_pelanggan";

    if ($koneksi->query($query) === TRUE) {
        header("location: pelanggan.php");
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>
