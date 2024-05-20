<?php
session_start();
include 'navbar.php';
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// Pastikan ID pelanggan didefinisikan di URL
if (!isset($_GET['id_pelanggan'])) {
    // Jika tidak ada ID pelanggan di URL, gunakan ID dari sesi pelanggan yang sudah login
    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
} else {
    $id_pelanggan = $_GET['id_pelanggan'];
}

// Memeriksa apakah pelanggan yang masuk adalah pemilik data yang hendak diedit
if ($_SESSION["pelanggan"]["id_pelanggan"] != $id_pelanggan) {
    echo "<script>alert('Akses tidak diizinkan');</script>";
    echo "<script>location='daftar_pelanggan.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input data
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $email_pelanggan = $_POST['email_pelanggan'];
    $telepon_pelanggan = $_POST['telepon_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    // Update the data in the database
    $query = "UPDATE pelanggan 
              SET nama_pelanggan='$nama_pelanggan', 
                  email_pelanggan='$email_pelanggan', 
                  telepon_pelanggan='$telepon_pelanggan', 
                  alamat_pelanggan='$alamat_pelanggan' 
              WHERE id_pelanggan=$id_pelanggan";
    
    // Execute the query and handle success or failure
    if ($koneksi->query($query) === TRUE) {
        echo "<script>alert('Informasi berhasil diperbarui');</script>";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}

// Fetch current user's data from database
$result = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan=$id_pelanggan");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Informasi Pelanggan</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Informasi Profil</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>">
            
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row['nama_pelanggan']; ?>">
            </div>
            
            <div class="mb-3">
                <label for="email_pelanggan" class="form-label">Email Pelanggan</label>
                <input type="email" class="form-control" id="email_pelanggan" name="email_pelanggan" value="<?php echo $row['email_pelanggan']; ?>">
            </div>
            
            <div class="mb-3">
                <label for="telepon_pelanggan" class="form-label">Telepon Pelanggan</label>
                <input type="text" class="form-control" id="telepon_pelanggan" name="telepon_pelanggan" value="<?php echo $row['telepon_pelanggan']; ?>">
            </div>
            
            <div class="mb-3">
                <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
                <textarea class="form-control" id="alamat_pelanggan" name="alamat_pelanggan"><?php echo $row['alamat_pelanggan']; ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-black-default-hover">Perbarui</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
</body>
</html>
