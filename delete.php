<?php
require 'connection.php';

$id = $_GET["id"];

$delete_sql = "DELETE FROM pengunjung_wisata WHERE id = $id";
$result = mysqli_query($conn, $delete_sql);

if ($result) {
    echo "<script>
        alert('Data telah dihapus!');
        document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'index.php';
    </script>";
}
