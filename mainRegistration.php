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
    <!-- Page Preloder 
    <div id="preloder">
        <div class="loader"></div>
    </div>-->
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
                    <div class="breadcrumb-text" >
                        <h2>Setup your platform</h2>
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
        <div class="col-lg-6" >
        <?php
        
            if (isset($_POST['submit'])){

            $orgName = $_POST["orgName"];
            $email = $_POST["email"];            
            $pass = $_POST["pass"];
            $cpass = $_POST["cpass"];
            $category = $_POST["category"];
           
            
            $image = $_FILES["logo"]["name"];
            $uploadedPic = $orgName.'_'.$image;
            
            $imageDestination ='img/Org_logo/'.$uploadedPic;
            



            if(empty($pass)&& empty($cpass)){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Password is empty!</span>";

            }
            elseif ($pass!==$cpass){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Password don't match!</span>";
            }
            elseif (empty($image)){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Please upload the Org logo!</span>";
            }
            elseif (empty($category)){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Please select your category</span>";

            }
            
            else{
            $DATABASE_HOST = 'localhost';
            $DATABASE_USER = 'root';
            $DATABASE_PASS = '';
            $DATABASE_NAME = 'evoting';
            $db_con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
            if (mysqli_connect_errno()) {
                die ('Failed to connect to MySQL: ' . mysqli_connect_error());
            }
                
            $stmt = "INSERT INTO org_registration (name, email, logo, category, password)VALUES 
            ('$orgName', '$email', '$uploadedPic', '$category', '$pass',)";

            if(mysqli_query($db_con, $stmt))
            {
                echo $uploadedPic;
                $imageDestination ='img/Org_logo/'.$uploadedPic;
                move_uploaded_file($_FILES['logo']['tmp_name'], $imageDestination);
                echo"<script type=\"text/javascript\"> 
                alert(\"Registration successfully!\");
                window.location = \"contestant_login_page.php\"</script>";
                
            }
            else{
                
                die('Error'.mysqli_connect_error());
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>This matric number as being used by another person!</span>";
            }
        }
    }
        ?>
            <div class="room-booking" style="margin-bottom: 10%;">
               <!-- <h3>Contestant Registration</h3>-->
                    <form action="mainRegistration.php" method="post" enctype="multipart/form-data">
                        <div class="check-date">
                            <label for="date-in" style="text-align:left;">Org name <span style="color:red">*</span></label>
                            <input type="text" class="date-input hasDatepicker" id="date-in" name="orgName" >
                        </div>

                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Email (Required in login page. ) <span style="color:red">*</span></label>
                            <input type="email" class="date-input hasDatepicker" id="date-out" name="email" >
                        </div>
                        
                        <div class="select-option check-date">
                            <label for="guest" style="text-align:left;">Category <span style="color:red">*</span></label>
                            <select id="guest" style="display: none;" name="category" >
                                <option value="">select</option>
                                <option value="100">Intitution Election</option>
                                <option value="200">An organisation Election</option>
                            </select>    
                        </div>
                        
                        <div class="check-date">
                            <label style="text-align:left;">Org logo <span style="color:red">*</span></label>
                            <input type="file" name="logo" id="picture" style="border: solid 1px #ebebeb">
                        </div>

                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Password <span style="color:red">*</span></label>
                            <input type="password" class="date-input hasDatepicker" id="date-out" name="pass" >
                        </div>
                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Conform Password <span style="color:red">*</span></label>
                            <input type="password" class="date-input hasDatepicker" id="date-out" name="cpass" >
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