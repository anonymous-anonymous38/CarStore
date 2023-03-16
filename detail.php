<?php include 'koneksi.php'; ?>
<?php
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
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
</head>
<body>
    
<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="#" class="logo"> <span>max</span>wheels </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#vehicles">vehicles</a>
        <a href="#services">services</a>
        <a href="#featured">featured</a>
        <a href="#reviews">reviews</a>
        <a href="#contact">contact</a>
    </nav>
    <a href="keranjang.php">
    <img src="images/icons8-cart-44.png" width="30" alt="">
    </a>
    <div id="login-btn">
        <button class="btn">login</button>
        <i class="far fa-user"></i>
    </div>

    </header> 
    <br><br><br><br><br><br><br><br><br>

    <section class="kontent">
    <div class="container">
       <div class="row">
           <div class="col-md-6">
               <img src="images/<?php echo $detail["foto_produk"]; ?>" width="500" alt="" class="img-responsive">
           </div>
           <div class="col-md-6">
               <h2><?php echo $detail["nama_produk"]; ?></h2>
               <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
               <br>
    <form method="post">
                   <div class="form-group">
                       <div class="input-group">
                           <span style="border:1px black solid;"><input type="number" min="1" class="form-control " name="jumlah"></span><br><br>
                           <div class="input-group-btn">
                               <button class="btn btn-primary" name="beli">Beli</button>
                           </div>
                       </div>
                   </div>
               </form>

               <?php
                 if (isset($_POST["beli"]))
                 {
                   $jumlah = $_POST["jumlah"];
                   $_SESSION["keranjang"][$id_produk] = $jumlah;
                   echo "<script>alert('Produk telah masuk kekeranjang belanja');</script>";
                   echo "<script>location='keranjang.php';</script>";
                 }
               ?>

               <p><?php echo $detail["deskripsi_produk"]; ?></p>
           </div>
       </div>
    </div>
</section>


</body>
</html>