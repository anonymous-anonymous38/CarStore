<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='dashboard.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="admin/asset/css/sb-admin-2.css">
</head>
<body>
        
<header class="header">

<div id="menu-btn" class="fas fa-bars"></div>

<a href="dashboard1.php" class="logo"> <span>max</span>wheels </a>

<nav class="navbar">
    <a href="dashboard1.php">home</a>
    <a href="#vehicles">vehicles</a>
    <a href="#services">services</a>
    <a href="#featured">featured</a>
    <a href="#reviews">reviews</a>
    <a href="#contact">contact</a>
</nav>
<div id="login-btn">
        <button class="btn">login</button>
        <i class="far fa-user"></i>
    </div>
</header>
<br>


<section class="konten">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_produk"]*$jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama_produk']; ?></td>
                    <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                </tr>
            </tfoot>
        </table>

        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat Pembeli</label>
                <textarea name="alamat_pembeli" placeholder="Masukan alamat lengkap (Termasuk kode pos)" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>

        <?php
            if (isset($_POST["checkout"]))
            {
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $tanggal_pembelian = date("Y-m-d");
                $total_pembelian = $totalbelanja + 0;
                $alamat_pembeli = $_POST['alamat_pembeli'];
                $koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian,alamat_pembeli) VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pembeli')");

                $id_pembelian_barusan = $koneksi->insert_id;
                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
                {
                    $koneksi->query("INSERT INTO pembelian_produk(id_pembelian,id_produk,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");
                }



                echo "<script>alert('Pembelian sukses');</script>";
                echo "<script>location='nota.php'</script>";
            }
        ?>
    </div>
</section>
<script src="asset/js/script.js"></script>
</body>
</html>