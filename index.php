<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting System</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles  -->
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
    <?php
    include'includes/menu.php';
    ?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>VOTING IS YOUR RIGHT</h1>
                        <p>Voting is the best way of choosing the person you want on a particular position, vote
                            your choice with out seeking for any
                            others opinion but your choice.</p>
                        <a href="voter_signin.php" class="primary-btn">Register to vote</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <center>
                            <h3>Voter's Login</h3>
                        </center>
                        <form action="includes/login_voter.php" method="POST">
                            <div class="check-date">
                                <label for="date-in">Matric No</label>
                                <input type="text" name="matric" id="matric" placeholder="17/1000"
                                    style="font-size:12px" required>
                                <!--<i class="icon_calendar"></i>-->
                            </div>
                            <div class="check-date">
                                <label for="date-out">Password</label>
                                <input type="password" name="password" id="password" placeholder="password"
                                    style="font-size:12px" required>
                                <!--<i class="icon_calendar"></i>-->
                            </div>
                            <button name="login" type="submit">Login</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.png"></div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Manifesto</span>
                        <h2>Contestant Manfesto</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <?php
                            $DATABASE_HOST = 'localhost';
                            $DATABASE_USER = 'root';
                            $DATABASE_PASS = '';
                            $DATABASE_NAME = 'evoting';
                            
                            $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                            if ( mysqli_connect_errno() ) {
                                
                                die ('Failed to connect to MySQL: ' . mysqli_connect_error());
                            }
                            $query = "SELECT fullname, post, manifestos FROM contestants WHERE validation ='activate'";
                            $result = mysqli_query($con, $query);
                            while($row = mysqli_fetch_array($result)){
                            echo'<div class="ts-item">';
                            echo'<p>'.$row['manifestos'].'</p>';
                            echo'<div class="ti-author">';
                                echo'<h5>'.$row['fullname'].'</h5>';
                                echo'<h6>'.$row['post'].'</h6>';
                            echo'</div>';
                            echo'<img src="img/testimonial-logo.png" alt="">';
                            
                        echo'</div>';}
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->



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
<?php
/*session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'evoting';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['matric'], $_POST['password']) ) {
	die ('Please fill both the username and password field!');
}

if ($stmt = $con->prepare('SELECT id, password FROM votelogin WHERE matric = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['matric']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	
	if ($_POST['password'] === $password) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['names'] = $_POST['matric'];
		$_SESSION['id'] = $id;
		 echo"<script type=\"text/javascript\"> 
            alert(\"Login successfully!\");
            window.location = \"vote_page.php\"</script>";
	} else {
		echo"<script type=\"text/javascript\"> 
            alert(\"Incorrect Password!\");
            window.location = \"index.php\"</script>";
	}
} else {
	echo"<script type=\"text/javascript\"> 
            alert(\"Incorrect Matric!\");
            window.location = \"index.php\"</script>";
}

	$stmt->close();
}*/
?>