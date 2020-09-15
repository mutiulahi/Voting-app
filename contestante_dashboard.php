<?php

session_start();

if (!isset($_SESSION['paid'])) {
	header('Location: contestant_login_page.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'evoting';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT matric, fullname, faculty, department, post, level, cgp, email, profileImage, manifestos FROM contestants WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($matric, $fullname, $faculty, $department, $post, $level, $cgp, $email, $image, $manifesto);
$stmt->fetch();
$stmt->close();
$_SESSION['dash'] = TRUE;
$date = date("d m Y")
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Voting System</title>

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

    <!-- Offcanvas Menu Section Begin -->
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
                <li> <a href="contestant_login_page.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
                                    <li> <a href="contestant_login_page.php"><i class="fa fa-sign-out"></i> Logout</a>
                                    </li>
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
                        <!--<h2>Our Rooms</h2>-->
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 style="font-family: arial">Profile</h3>
                    <div class="rd-reviews">

                        <div class="review-item" style="margin-top:50px;">
                            <div class="ri-pic">
                                <!--<img src="img/room/avatar/avatar-1.jpg" alt="">-->
                                <img src="img/profilePics/<?=$image?> ">
                            </div>
                            <div class="ri-text">
                                <span><?=$date?></span>
                                <!-- <div class="rating">
                                    <div class="rdt-right">
                                        <a href="contestant_signin_page.php" class="profile">Update Your Profile</a>
                                    </div>
                            </div>-->
                                <h5><?=$fullname?></h5>
                                <div>
                                    <h2 style="margin-top:10px;"><span>citiz:</span><?=$cgp?></h2>
                                    <table style="margin-top:10px;">
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Email </td>
                                                <td><?='  : '.$email?></td>
                                            </tr>

                                            <tr>
                                                <td class="r-o">Faculty: </td>
                                                <td><?='  : '.$faculty?></td>
                                            </tr>

                                            <tr>
                                                <td class="r-o">Department: </td>
                                                <td><?='  : '.$department?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">level: </td>
                                                <td><?='  : '.$level?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Post: </td>
                                                <td><?='  : '.$post ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="manifesto">
                    <h4>Manifesto</h4>
                    <hr>
                    <p class="f-para"><?=$manifesto?></p>

                </div>
            </div>
            <!--  <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>-->
        </div>
        </div>
        </div>
    </section>
    <!-- Room Details Section End -->

    <!-- Footer Section Begin -->
    <?php
    include'includes/footer.php';
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