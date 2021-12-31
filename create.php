<?php
require 'connection.php';

if (isset($_POST["submit"])) {
    $no_hp = htmlspecialchars($_POST["no_hp"]);
    $name = htmlspecialchars($_POST["nama"]);
    $asal = htmlspecialchars($_POST["asal"]);
    $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);

    $create_sql = "INSERT INTO pengunjung_wisata VALUES ('','$no_hp','$name','$asal','$pekerjaan')";
    $result = mysqli_query($conn, $create_sql);

    if ($result) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'create.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body class="d-flex flex-column align-items-center" style="margin-top: 3%">
<h3 >TAMBAH DATA</h3>
<div class="align-items-center bg-info text-center">
    <form class="text-center"action="" method="post">
        <label class="align-middle" for="no_hp">NO HP</label><br>
        <input type="number" name="no_hp" id="no_hp"><br><br>
        <label for="nama">NAMA </label><br>
        <input type="text" name="nama" id="nama"><br><br>
        <label for="asal">ASAL</label><br>
        <input class="mt-2" type="radio" name="asal" id="asal" value="JUAQ ASA">JUAQ ASA
        <input type="radio" name="asal" id="asal" value="JENGAN DANUM">JENGAN DANUM
        <input type="radio" name="asal" id="asal" value="DEMPAR">DEMPAR
        <input type="radio" name="asal" id="asal" value="ASA">ASA
        <input type="radio" name="asal" id="asal" value="PEPAS ASA">PEPAS ASA
        <input type="radio" name="asal" id="asal" value="LUAR DAERAH">LUAR DAERAH<br><br>
        <label for="pekerjaan">PEKERJAAN</label><br>
        <input type="text" name="pekerjaan" id="pekerjaan"><br><br>
        <button class="btn btn-primary" type="submit" name="submit">Submit</button><br>

    </form>
    <a href="index.php"><button class="btn btn-success mt-2">Kembali ke Home</button></a>
</div>
</body>

</html>