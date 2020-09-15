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
	die ('Please fill both the matric and password field!');
}

if ($stmt = $con->prepare('SELECT id, password, validation FROM contestants WHERE matric = ?')) {
	
	$stmt->bind_param('s', $_POST['matric']);
	$stmt->execute();
	
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $validation);
	$stmt->fetch();
	if($validation !== 'activate'){
		echo"<script type=\"text/javascript\"> 
            alert(\"You are not eligible to login!\");
            window.location = \"../contestant_login_page.php\"</script>";
	}
	else{
	if ($_POST['password'] === $password) {
		
		session_regenerate_id();
		$_SESSION['paid'] = TRUE;
		$_SESSION['name'] = $_POST['matric'];
		$_SESSION['id'] = $id;
		 echo"<script type=\"text/javascript\"> 
            alert(\"Login successful!\");
            window.location = \"../contestante_dashboard.php\"</script>";
	} else {
		echo"<script type=\"text/javascript\"> 
            alert(\"Incorrect Password!\");
            window.location = \"../contestant_login_page.php\"</script>";
	}
}
} else {
	echo"<script type=\"text/javascript\"> 
            alert(\"Incorrect matric!\");
            window.location = \"../contestant_login_page.php\"</script>";
}

	$stmt->close();
}
?>