<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "crud";

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("connection Error : " . mysqli_connect_error());
}




function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

function cari($keyword1) {
	$query = "SELECT * FROM pengunjung_wisata
				WHERE
			   no_hp LIKE '%$keyword1%' OR
			   nama LIKE '%$keyword1%' OR
			   asal LIKE '%$keyword1%' OR
			   pekerjaan LIKE '%$keyword1%'
			";
	return query($query);
}

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}



?>