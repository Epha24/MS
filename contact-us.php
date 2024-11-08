<?php
include'conn.php';
$msg = "";
$fname_error = "";
$lname_error = "";
$phone_error = "";
$msg_error = "";
$num_error = 0;

if(isset($_POST['send'])){

 $fname = mysqli_escape_string($conn,$_POST['fname']);
 $lname = mysqli_escape_string($conn,$_POST['lname']);
 $email = mysqli_escape_string($conn,$_POST['email']);
 $phone = mysqli_escape_string($conn,$_POST['phone']);
 $messege = mysqli_escape_string($conn,$_POST['messege']);

if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
                $fname_error = "<p class='text-danger'>Invalid First Name</p>";
                $num_error++;
             }
             if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
                $lname_error = "<p class='text-danger'>Invalid Last Name</p>";
                $num_error++;
             }
             if(strlen($phone) < 10 || !ctype_digit($phone)){
                 $phone_error = "<p class='text-danger'>Invalid phone</p>";
                 $num_error++;
             } if(empty($messege)){
              $msg_error = "<p class='text-danger'>Please say some thing!!!</p>";
                 $num_error++;
             }
             if($num_error == 0){

  $qry = "INSERT INTO contact_us(fname,lname,email,phone,message) VALUES('$fname','$lname','$email','$phone','$messege')";
 $ext = mysqli_query($conn,$qry);

 if($ext){
  $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong><center>Message successfully sent</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
 }else{
  $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Oops! An error occured and your message could not be sent.</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
 }
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Us | E-Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/icon" href="pic/3.jpg">
 <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTable -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.navbar-brand img{
      border-radius: 50%;
    }
    .navbar{
      border-bottom:1px solid #c9c6bb;
    }
  .navbar a{
       font-size: 21px;
      font-family: "Times New Roman", Times, serif;
      font-style:bold;
	}

    .text1{
         font-family: fantasy;
         font-size: 35px;
     margin-top: 5%;
     color:orange;
        }
    .text2{
     font-family: "Times New Roman", Times, serif;;
     font-weight: 700;
     margin-top: 5%;
     color:white;
     font-size: 18px;
    }
    .text3{
      font-size: 18px;
      font-family: "Times New Roman", Times, serif;;
     font-weight: 700;
    }
       .container-fluid{
         padding-bottom: 30px;
         padding-top: 20px;
         background:url(pic/service.jpg);
         background-repeat: no-repeat;
         background-size: cover;
         background-position: top;
         height: 300px;
         text-align: center;
       }
       .card{
        border-radius: 0px;
       }
       .contact-address ul{
          list-style: none;
       }
       .singel-address{
        display: flex;
       }
       .singel-address .icon{
        border:1px solid blue;
        border-radius: 50%;
        padding:6px;
        margin-bottom: 15px;
        margin-right: 30px;
       }
       .singel-address .icon i{
        font-size: 33px;
        margin: 2px;
       }
       .contact-address{
        padding-top: 35px;
       }
       .nav-item a{
        font-size: 19px;
        }
        .fa{
        font-size: 17px;
       }
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <a class="navbar-brand" href="index.php" title=""><span class="header">&nbsp;&nbsp; <i class="fas fa-stream"></i> E-SERVICE</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about-us.php"><i class="fa fa-users"></i> About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-danger" href="contact-us.php"><i class="fa fa-address-book"></i> Contact Us</a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><span class="text-secondary"><i class="fa fa-user-plus"></i> Account</span></a>
      </li>
    </ul>
  </div>
</nav>
	<div class="container-fluid"> 
		
      <div class="text1">CONTACT US</div>
      <div><span class="text2"><a href="index.php" class="text-white">HOME</a> / </span><span class="text3 text-danger">CONTACT US</span></div>
	</div>
  <br><br>
  <!--====== CONTACT PART START ======-->
    
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
          
            <div class="row">
                <div class="col-lg-7">
                  <?=$msg?>
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h2>Keep in touch</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                            <form id="contact-form" action="contact-us.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="fname" type="text" class="form-control" placeholder="Your first name" required="required">
                                            <?=$fname_error; ?>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="lname" type="text" class="form-control" placeholder="Your last Name" required="required">
                                            <?=$lname_error; ?>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="email" type="email" class="form-control" placeholder="Email" required="required">
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="phone" type="text" class="form-control" placeholder="Phone" required="required">
                                            <?=$phone_error; ?>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <textarea name="messege" class="form-control" placeholder="Messege" required="required"></textarea>
                                            <?=$msg_error; ?>
                                        </div> <!-- singel form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" name="send" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                                        </div> <!-- singel form -->
                                    </div> 
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
                <div class="col-lg-5">
                    <div class="contact-address mt-30">
                        <ul>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-home text-primary"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Addis Ababa, Ethiopia</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-phone text-primary"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+251-963-11 2154</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope text-primary"></i>
                                    </div>
                                    <div class="cont">
                                        <p>multiservice@gmail.com</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                        </ul>
                    </div> <!-- contact address -->
                    <div class="map mt-30">
                        <div id="contact-map"></div>
                    </div> <!-- map -->
                </div>
            </div> <!-- row -->
            <br>
             <div class="card text-center pt-2 pb-2"><?php echo date("Y")?> &copy; All rights Reserved</div>
        </div> <!-- container -->
    </section>
    
    <!--====== CONTACT PART ENDS ======-->
   
</body>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function(){
    $('a').tooltip();
  });
</script>