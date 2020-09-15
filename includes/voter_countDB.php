  <?php
session_start();
if (!isset($_SESSION['loggedin'])) {
header('Location: index.php');
exit();
}

 if(isset($_POST['submit']))
 {
    //$fullnameP= $_POST['contestP'];
    $test = $_SESSION['voteC']
    echo $test;
    $fullnameP= $_POST['President'];
    
    $fullnameVP= $_POST['VicePresident'];
    
    $fullnameT= $_POST['Treasurer'];
    
    $votersNAME= $_SESSION['names'];
    
   
    
  $db_con = new mysqli('localhost','root','','evoting');

  $query = "INSERT INTO votingCount (voterCount, presidentsN, vicepresidentsN, treasurersN) VALUES('".$votersNAME."','".$fullnameP."', '".$fullnameVP."', '".$fullnameT."')";
  if(mysqli_query($db_con, $query))
   {
     echo"<script type=\"text/javascript\"> 
     alert(\"Your successfully\");
                        window.location = \"../index.php\"</script>";
    
                        }
                        else{
                          echo"not";
    
                        /*echo"<script type=\"text/javascript\"> 
                        alert(\"Sorry you can only vote once !\");
                        window.location = \"../index.php\"</script>";*/
                        }
                        }

?>