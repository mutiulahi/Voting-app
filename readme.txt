<?php
$conR = mysqli_connect('localhost', 'root', '', 'evoting');
                                $queryR = "SELECT * FROM CountVote WHERE votedName = '$fname'";
                                $resultR = mysqli_query($conR, $queryR);
                                if(!$resultR){
                                    die("Query failed".mysqli_error($con));
                                }
                                while($rowR = mysqli_fetch_array($result)){
                                    echo $rowR['id'];
                                    $arr[] = $rowR['id'];
                                    echo 'lol';
                                }
?>



    font-size: 14px;
	text-transform: uppercase;
	border: 1px solid #f08c0a;
	border-radius: 5px;
	padding: 10px;
	color: #f08c0a;
	font-weight: 700;
	background: transparent;
	margin-left: 30%;
	margin-top: 30px;