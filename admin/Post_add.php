 
<?php
session_start();
if(!isset($_SESSION['name'])){
	header("Location:index.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Add position | Voting admin panel </title>
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
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script> new WOW().init(); </script>
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
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Add new post :</h4>
                        </div>
                        <div class="form-body">
                            <?php
                                if(isset($_POST['submit']))
                                { 
    								include '../includes/database.php';

                                    $position = $_POST['position'];  

                                    $check = "SELECT * FROM posts where position = '$position'";
                                    $result = mysqli_query($con, $check);
                                    $rowcount = mysqli_num_rows( $result );

                                    if (!$rowcount>0) 
                                    { 
                                        $add_position = "INSERT INTO posts (position)VALUES('$position')";
                                        if (mysqli_query($con, $add_position)) {

                                            echo"<script type=\"text/javascript\"> 
                                            alert(\"The $position is successfuly added!\");
                                            window.location = \"Post_add.php\"</script>";

                                        }else{

                                            echo "Error 505 Internal error" . mysqli_error($con);

                                        }
                                    }
                                    else 
                                    {
                                        echo"<script type=\"text/javascript\"> 
                                        alert(\"Sorry post $position is existing\");
                                        window.location = \"Post_add.php\"</script>";
                                    }  
                                }
                            ?>
                            <form action="Post_add.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="mb-4">Enter new post: </label><br><br>
                                    <input type="text" class="form-control" placeholder="Add new post " name="position" required>
                                </div>                                                                                                   
                                                                                                   
                                <button type="submit" class="btn btn-primary" name="submit"> Add <i class="fa fa-plus"></i></button>
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