

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333; /* Warna teks utama */
        }

        header {
            background-color: #000000 ;
            padding: 10px;
            text-align: center;
            color: #fff; /* Warna teks header */
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            margin: 20px;
        }

        .card {
            background-color: #000000 ;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
            text-align: center;
        }

        .card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card p {
            margin-top: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang Admin!</h1>
    </header>

    <div class="dashboard">
        <!-- Card Pelanggan -->
        <div class="card">
            <h3>Data Pelanggan</h3>
            <?php
                $queryPelanggan = $koneksi->query("SELECT COUNT(*) AS jumlah_pelanggan FROM pelanggan");
                $dataPelanggan = $queryPelanggan->fetch_assoc();
            ?>
            <p>Jumlah Pelanggan: <?php echo $dataPelanggan['jumlah_pelanggan']; ?></p>
        </div>

        <!-- Card Pembelian -->
        <div class="card">
            <h3>Data Pembelian</h3>
            <?php
                $queryPembelian = $koneksi->query("SELECT COUNT(*) AS jumlah_pembelian FROM pembelian");
                $dataPembelian = $queryPembelian->fetch_assoc();
            ?>
            <p>Jumlah Pembelian: <?php echo $dataPembelian['jumlah_pembelian']; ?></p>
        </div>

        <!-- Card Produk -->
        <div class="card">
            <h3>Data Produk</h3>
            <?php
                $queryProduk = $koneksi->query("SELECT COUNT(*) AS jumlah_produk FROM produk");
                $dataProduk = $queryProduk->fetch_assoc();
            ?>
            <p>Jumlah Produk: <?php echo $dataProduk['jumlah_produk']; ?></p>
        </div>

        <!-- Card Ongkir -->
        <div class="card">
            <h3>Data Ongkir</h3>
            <?php
                $queryOngkir = $koneksi->query("SELECT COUNT(*) AS jumlah_ongkir FROM ongkir");
                $dataOngkir = $queryOngkir->fetch_assoc();
            ?>
            <p>Jumlah Kota: <?php echo $dataOngkir['jumlah_ongkir']; ?></p>
        </div>

        <!-- Card Admin -->
        <div class="card">
            <h3>Data Admin</h3>
            <?php
                $queryAdmin = $koneksi->query("SELECT COUNT(*) AS jumlah_admin FROM admin");
                $dataAdmin = $queryAdmin->fetch_assoc();
            ?>
            <p>Jumlah Admin: <?php echo $dataAdmin['jumlah_admin']; ?></p>
        </div>
    </div>
</body>
</html>
