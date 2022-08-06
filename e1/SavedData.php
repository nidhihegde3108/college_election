<?php
$name = $_REQUEST['txtName'];
$email   = $_REQUEST['txtEmail'];

$candi = $_REQUEST['txtCand'];
$rollno =  $_REQUEST['txtRollNo'];

$Branch =  $_REQUEST['txtBranch'];
$pname=$_REQUEST['txtposition'];




//database connection
include('dbConnect.php');

$sql = "INSERT into users(name,email,Branch,candidate,rollno,pname) values(:name,:email,:Branch,:candidate,:rollno,:pname)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":name",$name);
$stmt->bindParam(":email",$email);
$stmt->bindParam(":Branch",$Branch);

$stmt->bindParam(":candidate",$candi);
$stmt->bindParam(":rollno",$rollno);
$stmt->bindParam(":pname",$pname);


$stmt->execute();

header('location:successfully.php');
?>  