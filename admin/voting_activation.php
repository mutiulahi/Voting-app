<?php
session_start();
if(!isset($_SESSION['name'])){
	header('Location:index.php');
}


?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Panel | Pages</title>
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

        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="form-two widget-shadow">
                    <div class="form-title">
                        <h4>Setting :</h4>
                    </div>
                    <div class="form-body" data-example-id="simple-form-inline">
                        <?php
									$conn = mysqli_connect('localhost', 'root', '', 'evoting');
									if(isset($_POST['activateCR'])){
										$query = "UPDATE pages SET contestantReg='activated'";
										if(mysqli_query($conn,$query))
										{
											echo "Contestant page is Actiavted";
										}
									}
									elseif(isset($_POST['deactivateCR'])){
										$query = "UPDATE pages SET contestantReg='deactivated'";
										if(mysqli_query($conn,$query))
										{
											echo "Contestant page is Deactiavted";
										}
									}

									if(isset($_POST['activateVT'])){
										$query = "UPDATE pages SET voting='activated'";
										if(mysqli_query($conn,$query))
										{
											echo "Voting page is Actiavted";
										}
									}
									elseif(isset($_POST['deactivateVT'])){
										$query = "UPDATE pages SET voting='deactivated'";
										if(mysqli_query($conn,$query))
										{
											echo "Voting page is Deactiavted";
										}

									}
									if(isset($_POST['activateVRT'])){
										$query = "UPDATE pages SET voterReg='activated'";
										if(mysqli_query($conn,$query))
										{
											echo "Voter's registration page is Actiavted";
										}
										}
									elseif(isset($_POST['deactivateVRT'])){
										$query = "UPDATE pages SET voterReg='deactivated'";
										if(mysqli_query($conn,$query))
										{
											echo "Voter's registration page is 'Deactiavted'";
										}
									}
							?>
                        <form class="form-inline" action='voting_activation.php' method='POST'>
                            <div class="form-group">
                                <label for="exampleInputName2">Contestante Registration Page</label>
                                <br><br>
                                <button type="submit" class="btn btn-default" name='activateCR'>Activate</button>
                                <button type="submit" class="btn btn-default" name='deactivateCR'>Deactivate</button>

                            </div>
                            <br>
                            <hr>

                            <div class="form-group">
                                <label for="exampleInputName2">Voter's Registration Page</label>
                                <br><br>
                                <button type="submit" class="btn btn-default" name='activateVRT'>Activate</button>
                                <button type="submit" class="btn btn-default" name='deactivateVRT'>Deactivate</button>

                            </div>
                            <br>
                            <hr>
                            <div class="form-group">
                                <label for="exampleInputName2">Voting Page</label>
                                <br><br>
                                <button type="submit" class="btn btn-default" name='activateVT'>Activate</button>
                                <button type="submit" class="btn btn-default" name='deactivateVT'>Deactivate</button>

                            </div>


                        </form>
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