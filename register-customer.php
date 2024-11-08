 <?php
    include'conn.php';
    $msg = "";
    session_start();

    if(isset($_POST['register'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confpassword = $_POST['confpassword'];
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      
    
      $sql = "SELECT *FROM users WHERE username = '".$username."'";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);

    if($num > 0){ 

        $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Username already exists</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
      }else{           
      if($password != $confpassword){
      
      $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Password do not match!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";

  }else{
    $password = md5($password);

    $q = mysqli_query($conn, "INSERT INTO users(username, password, fname, mname, lname, address, email, phone, role) VALUES('$username', '$password', '$fname', '$mname', '$lname', '$address', '$email', '$phone', 'customer')");
     if($q){
      $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Account created successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
     }else{
        $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Ooops!! Something went wrong</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
     }
  }
}
}


   ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register | E-Service</title>
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
    
      <div class="text1">REGISTER</div>
      <div><span class="text2"><a href="index.php" class="text-white">HOME</a> / </span><span class="text3 text-danger">REGISTER</span></div>
  </div>
  <!--====== ABOUT PART START ======-->
    <br><br>
    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                  
                </div>
                <div class="col-lg-6">
                  <div class="card">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="card-body" style="border-right : 1px solid black;">
                        <a href="register-customer.php" class="nav-link text-danger"><i class="fa fa-user-plus"></i> Customer</a>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card-body">
                        <a href="register.php" class="nav-link text-dark"><i class="fa fa-home"></i> Service Provider</a>
                      </div>
                    </div>
                  </div>
                  </div>
  <?=$msg;?>
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg"><i class="fa fa-user-plus"></i> Register</p>
      <hr>

      <form action="register-customer.php" method="post">
        <div class="form-row">
          <div class="form-group col-sm-6">
            <label>First Name</label>
              <input type="text" name="fname" class="form-control" placeholder="First name" required>
          </div>
          <div class="form-group col-sm-6">
          <label>Middle Name</label>
              <input type="text" name="mname" class="form-control" placeholder="Middle Name" required>
          </div>
          <div class="form-group col-sm-6">
            <label>Last Name</label>
              <input type="text" name="lname" class="form-control" placeholder="Last name" required>
          </div>
          <div class="form-group col-sm-6">
          <label>Phone</label>
              <input type="text" name="phone" class="form-control" placeholder="Phone number" required>
          </div>
          <div class="form-group col-sm-6">
          <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email Address" required>
          </div>
          <div class="form-group col-sm-6">
          <label>Address</label>
              <input type="text" name="address" class="form-control" placeholder="Address" required>
          </div>
          <div class="form-group col-sm-6">
          <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username" required>
          </div>
          <div class="form-group col-sm-6">
          <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-group col-sm-6">
          <label>Confirm Password</label>
              <input type="password" name="confpassword" class="form-control" placeholder="Confirm password" required>
          </div>
      </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="register" class="btn btn-primary btn-block">Save</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        Already have account?<a href="login.php"> Sign In</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div> 
</div>
  <div class="col-lg-3">
                  
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
