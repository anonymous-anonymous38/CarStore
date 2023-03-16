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

<a href="#" class="logo"> <span>max</span>wheels </a>

<nav class="navbar">
    <a href="dashboard.php">home</a>
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

        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        Silahkan melakukan pembayaran Rp. <?php echo number_format($totalbelanja) ?> ke <br>
                        <strong>BANK BCA 021-7867-27917 AN. MUHAMMAD FARHAN</strong>
<br>
                        Untuk bukti pembayaran silahkan kirim 
            <a href="https://wa.me/6285735501035?text=Isi Pesan">Chat Via WhatsApp</a>
                    </p>
                </div>
            </div>
           </div>
            </div>


    </div>
</section>
<script src="asset/js/script.js"></script>
</body>
</html>