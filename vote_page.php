<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: index.php');
exit();
}

include 'includes/database.php';

$validateQuery = "SELECT voting FROM pages";
$resValidate = mysqli_query($con, $validateQuery);
while($row = mysqli_fetch_array($resValidate))
	{
		$tes = $row['voting'];
	}
	if( $tes == 'activated'){
		include 'votings.php';
	}
	else{
		include 'main.php';
}

