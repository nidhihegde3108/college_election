<?php
   session_start();

   define('SITEURL','http://localhost/election/college_election/e1/');
   define('LOCALHOST','localhost:3307');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','voting');


   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($db));
   $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error($db));

   if(isset($_POST['signup-btn']))
   {
	   $usn=$_POST['usn'];
	   $name=$_POST['student_name'];
	   $branch=$_POST['branch'];
	   $password=$_POST['password'];
	   $email=$_POST['email'];
	   $sql="INSERT INTO student_details SET
	   usn='$usn',
	   name='$name',
	   branch='$branch',
	   password='$password',
	   email_id='$email'
	   ";
	   $res=mysqli_query($conn,$sql) or die (mysqli_error($conn));
	   if($res==TRUE)
	   {
		   $_SESSION['add']="<div style='color:black';> Registered Successfully</div>";
		   header("location:".SITEURL.'login.php');
		   
	   }
	   else
	   {
		 $_SESSION['add']="<div style='color:red';> Registered unSuccessfully</div>";
		 header("location:".SITEURL.'registration.php');
	   }
   }


?>
<HTML>
<HEAD>
<TITLE> Registration</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="user-registration.css" type="text/css"
	rel="stylesheet" >
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<style>
	
body{
	margin: 0;
	padding: 0;
	font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}

.container{
	width:490px;
	height: 477px;
	background-color: #00b4d8;
background-image: linear-gradient(315deg, #2f4353 0%, #d2ccc4 14%);
    border: 2px solid #00b4d8;
	border-radius: 40px;
	position: absolute;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
	color:#00b4d8;
	text-align: center;
	box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 1);
}
.container h1{
	font-size: 40px;
	margin-top: 10px;
	margin-bottom: 30px;
	color: whitesmoke;
	text-decoration: underline #00b4d8 4px;
}
.tbox{
	width: 260px;
	height: 40px;
	background: #f1f1f1b3;
	border-radius: 10px;
	margin:5px;
	color: black;
}
 input{
	background: none;
	border: none;
	outline: none;
	text-align: center;
	width: 90%;
	line-height: 27px;
	font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color:white;

}
input:hover{
  box-shadow: 0 0 10px 4px #00b4d8;
}

.button{
	width:260px;
	height: 40px;
	background: #f1f1f1b3;
	border-radius: 10px;
	margin: 19px auto;
	display: block;
	color: #00b4d8;
	cursor: pointer;
	font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.button:hover{
	
}
.signup h6 {
	margin-top: -10px;
	text-align: center;
	
}
.b1{
	display: block;
	width: 260px;
	text-decoration: none;
	color: whitesmoke;
	text-align: center;
	margin: auto 20px;
	transition: 0.4s all;
	font-size: 15px;
}
.b2{
	
	color: whitesmoke;
	font-size: 20px;
	background-color:#00b4d8;
	padding: 10px;
	position: relative;
    bottom: 39px;
	border-radius: 6px;
	text-decoration:none;

}
.b2:hover{
	
	box-shadow: 0 0 10px 4px whitesmoke;
	
	
}
.b3{
	padding-right: 118px;
    color: whitesmoke;
    /* padding-bottom: 37px; */
    position: relative;
    bottom: 39px;
    right: 30px;
}
div .flex{
	display: flex;
	justify-content:space-between;
}

</style>
<body style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.42), rgba(211, 211, 211, 0.43)),
url('saint-anselm-colleges-g67f873d06_1920.jpg');background-position: center;">
	
	<div class="container">
		<div class="sign-up-container">
  <div class="flex">
	<div class="login-signup">
		<a href="admin_login.php" class="b2">Admin Login</a>
	</div>
	<div class="login-signup">
		<a href="login.php" class="b2">Login</a>
	</div>
  </div>
			

			
			<div class="">
			<?php
              if(isset($_SESSION['add']))
              {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
              }
             
              ?>
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					
					<h1 class="h1">Registration</h1>
	
    
                    <div class="error-msg" id="error-msg"></div>
					<div class="row">
						<div class="inline-block">
							<!-- <div class="form-label">
								USN<span class="required error" id="usn-info"></span>
							</div> -->
							<input class="input-box-330 tbox" type="text" name="usn"
								id="usn" placeholder="USN" required>
						</div>
					</div>
                    <div class="row">
						<div class="inline-block">
							<!-- <div class="form-label">
								name<span class="required error" id="name-info"></span>
							</div> -->
							<input class="input-box-330 tbox" type="text" name="student_name"
								id="student_name" placeholder="Name" required>
						</div>
					</div>
                    <div class="row">
						<div class="inline-block">
							<!-- <div class="form-label">
								Branch<span class="required error" id="branch-info"></span>
							</div> -->
							<input class="input-box-330 tbox" type="text" name="branch"
								id="branch" placeholder="Branch" required>
						</div>
					</div>
                    <!-- <div class="row">
						<div class="inline-block">
							<div class="form-label">
								Phone Number<span class="required error" id="phno-info"></span>
							</div>
							<input class="input-box-330 tbox" type="text" name="phno" id="phno" placeholder="phno">
						</div>
					</div> -->
					
					<div class="row">
						<div class="inline-block">
							<!-- <div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div> -->
							<input class="input-box-330 tbox" type="password"
								name="password" id="signup-password" placeholder="Password" required>
						</div>
					</div>
                    <div class="row">
						<div class="inline-block">
							<!-- <div class="form-label">
								Email<span class="required error" id="email-info"></span>
							</div> -->
							<input class="input-box-330 tbox" type="email" name="email" id="email" placeholder="Email" required>
						</div>
					</div>
					
					</div>
					<div class="row">
						<input class="btn btn-dark button" type="submit" name="signup-btn" style="background-color:#00b4d8;color:whitesmoke;font-size:20px"
							id="signup-btn" value="signup Now">
					</div>
					<!-- <div class="row">
						<input class="btn button" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up">
					</div> -->
				</form>
			</div>
		</div>
	</div>
	<script>
function signupValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#email").removeClass("error-field");
	$("#password").removeClass("error-field");
	$("#confirm-password").removeClass("error-field");
	var UserName = $("#username").val();
	var email = $("#email").val();
	var Password = $('#signup-password').val();
    var ConfirmPassword = $('#confirm-password').val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	$("#username-info").html("").hide();
	$("#email-info").html("").hide();
	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
		$("#signup-password").addClass("error-field");
		valid = false;
	}
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
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
