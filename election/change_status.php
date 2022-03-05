<?php


include('dbConnect.php');

if(isset($_REQUEST['status'])){
    $status = $_REQUEST['status'];
    $rollno = $_REQUEST['rollno'];

    $sql = "update candidates set approve_status=:status where rollno=:rollno";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status',$status);
    $stmt->bindParam(":rollno",$rollno);
    $stmt->execute();
    header("location:user_cand.php");
}

?>