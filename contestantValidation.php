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
    <title>Sign up | Voting System</title>

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
                    <div class="breadcrumb-text">
                        <h2>Contestant Sign up</h2>
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

            $fulln = $_POST["fullname"];
            $matric = $_POST["matric"];
            $pass = $_POST["pass"];
            $cpass = $_POST["cpass"];
            $faculty = $_POST["faculty"];
            $department = $_POST["department"];
            $post = $_POST["post"];
            $level = $_POST["level"];
            $cgp = $_POST["cgp"];
            $manifesto = $_POST["manifesto"];
            $email = $_POST["email"];
            
            $image = $_FILES["picture"]["name"];
            $uploadedPic = $matric.'_'.$image;
            $imageType = $_FILES["picture"]["type"];
            $imageDestination ='img/profilePics/'.$uploadedPic;
            



            if ($pass!==$cpass){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Password don't match!</span>";
            }
            elseif (empty($post) || empty($level)){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>You have not select your post or level</span>";

            }
            elseif (strpos($imageType, "image") !== 0){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Select valied image file</span>";
            }
            elseif (strlen($pass)<6 && strlen($cpass)<6){
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>Your password is too weak</span>";
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
                
            $stmt = "INSERT INTO contestants (matric, password, fullname, faculty, department, post, level, cgp, email, profileImage, manifestos)VALUES 
            ( '$matric', '$pass', '$fulln', '$faculty','$department','$post','$level', '$cgp', '$email', '$uploadedPic', '$manifesto')";

            if(mysqli_query($db_con, $stmt))
            {
                $imageDestination ='img/profilePics/'.$uploadedPic;
                move_uploaded_file($_FILES['picture']['tmp_name'], $imageDestination);
                
                echo"<script type=\"text/javascript\"> 
                alert(\"Registration successfully!\");
                window.location = \"contestant_login_page.php\"</script>";
                
            }
            else{
                echo "<span style='color: red; border: 1px solid #f3f3f3; padding: 10px; border-radius: 10px;'>This matric number as being used by another person!</span>";
            }
        }
    }
        ?>
                <div class="room-booking" style="margin-bottom: 10%;">
                    <!-- <h3>Contestant Registration</h3>-->
                    <form action="contestant_signin_page.php" data-toggle="validator" method="post"
                        enctype="multipart/form-data">
                        <div class="check-date">
                            <label for="date-in" style="text-align:left;">Full name <span style="color:red">*</span>
                            </label>
                            <input type="text" class="date-input hasDatepicker" id="inputName" id="date-in"
                                name="fullname" required>
                        </div>
                        <div class="check-date ">
                            <label for="date-in" style="text-align:left;">Matric no <span style="color:red">*</span>
                            </label>
                            <input type="text" class="date-input hasDatepicker" id="inputName" id="date-in"
                                name="matric" required>
                        </div>

                        <div class="check-date ">
                            <label for="date-out" style="text-align:left;">Faculty <span style="color:red">*</span>
                            </label>
                            <input type="text" class="date-input hasDatepicker" id="inputName" id="date-out"
                                name="faculty" required>

                        </div>
                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Department <span style="color:red">*</span>
                            </label>
                            <input type="text" class="date-input hasDatepicker" id="date-out" name="department"
                                required>
                        </div>

                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Email <span style="color:red">*</span>
                            </label>
                            <input type="email" class="date-input hasDatepicker" id="inputEmail" name="email"
                                data-error="Sorr y, that email address is invalid" required>
                        </div>


                        <div class="select-option check-date">
                            <label for="guest" style="text-align:left;">Post <span style="color:red">*</span> </label>
                            <select id="guest inputEmail" style="" name="post">
                                <option value="">post</option>
                                <?php
                                    $postarr = array();
                                    $DATABASE_HOST = 'localhost';
                                    $DATABASE_USER = 'root';
                                    $DATABASE_PASS = '';
                                    $DATABASE_NAME = 'evoting';
                                    $db_con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                                    if (mysqli_connect_errno()) {
                                        die ('Failed to connect to MySQL: ' . mysqli_connect_error());
                                    }
                                    $query ="SELECT post FROM postreg";
                                    $result = mysqli_query($db_con, $query);
                                    while($row=mysqli_fetch_array($result))
                                    {
                                        $postarr[] = $row['post'];
                                    } 
                                    $num = sizeof($postarr);
                                    for($i=0; $i<$num; $i++)
                                    {
                                        
                                        echo'<option value="'.$postarr[$i].'">'.$postarr[$i].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="select-opti">
                            <label for="guest" style="text-align:left;">Level <span style="color:red">*</span> </label>
                            <select id="guest" style="display: none;" name="level">
                                <option value="">Level</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Citizenship Grade <span
                                    style="color:red">*</span></label>
                            <input type="text" class="date-input hasDatepicker" id="date-out" name="cgp" required>
                        </div>
                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Password (minimum of 6 character) <span
                                    style="color:red">*</span></label>
                            <input type="password" class="date-input hasDatepicker" id="inputPassword"
                                data-toggle="validator" data-minlength="6" name="pass" required>
                        </div>
                        <div class="check-date">
                            <label for="date-out" style="text-align:left;">Conform Password <span
                                    style="color:red">*</span></label>
                            <input type="password" class="date-input hasDatepicker" id="inputPassword" name="cpass"
                                data-match="#inputPassword" data-match-error="Whoops, these don't match"
                                id="inputPasswordConfirm" required>
                            <span class="help-block">Minimum of 6 characters</span>
                        </div>


                        <div class="img">
                            <label>Browse profile picture <span style="color:red">*</span> </label>
                            <input type="file" name="picture" id="picture" style="border: solid 1px #ebebeb" required>
                        </div>

                        <div class="textArea">
                            <label for="date-out">Manifesto <span style="color:red">*</span> </label>
                            <textarea name="manifesto" id="txtarea1" cols="40" rows="5"
                                style="border: solid 1px #ebebeb" required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary disabled">Submit</button>
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
    <script src="js/validator.min.js"></script>
    <!--//validator js-->
</body>

</html>