<?php
if (!isset($_SESSION['loggedin'])) {
header('Location: index.php');
exit();
}
?>
<?php
    if(isset($_POST['submit']))
    {
        include 'includes/database.php';

        $name = $_SESSION['names'];
        $check_exist = "SELECT * FROM idvoterscount WHERE voterID = '$name'";
        $rowcount = mysqli_num_rows( mysqli_query($con, $check_exist));
        if ($rowcount > 0) {
            echo"<script type=\"text/javascript\"> 
            alert(\"Sorry you can only vote once !\");
            window.location = \"index.php\"</script>";
        } else {
            $vote = "INSERT INTO idvoterscount (voterID) VALUES('$name')";


            if(mysqli_query($con, $vote)) {
                foreach($_POST as $key=> $inputValue){   
    
                    $query = "INSERT INTO countersv (votercount) VALUES('$inputValue')";
                    if(mysqli_query($con, $query)) {
                        echo"<script type=\"text/javascript\"> 
                        alert(\"Successful !\");
                        window.location = \"vote_page.php\"</script>";
                    }
                    else{
                        echo"<script type=\"text/javascript\"> 
                        alert(\"Sorry you can only vote once !\");
                        window.location = \"index.php\"</script>";          
                    }
                }
            }
        } 
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AU voting | Chapter</title>

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
    <!-- Page Preloder-->
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
                <h4
                    style="font-size: 80px; margin-left: 60px; width: 100px; height: 100px; border-radius: 50px; border: 1px solid #f0e00a; text-align: center; line-height: 100px;">
                    <i class='fa fa-user' aria-hiddlen='true'></i></h4>
                <h4 style="font-size:30px; margin-left: 45px; margin-top: 10px; color: blue; letter-spacing:5px">
                    <span><?= '  '.$_SESSION['names'];?></span></h4>
                <!--<li><a href="#">Result</a></li>
                <li><a href="#">Registration</a>
                    <ul class="dropdown">
                        <li><a href="./contestant_login_page.php">Contestant</a></li>
                    </ul>
                </li>
                <li><a href="#">News</a></li>
                <li><a href="./contact.html">Contact</a></li>-->
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

                            </nav>
                            <div class="nav-right search-switch">
                                <h4><i class='fa fa-user' style="font-size:18px; ;" aria-hiddlen='true'></i><span
                                        style="font-size:15px; color: blue; letter-spacing:5px"><?= '  '.$_SESSION['names'];?></span>
                                </h4>
                            </div>
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
                    <div class="breadcrumb-text mb-5">
                        <h2>Voting Room</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>Vote</span>
                        </div>
                    </div>
                    <section class="rooms-section spad" style="margin-top:-50px; margin-bottom: auto;">
                        <div class="container">
                            <form action="vote_page.php" method="post">
                                <?php

                                    include 'includes/database.php';

                                    $posst = array();
                                    $fet = "SELECT position FROM posts";
                                    $result = mysqli_query($con, $fet);
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $posst[] = $row['position'];  
                                    }
                                    $pnumber = sizeof($posst);
                                    for($i=0; $i<$pnumber; $i++)
                                    {
                                        echo '<div class="contestants">
                                        <h4>'.$posst[$i].'</h4>';
                                        $post_passed = $posst[$i];
                                        $arr = array();
                                        $fetch = "SELECT fullname FROM contestants WHERE post = '$post_passed'  ";
                                        $result = mysqli_query($con, $fetch);
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $arr[] = $row['fullname'];  
                                        }
                                            $number = sizeof($arr);
                                        for($ii=0; $ii<$number; $ii++)
                                        {
                                            $enter =  $arr[$ii].' for '.$post_passed;
                                            
                                            echo"<label> <input type='radio' value='$enter' name='$post_passed'> ".$arr[$ii]." </label>";
                                            
                                        }
                                        echo'</div>';
                                    }
                                ?>
                                <button  type="submit" name="submit">Submit Your Vote</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- vote Section Begin -->

    <!-- <section class="rooms-section spad" style="margin-top:-50px; margin-bottom: auto;">
        <div class="container">
            <form action="vote_page.php" method="post">
                <?php

                    include 'includes/database.php';

                    $posst = array();
                    $fet = "SELECT position FROM posts";
                    $result = mysqli_query($con, $fet);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $posst[] = $row['position'];  
                    }
                    $pnumber = sizeof($posst);
                    for($i=0; $i<$pnumber; $i++)
                    {
                        echo '<div class="contestants">
                        <h4>'.$posst[$i].'</h4>';
                        $post_passed = $posst[$i];
                        $arr = array();
                        $fetch = "SELECT fullname FROM contestants WHERE post = '$post_passed'  ";
                        $result = mysqli_query($con, $fetch);
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $arr[] = $row['fullname'];  
                        }
                            $number = sizeof($arr);
                        for($ii=0; $ii<$number; $ii++)
                        {
                            $enter =  $arr[$ii].' for '.$post_passed;
                            
                            echo"<label> <input type='radio' value='$enter' name='$post_passed'> ".$arr[$ii]." </label>";
                            
                        }
                        echo'</div>';
                    }
                ?>
                <button class="sub" type="submit" name="submit">Submit Your Vote</button>
            </form>
        </div>
    </section> -->



    <footer>
    </footer>

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