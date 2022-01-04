<?php
                            $arrTOTAL = array();
                            $con = mysqli_connect('localhost', 'root', '', 'evoting');
                            $query = "SELECT matric FROM votelogin ";
                            $result = mysqli_query($con, $query);
                            while($row = mysqli_fetch_array($result)){

                                $arrTOTAL[] = $row['matric'];
                            }
                            $countTOTAL = sizeof($arrTOTAL);
                            if ($countTOTAL == 0){
                                $countTOTAL = 1;
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
    <title>Sona | Template</title>

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

    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Result</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <span>Result</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Us Page Section Begin -->
    <section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ap-title">

                        </div>
                        <!-- Result begin -->

                        <?php
                                include 'includes/database.php';
                                $selectPOST ="SELECT position FROM posts";
                                $resultPOST = mysqli_query($con, $selectPOST);
                                while($rowPOST = mysqli_fetch_array($resultPOST)) {
                                    $postTO = $rowPOST['position'];
                                    echo'<label>'.$postTO.'</label>';
                                
                                    echo'<div name="president" class="disp-Rult">';
                                
                                $queryName ="SELECT fullname FROM contestants WHERE post = '$postTO' ";
                                $results = mysqli_query($con,$queryName);
                                while($rows = mysqli_fetch_array($results)){
                                    $fname = $rows["fullname"];
                                    echo $fname;
                                    echo'<div class="ful-pacentage">'; 
                                    $arr = array();
                                    $search = $fname.' for '.$postTO; 

                                    $queryR = "SELECT * FROM countersv WHERE votercount = '$search'";
                                    $resultR = mysqli_query($con, $queryR);
                                    if(!$resultR){
                                        die("Query failed".mysqli_error($con));
                                    }
                                    while($rowR = mysqli_fetch_array($resultR)){
                                        $arr[] = $rowR['votercount'];
                                    }
                                    $counts = sizeof($arr);
                                    $pacent = ($counts/$countTOTAL)*100;
                                    echo' <div class="vote-pacentage" style="width: '.$pacent.'%">';
                                    
                                    echo' </div>';
                                echo' </div>';
                                echo'<hr>';
                            
                            }
                            echo'</div>';
                        }
                            ?> 
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- About Us Page Section End -->


    <!-- Footer Section Begin -->
    <?php
        include 'includes/footer.php';
    ?>
    <!-- Footer Section End -->


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