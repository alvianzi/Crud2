<?php
require 'connection.php';

$id = $_GET["id"];

$select_sql = "SELECT * FROM pengunjung_wisata WHERE id = $id";
$result = mysqli_query($conn, $select_sql);

$pengunjung_wisata = [];

while ($row = mysqli_fetch_assoc($result)) {
    $pengunjung_wisata[] = $row;
}
$pengunjung_wisata = $pengunjung_wisata[0];

if (isset($_POST["submit"])) {
    $no_hp = htmlspecialchars($_POST["no_hp"]);
    $nama  = htmlspecialchars($_POST["nama"]);
    $asal  = htmlspecialchars($_POST["asal"]);
    $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);

    $update_sql = "UPDATE pengunjung_wisata SET no_hp= '$no_hp', nama= '$nama', asal='$asal', pekerjaan = '$pekerjaan' WHERE id = '$id'";
    $result = mysqli_query($conn, $update_sql);

    if ($result) {
        echo "<script>
            alert('Data berhasil diupdate!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diupdate!');
            document.location.href = 'update.php';
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
     <link href="<link rel="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Update</title>
</head>

<body>
    <h3>UPDATE DATA</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $pengunjung_wisata["id"]; ?>">
        <label for="no_hp">NO_HP</label><br>
        <input type="number" name="no_hp" id="no_hp" value="<?= $pengunjung_wisata["no_hp"]; ?>"><br><br>
        <label for="nama">NAMA</label><br>
        <input type="text" name="nama" id="nama" value="<?= $pengunjung_wisata["nama"]; ?>"><br><br>
        <label for="asal">Kelas</label><br>
        <input type="radio" name="asal" <?= $pengunjung_wisata['asal'] == "JUAQ ASA" ? "checked" : "" ?> value="JUAQ ASA">JUAQ ASA
        <input type="radio" name="asal" <?= $pengunjung_wisata['asal'] == "JENGAN DANUM" ? "checked" : "" ?> value="JENGAN DANUM">JENGAN DANUM
        <input type="radio" name="asal" <?= $pengunjung_wisata['asal'] == "DEMPAR" ? "checked" : "" ?> value="DEMPAR">DEMPAR
        <input type="radio" name="asal" <?= $pengunjung_wisata['asal'] == "ASA" ? "checked" : "" ?> value="ASA">ASA
        <input type="radio" name="asal" <?= $pengunjung_wisata['asal'] == "PEPAS ASA" ? "checked" : "" ?> value="PEPAS ASA">PEPAS ASA
        <input type="radio" name="asal" <?= $pengunjung_wisata['asal'] == "LUAR DAERAH" ? "checked" : "" ?> value="LUAR DAERAH">LUAR DAERAH <br><br>
        <label for="pekerjaan">pekerjaan</label><br>
        <input type="text" name="pekerjaan" id="pekerjaan" value="<?= $pengunjung_wisata["pekerjaan"]; ?>"><br><br>
        <button type="submit" name="submit">Update</button>
        <a href="index.php">Kembali ke Home</a>
    </form>
</body>

</html>