
<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Login | Voting admin panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmen-push" style="background-color: #f1f1f1">
    <div class="mai-content">
        <!--left-fixed -navigation-->

        <!--left-fixed -navigation-->
        <!-- header-starts -->

        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper" class="container">
            <div class="login-page">
                <h3 class="title1"><img style="width: 10%; height: 10%;" src="images/logo.png" alt="" srcset=""></h3>
                <div class="widget-shadow">
                    <div class="login-top">
                        <h4>VOTING SYSTEM</h4>
                    </div>
                    <div class="login-body">
                        <?php
							if(isset($_POST['Sign_in']))
							{
								

								include '../includes/database.php';

								$querydb = $con->prepare("SELECT id, password from admin WHERE email = ? OR username = ?");
								$querydb ->bind_param('ss', $_POST['username'] ,$_POST['username']);
								$querydb ->execute();
								$querydb->store_result();
								if ($querydb->num_rows > 0)
								{
									$querydb ->bind_result($id,  $password);
									$querydb ->fetch();
									$querydb ->close();
									
									if ($_POST['password'] === $password) 
									{
										$_SESSION['name'] = $_POST['username'];
										$_SESSION['OrgName'] = $OrgName;
										header('Location:dashboard.php');
									} 
									else 
									{
										
										echo "<center><div style='margin-bottom:20px; padding:5px; width:54%; font-size: 14px; border: 1px solid #f7a8a8; background-color:#f2aeae; border-radius:5px; color: #c61313;'>Incorrect username or password.</div></center>";

									}
								}
								else
								{
										echo "<center><div style='margin-bottom:20px; padding:5px; width:55%; font-size: 14px; border: 1px solid #f7a8a8; background-color:#f2aeae; border-radius:5px; color: #c61313;'>Incorrect username or password.</div></center>";
								}
							}
							

						?>
                        <form action="index.php" method="POST">
                            <input type="text" class="user" name="username" placeholder="Enter your email" required>
                            <input type="password" name="password" class="lock" placeholder="password" required>
                            <input type="submit" name="Sign_in" value="Sign In">


                        </form>
                    </div>
                </div>

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