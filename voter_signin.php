<?php
include 'includes/database.php';
$validateQuery = "SELECT voterReg FROM pages";
$resValidate = mysqli_query($con, $validateQuery);
while($row = mysqli_fetch_array($resValidate))
	{
		$tes = $row['voterReg'];
	}
	if( $tes == 'activated'){
		include 'voter_signinValidated.php';
	}
	else{
		include 'main.php';
}
?>