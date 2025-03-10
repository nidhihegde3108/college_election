<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
		table{
			color:#00b4d8;
		}
		th{
			color:#00b4d8;
		}
		</style>
</head>
<body>
     <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <title></title>
</head>
<body>
<div class="container-fluid" id="cont-3">
        <header id="nav-bar">
          <nav class="navbar navbar-expand-lg navbar-light bg-dark">
           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto animate__animated animate__bounceInDown" style="padding-right: 50px;">
                
                <li class="nav-item" >
                  <a class="nav-link" href="result.php" style="color:white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Dashboard</a>
                </li>
                
              
				<li class="nav-item">
                  <a class="nav-link" href="user_details.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="user_cand.php" style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Candidates</a>
                </li>
              
              
                <li class="nav-item" >
                  <a class="nav-link" href="logout-admin.php"  style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Logout</a>
                </li>
              
              </ul>
            </div>
          </nav>
        </header>
	<section style="padding-top:50px; padding-bottom:50px color:#00b4d8;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" >

            
	<?php session_start();


	include('dbConnect.php');
	$sql = "select * from candidates order by rollno ";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$rs =  $stmt->fetchAll();

	echo "
		<table border='2'>
			<tr>
				<th>Sno.</th>
				<th>Name</th>
				<th>Email</th>
				
				<th>Branch</th>
				<th>Roll No.</th>
				<th>Position</th>
				
				<th>status</th>
				<th>Action</th>
			</tr>
	";
	$i = 1;
	foreach($rs as $row){
		$cid = $row['rollno'];
		echo "
		<tr>
			<td>".$i."</td>
			<td>".$row['name']."</td>
			<td>".$row['email']."</td>
			
			<td>".$row['branch']."</td>
			<td>".$row['rollno']."</td>
			<td>".$row['pname']."</td>
			
			<td>";
			if($row['approve_status']==0){
				echo "Pending";
			}else if($row['approve_status']==1){
				echo "Approved";
			}else{
				echo "Rejected";
			}
			
			echo "</td>
			<td>";
			if($row['approve_status']==2){
				echo '<a href="change_status.php?rollno='.$cid.'&status=1" class="btn btn-success">Approve</a>';
				echo '<a href="insert_Candidates.php?txtRollNo='.$cid.'&status=1"></a>';
			}else if($row['approve_status']==1){
				echo '<a href="change_status.php?rollno='.$cid.'&status=2" class="btn btn-danger">Reject</a>';
				echo '<a href="insert_Candidates.php?txtRollNo='.$cid.'&status=2"></a>';
			}else if($row['approve_status']==0){
				echo '<a href="change_status.php?rollno='.$cid.'&status=1" class="btn btn-success">Approve</a>';
				echo '<a href="change_status.php?rollno='.$cid.'&status=2" class="btn btn-danger">Reject</a>';
			}

			echo "</td>
        </tr>
		";
		$i++;
	}
	echo "</table>";
    ?>
        </div>
            </div>
        </div>
    </section>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>    
        <script src="js/bootstrap.min.js"></script>  
   
</body>
</html>