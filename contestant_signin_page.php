<?php
include 'includes/database.php';

$validateQuery = "SELECT contestantReg FROM pages";
$resValidate = mysqli_query($con, $validateQuery);
while($row = mysqli_fetch_array($resValidate))
	{
		$tes = $row['contestantReg'];
	}
	if( $tes == 'activated'){
		
		include 'contestantValidation.php';
	}
	else{

		include 'main.php';
}
?>