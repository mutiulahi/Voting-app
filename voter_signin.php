<?php
$conn = mysqli_connect('localhost', 'root', '', 'evoting');
$validateQuery = "SELECT voterReg FROM pages";
$resValidate = mysqli_query($conn, $validateQuery);
while($row = mysqli_fetch_array($resValidate))
	{
		$tes = $row['voterReg'];
	}
	if( $tes == 'activated'){
		include'voter_signinValidated.php';
	}
	else{
		include'main.php';
}
?>