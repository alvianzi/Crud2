<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}


require 'connection.php';

$read_sql = "SELECT * FROM pengunjung_wisata ORDER BY id DESC";
$result = mysqli_query($conn, $read_sql);

$pengunjung_wisata = [];

if (isset($_POST['keyword1'])) {
    $result = mysqli_query($conn, "SELECT * FROM pengunjung_wisata WHERE nama LIKE '% ".
    $_POST['keyword1']."%'");
}

if( isset($_POST["cari"]) ) {
	$pengunjung_wisata = cari($_POST["keyword1"]);
}

while ($row = mysqli_fetch_assoc($result)) {
    $pengunjung_wisata[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEMAQ BENIUNG</title>
    <!-- <link href="" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<a href="logout.php"><button class="btn btn-danger text-white">Logout</button></a>
    <h1 align="center" >DATA PENGUNJUNG</h1>
    <center><a href="create.php"><button button class="btn first btn-primary text-white">Tambah Data</button></a></center>
    <center><a href="registrasi.php"><button button class="btn first btn-primary text-white mt-2">Daftar</button></a></center>

    <center>
        <form class="mt-2"method="post" action="">
            <input class="d-flex justify-content-center" type="text" name = "keyword1" size="50" placeholder="cari keyword pencarian..."autocomplete="off">      
            <button type="submit" name="cari"button class="btn first btn-info text-white mt-2">Cari</button>
        </form>
    </center>
<div class="container mt-2"> 

    <!-- <table> -->
    <table class="table table-striped table hover mt-7" border=1 cellspacing=2 cellpadding=10>
        <thead class="table-dark">
        <tr>
            <th>NO</th>
            <th>NO_HP</th>
            <th>NAME</th>
            <th>ASAL</th>
            <th>PEKERJAAN</th>
            <th>ACTION</th>
        </thead>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($pengunjung_wisata as $pjs) : ?>
            <tbody>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $pjs["no_hp"]; ?></td>
                <td><?= $pjs["nama"]; ?></td>
                <td><?= $pjs["asal"]; ?></td>
                <td><?= $pjs["pekerjaan"]; ?></td>
                <td>
                    <a href="update.php?id=<?= $pjs["id"]; ?>"><button class="btn btn-success text-white">UPDATE</button></a>
                    <a href="delete.php?id=<?= $pjs["id"]; ?>"><button class="btn btn-danger text-white">HAPUS</button></a>
                </td>
            </tr>
            </tbody>
            <?php $i++; ?>
        <?php endforeach; ?>

    </table>
        </div>
</body>

</html>
