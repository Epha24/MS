 <?php
    include'conn.php';
    $msg = "";
    $p = "";
    $pass = "";
    session_start();
    if(isset($_POST['login'])){
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      
    
      $sql = "SELECT *FROM users WHERE username = '".$username."'";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
    if($num > 0){ while($row = mysqli_fetch_array($result)){

      $pass = md5($password);
      if($row['password'] == $pass){
      
      $_SESSION['user_name'] = $row['username'];
      $_SESSION['role'] = $row['role'];
	  
	  if($_SESSION['role'] == "admin"){
      header('Location:admin/index.php');
	  }
    if($_SESSION['role'] == "company"){
      header('Location:company/index.php');
    }
    if($_SESSION['role'] == "customer"){
      header('Location:customer/index.php');
    }

  }else{
     $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect Username / Password</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
  }
}
}
  else{
         $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect Username / Password</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
    }
}

   ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign In | E-Servcie</title>
  <link rel="icon" type="image/icon" href="pic/macic.jpg">
  <!-- Tell the browser to be responsive to screen width -->
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
  <style type="text/css">
    .navbar{
      border-bottom:1px solid #c9c6bb;
    }
  .navbar a{
       font-size: 20px;
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
       .about-singel-items span{
        font-size: 55px;
        font-style: bold;
        color: gray;
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
  <a class="navbar-brand" href="index.php" title="E-Service"><span class="header">&nbsp;&nbsp; <i class="fas fa-stream"></i> E-SERVICE</span></a>
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
      <a class="nav-link" href="contact-us.php"><i class="fa fa-address-book"></i> Contact Us</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger" href="login.php"><i class="fa fa-user-plus"></i> Account</a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container-fluid"> 
    
      <div class="text1">SIGN IN</div>
      <div><span class="text2"><a href="index.php" class="text-white">HOME</a> / </span><span class="text3 text-danger">SIGN IN</span></div>
  </div>
  <!--====== ABOUT PART START ======-->
    <br><br>
    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                  
                </div>
                <div class="col-lg-4">
  <?=$msg;?>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required style="border-radius: 0px;">
          <div class="input-group-append">
            <div class="input-group-text" style="border-radius: 0px;">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required style="border-radius: 0px;">
          <div class="input-group-append">
            <div class="input-group-text" style="border-radius: 0px;">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        Not registered yet?<a href="register.php"> Register now</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div> 
</div>
  <div class="col-lg-4">
                  
                </div>
</div>
<br>
            <div class="card text-center pt-2 pb-2"><?php echo date("Y")?> &copy; All rights Reserved</div>
</div>
</section>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
