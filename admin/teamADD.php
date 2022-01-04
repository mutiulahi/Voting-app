<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header('Location:index.php');
    }


    if(isset($_POST['submit'])){
        include '../includes/database.php';

        $fullname = $_POST['fullname'];
        $userN = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = "SELECT * FROM admin WHERE email = '$email' or username = '$userN'";
        $result = mysqli_query($con, $check);
        $rowcount = mysqli_num_rows( $result );

        if ($rowcount > 0) {
            echo"<script type=\"text/javascript\"> 
            alert(\"Email or Username is chosen!\");
            window.location = \"teamADD.php\"</script>";
        
        }else{

            $InsertInToDb = "INSERT INTO admin(fullname, email, password, username) VALUES ('$fullname', '$email', '$password', '$userN')";
            if(mysqli_query($con, $InsertInToDb)){
                
                echo"<script type=\"text/javascript\"> 
                alert(\"Registration successful!\");
                window.location = \"teamADD.php\"</script>";
            } 
        } 
    } 
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Add user | Voting admin panel</title>
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

                <div class=" form-grids row form-grids-right">
                    <div class="widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4> Add Users </h4>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" data-toggle="validator" action="teamADD.php" method="POST">
                                <div class="form-group">
                                    <span for="form-control">Fullname:</span>
                                    <input type="text" class="form-control mt-4" id="inputName" placeholder="Fullname"
                                        name="fullname" required>
                                </div>
                                <div class="form-group">
                                    <span for="form-control">Username:</span>
                                    <input type="text" class="form-control mt-4" id="inputName" placeholder="Username"
                                        name="username" required>
                                </div>
                                <div class="form-group has-feedback">
                                    <span for="form-control">Email:</span>
                                    <input type="email" name="email" class="form-control mt-4" id="inputEmail"
                                        placeholder="Email" data-error="Sorry, that email address is invalid" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors">Please enter a valid email address</span>
                                </div>
                                <div class="form-group">
                                    <span for="form-control">Password:</span>
                                    <input type="password" name="password" data-toggle="validator" data-minlength="6"
                                        class="form-control mt-4" id="inputPassword" placeholder="Password" required>
                                    <span class="help-block">Minimum of 6 characters</span>
                                </div>
                                <div class="form-group">
                                    <span for="form-control">Confirm Password:</span>
                                    <input type="password" class="form-control mt-4" id="inputPasswordConfirm"
                                        data-match="#inputPassword" data-match-error="Whoops, these don't match"
                                        placeholder="Confirm password" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class=" disabled">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <!--validator js-->
    <script src="js/validator.min.js"></script>
    <!--//validator js-->
</body>

</html>S