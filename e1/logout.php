<?php
   session_start();

   define('SITEURL','http://localhost/election/college_election/e1/');
   define('LOCALHOST','localhost:3307');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','voting');


   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($db));
   $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error($db));


?>


<?php
session_destroy();
header('location:'.SITEURL.'welcome.html');

?>