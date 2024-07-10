<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Web Pendaftaran Online</span>

        </div>
    </nav>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $tempat_lahir=input($_POST["tempat_lahir"]);
        $tanggal_lahir=input($_POST["tanggal_lahir"]);
        $gender=input($_POST["gender"]);
        $agama=input($_POST["agama"]);
        $alamat=input($_POST["alamat"]);
        $nomor_telepon=input($_POST["nomor_telepon"]);

        if (strlen($nama) <= 3)  {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            return ;
        }

        //Query input menginput data kedalam tabel anggota
        $sql="insert into pendaftar (nama,tempat_lahir,tanggal_lahir,gender,agama, alamat, nomor_telepon) values
		('$nama','$tempat_lahir','$tanggal_lahir','$gender','$agama','$alamat','$nomor_telepon')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama anda" required />

        </div>
        <div class="form-group">
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir anda" required/>
        </div>
       <div class="form-group">
            <label>Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir anda" required/>
        </div>
                </p>
        <div class="form-group">
            <!-- <label>Jenis kelamin:</label>
            <input type="text" name="gender" class="form-control" placeholder="Pilih jenis kelamin anda" required/> -->
            <input type="radio" name="gender" class="" 
                <?php if (isset($gender) && $gender=="Laki-laki") echo "checked";?>
                value="Laki-laki"> Laki-laki
            <input type="radio" name="gender" class="" 
                <?php if (isset($gender) && $gender=="Perempuan") echo "checked";?>
                value="Perempuan"> Perempuan
        </div>
        <div class="form-group">
            <label>Agama:</label>
            <input type="text" name="agama" class="form-control" placeholder="Masukkan agama anda" required/>
        </div>
        <div class="form-group">
            <label>Alamat tinggal</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukkan Alamat anda" required></textarea>
        </div>       
        <div class="form-group">
            <label>Nomor telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" placeholder="Masukkan nomor telepon anda" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
</body>
</html>