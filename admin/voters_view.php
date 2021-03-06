<?php
session_start();
if(!isset($_SESSION['name'])){
	header('Location:index.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Panel | Voters</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- chart -->
    <script src="js/Chart.js"></script>
    <!-- //chart -->
    <!--Calender-->
    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
    <script src="js/underscore-min.js" type="text/javascript"></script>
    <script src="js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="js/clndr.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <!--End Calender-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <!--left-fixed -navigation-->
        <?php
		include 'includes/menu.php';
		?>
        <!--left-fixed -navigation-->
        <!-- header-starts -->

        <!-- //header-ends -->

        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="row-one">
                    <div class="tables">
                        <h3 class="title1">Validate Voter</h3>

                        <div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table">
                            <h4>Voters Data:</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Matric</th>
                                        <th>Email</th>
                                        <th>Faculty</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $id = array();  
                                $matric = array(); 
                                $faculty = array();
                                $email = array();
                                $department = array();

                                $conn = mysqli_connect('localhost', 'root', '', 'evoting');
                                $query = "SELECT * FROM votelogin";
                                $result= mysqli_query($conn,$query);
                                while($row = mysqli_fetch_array($result)){
                                    $id[] = $row['id'];
                                    $matric[] =$row['matric'];
                                    $faculty[] =$row['faculty'];
                                    $department[] =$row['department'];
                                    $email[] = $row['email'];
                                }
                                $size = sizeof($id);
                                for($i=0; $i<$size; $i++){
								echo'<tr>'; 
								$p = $i+1;
								echo"<th scope='row'>".$p."</th>"; 
								echo"<td>".$matric[$i]."</td>";
								echo"<td>".$email[$i]."</td>";
								echo"<td>".$faculty[$i]."</td>"; 
								echo"<td>".$department[$i]."</td>"; 
								echo'</tr>';
								
                            } 
                            if(isset($_POST['activate'])){
                                $update = 'activate';
                                $selected = $_POST['activate'];
                                
								$upquery = "UPDATE contestants SET  validation = '$update' WHERE id='$selected'";
								if(mysqli_query($conn, $upquery))
								{
									
									echo"Activation Successful";
                                }
                                else{
                                    echo 'error';
                                }
							}

							if(isset($_POST['deactivate'])){
                                $update = 'deactivate';
                                $selected = $_POST['deactivate'];
                                
								$upquery = "UPDATE contestants SET  validation = '$update' WHERE id='$selected'";
								if(mysqli_query($conn, $upquery))
								{
									
									echo"Deactivation Successful";
                                }
                                else{
                                    echo 'error';
                                }
							}
                            ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--calender-->
                    <div class="row calender widget-shadow">
                        <h4 class="title">Calender</h4>
                        <div class="cal1">

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <!--footer-->
            <?php
                include 'includes/footer.php';
            ?>
            <!--//footer-->
        </div>
        <!-- Classie -->
        <script src="js/classie.js"></script>
        <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };


        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
        </script>
        <!--scrolling js-->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!--//scrolling js-->
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.js"> </script>
</body>

</html>