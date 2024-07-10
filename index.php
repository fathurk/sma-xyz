<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    SMA XYZ</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Web Pendaftaran Online</span>

        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>Daftar Calon Siswa</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from pendaftar where id='$id' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama / Kepercayaan</th>
            <th>Alamat tinggal</th>
            <th>No Hp</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from pendaftar order by id asc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["tempat_lahir"];   ?></td>
                <td><?php echo $data["tanggal_lahir"];   ?></td>
                <td><?php echo $data["gender"];   ?></td>
                <td><?php echo $data["agama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["nomor_telepon"];   ?></td>

                <td>
                    <a href="update.php?id=<?php echo htmlspecialchars($data['id'] ?? ''); ?>" class="btn btn-warning" role="button">Perbarui</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] ?? '');?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Hapus</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambahkan Data</a>
</div>
</body>
</html>
