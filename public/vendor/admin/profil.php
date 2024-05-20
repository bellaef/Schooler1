<?php
error_reporting(E_ALL & ~E_NOTICE);

include '../koneksi.php';

if (!isset($_SESSION["admin"])) {
    echo "<script>alert('Anda harus login sebagai admin terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_admin = $_SESSION['admin']['id_admin'];
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];

    // Check if a new password is provided
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];

        $query = "UPDATE admin 
                  SET username='$username', 
                      password='$password', 
                      nama_lengkap='$nama_lengkap'
                  WHERE id_admin=$id_admin";
    } else {
        $query = "UPDATE admin 
                  SET username='$username', 
                      nama_lengkap='$nama_lengkap'
                  WHERE id_admin=$id_admin";
    }

    if ($koneksi->query($query) === TRUE) {
        echo "<script>alert('Informasi admin berhasil diperbarui');</script>";
        echo "<script>location='index.php?halaman=profil';</script>";

    } else {
        echo "Error updating record: " . $koneksi->error;
    }
    
}

$id_admin = $_SESSION['admin']['id_admin'];
$result = $koneksi->query("SELECT * FROM admin WHERE id_admin=$id_admin");
$row = $result->fetch_assoc();
?>

<div class="container mt-5">
    <h2 style= "color:#022457">Edit Profil Admin</h2>
    <form method="post" action="profil.php">
        <input type="hidden" name="id_admin" value="<?php echo $row['id_admin']; ?>">
        
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru">
        </div>
        
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
