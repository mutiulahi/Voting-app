<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voter Sign up | Voting System </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/mycss.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!--menu begin-->
    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="index.php">Login</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-sign-in mr-1"></i>Login</a></li>
                                </ul>
                            </nav>
                            <!--<div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Voter's Sign up</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Sign up</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <center>
        <div style="margin-top: -70px; width:100%">
            <div class="col-lg-6">
                <?php
           
                    if (isset($_POST['submit'])){

                        include 'includes/database.php';
                    
                    $matric = $_POST["matric"];
                    $pass = $_POST["pass"];
                    $cpass = $_POST["cpass"];
                    $faculty = $_POST["faculty"];
                    $department = $_POST["department"];
                    $email = $_POST["email"];

                    if ($pass!==$cpass){
                        echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px;
                        border-radius: 10px;'>Password don't match!</span>";
                    }
                    elseif(strlen($matric) > 11){
                        echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; 
                        border-radius: 10px;'>Invalid matric number!</span>";

                    }
                    else{ 
                    $stmt = "INSERT INTO votelogin (matric, password, email,faculty, department)VALUES 
                    ('$matric', '$pass', '$email', '$faculty', '$department') ";

                    if(mysqli_query($con, $stmt))
                    {

                        echo"<script type=\"text/javascript\"> 
                        alert(\"Registration successfully!\");
                        window.location = \"index.php\"</script>";
                        
                    }
                    else{
                        
                        echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; 
                        border-radius: 10px;'>This matric number as been used by another person!</span>";
                    }
                }
            }
        ?>
                <div class="room-booking" style="margin-bottom: 10%;">
                    <!-- <h3>Contestant Registration</h3>-->
                    <form action="voter_signin.php" method="post">
                        <div class="check-date">
                            <label for="date-in" style="text-align:left;">Matric no <span
                                    style="color:red">*</span></label>
                            <input type="text" class="date-input hasDatepicker" id="date-in" name="matric" required>
                        </div>

                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Email <span
                                    style="color:red">*</span></label>
                            <input type="email" class="date-input hasDatepicker" id="date-out" name="email" required>
                        </div>

                        <div class="check-date ">
                            <label for="date-out" style="text-align:left;">Faculty <span
                                    style="color:red">*</span></label>
                            <input type="text" class="date-input hasDatepicker" id="date-out" name="faculty" required>

                        </div>
                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Department <span
                                    style="color:red">*</span></label>
                            <input type="text" class="date-input hasDatepicker" id="date-out" name="department"
                                required>
                        </div>

                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Password <span
                                    style="color:red">*</span></label>
                            <input type="password" class="date-input hasDatepicker" id="date-out" name="pass" required>
                        </div>
                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Conform Password <span
                                    style="color:red">*</span></label>
                            <input type="password" class="date-input hasDatepicker" id="date-out" name="cpass" required>
                        </div>
                        <button type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </center>


    <!-- Footer Section Begin -->
    <?php
    include'includes/footer.php'
    ?>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>