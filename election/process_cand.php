<?php
$name = $_REQUEST['txtName'];
$email   = $_REQUEST['txtEmail'];

$branch =  $_REQUEST['txtbranch'];
$rollno =  $_REQUEST['txtRollNo'];
$pname=$_REQUEST['txtposition'];






//database connection
include('dbConnect.php');

$sql = "INSERT into candidates(name,email,branch,rollno,pname) values(:name,:email,:branch,:rollno,:pname)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":name",$name);
$stmt->bindParam(":email",$email);

$stmt->bindParam(":branch",$branch);
$stmt->bindParam(":rollno",$rollno);
$stmt->bindParam(":pname",$pname);


$stmt->execute();

header('location: pending.php');
?>
