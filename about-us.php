<!DOCTYPE html>
<html>
<head>
  <title>About Us | E-Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/icon" href="pic/3.jpg">
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
      <a class="nav-link text-danger" href="about-us.php"><i class="fa fa-users"></i> About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact-us.php"><i class="fa fa-address-book"></i> Contact Us</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="login.php"><span class="text-secondary"><i class="fa fa-user-plus"></i> Account</span></a>
      </li>
    </ul>
  </div>
</nav>
	<div class="container-fluid"> 
		
      <div class="text1">ABOUT US</div>
      <div><span class="text2"><a href="index.php" class="text-white">HOME</a> / </span><span class="text3 text-danger">ABOUT US</span></div>
	</div>
  <!--====== ABOUT PART START ======-->
    <br><br>
    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mt-50">
                        <center><h3>E-Service</h3></center><hr>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p align="justify">Welcome to E-Service, your premier destination for comprehensive multi-service solutions online. We are committed to providing top-notch services that cater to all your needs, whether personal or professional. Our platform brings together a wide range of services under one roof, ensuring convenience, efficiency, and quality.</p>
                    </div>
                </div> <!-- about cont --> 
            </div> <!-- row -->
            <h4>Our Mission</h4>
            <p align="justify">our mission is to simplify your life by offering diverse, high-quality services that are easily accessible. We strive to be your go-to hub for all your requirements, delivering excellence through innovation, reliability, and customer-centric solutions. </p>
            <h4>Our Vision</h4>
            <p align="justify">Our vision is to revolutionize the way you access services, making it seamless and hassle-free. We aim to become a trusted partner in your daily life, providing solutions that save you time and enhance your quality of life. </p>
            <br>
            <div class="card text-center pt-2 pb-2"><?php echo date("Y")?> &copy; All rights Reserved</div>
        </div> <!-- container -->

    </section>
    
    <!--====== ABOUT PART ENDS ======-->
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