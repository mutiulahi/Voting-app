<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'evoting';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['matric'], $_POST['password']) ) {
	die ('Please fill both the username and password field!');
}

if ($stmt = $con->prepare('SELECT id, password FROM votelogin WHERE matric = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['matric']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) 
	{
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		
		if ($_POST['password'] === $password) {
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['names'] = $_POST['matric'];
			$_SESSION['id'] = $id;
			echo"<script type=\"text/javascript\"> 
				alert(\"Login successfully!\");
				window.location = \"../vote_page.php\"</script>";
		} else {
			echo"<script type=\"text/javascript\"> 
				alert(\"Incorrect Password!\");
				window.location = \"../index.php\"</script>";
		}
	}
 else {
	echo"<script type=\"text/javascript\"> 
            alert(\"Incorrect Matric!\");
            window.location = \"../index.php\"</script>";
}

	$stmt->close();
}
?>