<?php
$conn = mysqli_connect('localhost', 'root', '', 'evoting');
$validateQuery = "SELECT contestantReg FROM pages";
$resValidate = mysqli_query($conn, $validateQuery);
while($row = mysqli_fetch_array($resValidate))
	{
		$tes = $row['contestantReg'];
	}
	if( $tes == 'activated'){
		include'contestantValidation.php';
	}
	else{
		include'main.php';
}
?>