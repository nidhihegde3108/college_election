<?php
   session_start();

   define('SITEURL','http://localhost/election/college_election/e1');
   define('LOCALHOST','localhost:3307');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','voting');


   $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($db));
   $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error($db));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
      .td-1{
          text-align: center;
          padding-top: 20px;
        
      }
      table{
        margin:auto;
      }
     
    </style>
</head>
<body>
    <div class="container-fluid" id="cont-3">
        <header id="nav-bar">
          <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href=login.php  style="color: white; font-weight: 600; margin-top: 15px;">GO VOTE</a>
            <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto animate__animated animate__bounceInDown" style="padding-right: 50px;">
        <li class="nav-item" >
          <a class="nav-link" href="index.php" style="color:white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Home</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="year.php"  style="color: white; font-weight: 600; text-align: center; font-size: 18px; margin-top: 20px;  text-transform: capitalize; padding: 20px;">Candidate</a>
        </li>
        </ul>
    </div>
              
              </ul>
            </div>
          </nav>
        </header>
    


    </section>
    <?php 
 
    $sql2="SELECT *  FROM position WHERE pid=1001";
    $res2=mysqli_query($conn,$sql2);
    $count2=mysqli_num_rows($res2);
    if($count2==1)
    {
      $row2=mysqli_fetch_assoc($res2);
      $pname=$row2['pname'];
    }
    else
    {
      header('location:'.SITEURL.'registration.php');
    }
 
  ?>
    <section id="center" style="background-color:black;">
    <div class="container">
        <div class="row">
            <div class="col-md-6" >
                <h1 style="padding-top: 20px;color: #00b4d8;">Candidate Enroll</h1>
                <p style="padding-top: 20px;color: #00b4d8;">President Enroll</p>
                <form action="process_cand.php" method="post">
                <table>
                <tr>
                        <td class="td-1" style="color: #00b4d8;">Roll No. :</td>
                        <td class="td-1"><input  required type="number" style="text-align: left;" name="txtRollNo" ></td>
                    </tr>
                    <tr>
                        <td class="td-1" style="color: #00b4d8;">Name :</td>
                        <td class="td-1"><input   requiredtype="text" style="text-align: left;" name="txtName"  autofocus></td>
                    </tr>
                    <tr>
                        <td class="td-1" style="color: #00b4d8;">Email :</td>
                        <td class="td-1"><input   requiredtype="email" style="text-align: left;" name="txtEmail" ></td>
                    </tr>
                    <tr>
                        <td class="td-1" style="color: #00b4d8;">Branch :</td>
                        <td class="td-1"><input  required type="text" style="text-align: left;" name="txtbranch" ></td>
                    </tr>
                    
                    <tr>
                        <td class="td-1" style="color: #00b4d8;">Position :</td>
                        <td class="td-1"><input  required  type="text" style="text-align: left;" name="txtposition" value="<?php echo $pname;?>"></td>
                    </tr>
                   
                    
                  
                    <tr>
                        <td class="td-2" id style="padding-top: 20px; padding-bottom: 40px;" ><button class="magnifyBtn" name="Submit">Submit</button></td>
                    </tr>
                </table>
              </form>
            </div>
            <div class="col-md-6" style="padding-top: 50px;">
                <img src="img/8.svg" alt="" srcset="">
            </div>
        </div>
    </div>
</section>
<!-- <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <hr>
        <div class="Footer">
        <ul style="display: flex;">
                  <li style="list-style: none; padding: 10px; "><a href="index.php" style="text-decoration: none; color: #a517ba;">Home</a></li>
                  <li style="list-style: none; padding: 10px; "><a href="about.php" style="text-decoration: none; color: #a517ba;">About</a></li>
                  </ul>
        </div>
      </div>
      <div class="col-md-6">
        <hr>
        <div class="social-icon">
          <ul >
                          <li>
                              <a href="">
                                  <i class="fa fa-facebook"></i>
                              </a>
                          </li>
                          <li>
                              <a href="">
                                  <i class="fa fa-google-plus"></i>
                              </a>
                          </li>
                          <li>
                              <a href="">
                                  <i class="fa fa-linkedin"></i>
                              </a>
                          </li>
                          <li>
                              <a href="">
                                  <i class="fa fa-twitter"></i>
                              </a>
                          </li>
                          <li>
                              <a href="">
                                  <i class="fa fa-pinterest"></i>
                              </a>
                          </li>
                      </ul>
        </div>
      </div> -->
    </div>
  </div>
  </section>

  
   
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>    
    <script src="js/bootstrap.min.js"></script>  
    <!-- <script src="js/aos.js"></script>
    <script>
     AOS.init();
    </script> -->
</body>
</html>