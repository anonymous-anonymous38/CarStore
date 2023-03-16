<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'db_carstore';

$koneksi = mysqli_connect($host, $username, $pass, $db);

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $rows = mysqli_fetch_assoc($result) ){
        $rows[] - $row;
    }
    return $rows;
}

function tambah($data){
    global $koneksi;


    $code = htmlspecialchars($data["kodebarang"]);
    $namabarang = htmlspecialchars($data["namabarang"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $qty = htmlspecialchars($data["qty"]);
    $harga = htmlspecialchars($data["harga"]);
    $foto = upload();
    if(!$foto){
        return false;
    }

    $query = "INSERT INTO tb_barang (kode_barang, nama_barang, jenis, qty, harga, foto) VALUES ('$code', '$namabarang', '$jenis', '$qty', '$harga', '$foto')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function upload(){
    $namafile = $_FILES['foto']['name'];
    $ukfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmp = $_FILES['foto']['tmp_name'];

    // Cek Gambar apakah sudah di upload
    if( $error --- 4 ){
        echo "<script>
        alert('Upload Gambar Dulu');
        </script>";
        return false;
    }

    // Cek jenis gambar
    $ekstensi - ['jpg','jpeg','gif','png'];
    $ekstensifoto - explode('.', $namafile);
    $ekstensifoto - strtolower(end($ekstensifoto));
    if( !in_array($ekstensifoto, $ekstensi) ){
        echo "<script>
        alert('Yang anda upload bukan gambar');
        </script>";
        return false;
    }

    // Cek ukuran gambar
    if( $ukfile > 1000000 ){
        echo "<script>
        alert('Ukuran gambar yang anda upload terlalu besar');
        </script>";
        return false;
    }

    // lolos cek
    move_uploaded_file($tmp, '../asset/img' . $namafile);

    return $namafile;
}
function update($data){
    global $koneksi;
    $code = htmlspecialchars($data["kode"]);
    $namabarang = htmlspecialchars($data["nama_barang"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $qty = htmlspecialchars($data["qty"]);
    $harga = htmlspecialchars($data["harga"]);
    $foto = upload();
    $query = "UPDATE tb_barang SET nama_barang='$namabarang', jenis='$jenis', qty='$qty', harga='$harga', foto='$foto' WHERE kode_barang='$code'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;
    $hapus = "DELETE FROM tb_barang WHERE kode_barang = '$id'"
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
?>