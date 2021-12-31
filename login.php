<?php 
session_start();

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}

require 'connection.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


	if( mysqli_num_rows($result) === 1 ) {

		
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<center> <h1>Halaman Login</h1> </center>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">username dan password anda salah</p>
<?php endif; ?>


<form action="" method="post">

	<ul>
		<li>
			<label for="username">Username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
        <center><li><input type="button" name="submit" value="SHOW PASSWORD" id="show" onclick="ShowPassword()">
			<input type="button" style="display:none" id="hide" value="Hide Password" onclick="HidePassword()">
       </li></center>
	</ul>
    
	
</form>

<script>
	function ShowPassword()
{
	if(document.getElementById("password").value!="")
	{
		document.getElementById("password").type="text";
		document.getElementById("show").style.display="none";
		document.getElementById("hide").style.display="block";
	}
}
 
function HidePassword()
{
	if(document.getElementById("password").type == "text")
	{
		document.getElementById("password").type="password"
		document.getElementById("show").style.display="block";
		document.getElementById("hide").style.display="none";
	}
}
</script>





<center><a href="registrasi.php"><button button class="btn first">Daftar</button></a></center>

</body>
</html>