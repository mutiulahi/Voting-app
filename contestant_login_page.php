<?php
    session_start()
 ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Voting System</title>

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
    <div style="box-shadow: 0px 14px 35px rgba(0, 0, 0, 0.08);">
        <?php
            include'includes/menu.php';
        ?>
    </div>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Contestant Login</h2>
                        <div class="bt-option">
                            <a href="./home.php">Home</a>
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <center>
        <div style="margin-top: -70px; margin-bottom: 15%">
            <div class="col-lg-4">
                <?php
    if(isset($_POST['submit'])) 
    {
        include 'includes/database.php'; 
        
        if ($stmt = $con->prepare('SELECT id, password, validation FROM contestants WHERE matric = ?')) 
        {
                            
            $stmt->bind_param('s', $_POST['matric']);
            $stmt->execute();
                            
            $stmt->store_result();
            if ($stmt->num_rows > 0) 
            {
                $stmt->bind_result($id, $password, $validation);
                $stmt->fetch();                
                if($validation !== 'activate')
                {
                    echo "<h5>Please check back in 24h</h5>";
                }

                elseif ($_POST['password'] === $password) {

                                  
                    $_SESSION['paid'] = TRUE;
                    $_SESSION['name'] = $_POST['matric'];
                    $_SESSION['id'] = $id;
                    echo"<script type=\"text/javascript\"> 
                    alert(\"successfully!\");
                    window.location = \"contestante_dashboard.php\"</script>";
                    
                    
                } 
                else {
                    if(($validation !== 'activate' && $_POST['password'] !==$password) || $_POST['password'] !==$password) {
                        
                        // echo "<h5>Incorrect password</h5>";
                        echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Incorrect password</span>";

                    }
                }
            }
            else {
            //    echo "<h5>Incorrect matric</h5>";
               echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Incorrect matric</span>";

            }

            $stmt->close();
        }
    }
                
?>
                <div class="room-booking">
                    <form action="contestant_login_page.php" method="POST">
                        <div class="check-date" style="width: 90%;">
                            <label for="date-in" style="text-align:left;">Username:</label>
                            <input type="text" class="date-input hasDatepicker" id="date-in" placeholder="Username"
                                name="matric" required>
                        </div>
                        <div class="check-date" style="width: 90%;">
                            <label for="date-in" style="text-align:left;">Password:</label>
                            <input type="password" class="date-input hasDatepicker" id="date-in" placeholder="Password"
                                name="password" required>
                        </div>
                        <button type="submit" name="submit" onclick="validate()">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </center>
    <script>
    function validate() {
        var Input;
        var output;
        Input = document.getElementById('date-in').value
        if (Input == '') {
            output = "Error";
        } else {
            output = "hmm";
        }
    }
    </script>
    <!-- vote Section Begin -->
    <div class="container_cont">
        <div class="voter_for_items1">

        </div>
        <div class="voter_for_items2">

        </div>
        <div class="voter_for_items3">

        </div>
    </div>
    <!-- vote Section End -->
    <!-- Footer Section Begin -->
    <?php
    include'includes/footer.php'
    ?>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
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