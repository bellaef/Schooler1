<?php
session_start();
include 'koneksi.php';

$id_produk = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .img-responsive {
            max-width: 100%;
            height: auto;
        }

        .harga {
            color: #EE4D2D;
        }
    </style>
</head>
<body>

    <?php include 'menu.php'; ?>

    <section class="kontent">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail["nama_produk"] ?></h2>
                    <h5 style="color: grey;">Stok: <?php echo $detail["stok_produk"] ?></h5>
                    <h4 class="harga">Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli"><i class="fas fa-cart-plus"></i> Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["beli"])) {
                        $jumlah = $_POST["jumlah"];
                        
                        // Check if the requested quantity exceeds available stock
                        if ($jumlah > $detail["stok_produk"]) {
                            echo "<script>alert('Maaf, pembelian anda tidak dapat diproses karena melebihi stok produk yang tersedia.');</script>";
                        } else {
                            // Add the product to the cart
                            $_SESSION["keranjang"][$id_produk] = $jumlah;
                            echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
                            echo "<script>location = 'keranjang.php';</script>";
                        }
                    }
                    ?>

                    <p><?php echo $detail["deskripsi_produk"]; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
