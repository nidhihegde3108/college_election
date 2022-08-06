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


<HTML>
<HEAD>
<TITLE>Login</TITLE>

<link href="user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 -->
 
<style>
	body{
        margin: 0;
	padding: 0;
	font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  
    }
	input{
	background: none;
	border: none;
	outline: none;
	text-align: center;
	width: 50%;
	line-height: 37px;
	font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color:white;
	background: #f1f1f1b3;
	margin: 10px;

}
input:hover{
  box-shadow: 0 0 10px 4px #00b4d8;
}
.container{
	width:460px;
	height: 571px;
	background-color: #5f1178;
background-image: linear-gradient(315deg, #2f4353 0%, #d2ccc4 14%);
    border: 2px solid #5f1178;
	border-radius: 40px;
	position: absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
	color:black;
	text-align: center;
	box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 1);
}


.form-label{
color:white !important;
}
#login-btn{
	width:230px;
	height: 40px;
	background: #f1f1f1b3;
	border-radius: 10px;
	margin: 14px auto;
	display: block;
	color: #00b4d8;
	cursor: pointer;
	font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.login-signup h6 {
	margin-top: -10px;
	text-align: center;
	
	
}
.button:hover{
	color: whitesmoke;
	background-color: #00b4d8;
	box-shadow: 0 0 10px 4px #5f1178;
}
.b1{
	display: block;
	width: 260px;
	text-decoration: none;
	color: whitesmoke;
	text-align: center;
	margin: auto 100px;
	transition: 0.4s all;
	font-size: 15px;
}

.container a{
	font-size: 30px;
	margin-top: 40px;
	color: whitesmoke;
	background-color:#00b4d8;
	padding: 10px;
	
}


</style>
</HEAD>
<body style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.42), rgba(211, 211, 211, 0.43)),
url('saint-anselm-colleges-g67f873d06_1920.jpg');background-position: center;">

	<div class="container">
		<div class="sign-up-container">

            <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login']))
            {
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }
            
            ?>
			<div class="signup-align">
				<form name="login" action="" method="post"
				 style="margin-top:100px;">
					<!-- <i class="fa fa-user" style="font-size:80px;color:#003566;"></i> -->
					<h1 class="h1" style="color:whitesmoke;">LOGIN</h1>
				<div class="row">
						<div class="inline-block">
							
							<input class="input-box-330" type="text" name="usn" placeholder="usn"
								id="usn">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							
							<input class="input-box-330" type="password" placeholder="password"
								name="password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn btn-dark" type="submit" name="login-btn"
							id="login-btn" value="Login Now">
					</div>
					<div class="login-signup">
						<h6 class="b1">Don't have an account?</h6> 
						<a class="b1"  href="registration.php">Sign-up</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login-password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
<?php

if(isset($_POST['login-btn']))
{
     $usn=$_POST['usn'];
     $password=$_POST['password'];
     $sql="SELECT * FROM student_details WHERE usn='$usn' AND password='$password'";
     $res=mysqli_query($conn,$sql);

     $count=mysqli_num_rows($res);
     if($count==1)
     {
            $_SESSION['login']="<div style='color:green'>Login Successful.</div>";
            $_SESSION['user']=$usn;
            header('location:'.SITEURL.'index.php');
     }
     else
     {
        $_SESSION['login']="<div style='color:red'>username or password did not match</div>";
        header('location:'.SITEURL.'login.php');
     }
}
?>