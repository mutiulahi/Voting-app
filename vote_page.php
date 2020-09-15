<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: index.php');
exit();
}
$conn = mysqli_connect('localhost', 'root', '', 'evoting');
$validateQuery = "SELECT voting FROM pages";
$resValidate = mysqli_query($conn, $validateQuery);
while($row = mysqli_fetch_array($resValidate))
	{
		$tes = $row['voting'];
	}
	if( $tes == 'activated'){
		include'votings.php';
	}
	else{
		include'main.php';
}

