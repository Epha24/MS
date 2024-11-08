<?php
include'conn.php';
$msg = "";
$deadline = "";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home | E-Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/icon" href="pic/logo.jpg">
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
     letter-spacing: 0.1rem;
     margin-top: 5%;
     margin-left: 7%;
     color:white;
     text-transform: uppercase;

    }
    .text2{
     font-family: fantasy;
     font-weight: 400;
     margin-top: 5%;
     margin-left: 7%;
     color:white;
     font-size: 20px;
     letter-spacing: 0.2rem;
    }
    .container-fluid{
         background:url(pic/service.jpg);
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
         height: 560px;
       }

       .nav-item a{
        font-size: 19px;
        }
       .fa{
        font-size: 17px;
       }
       .inner-c {
        padding-bottom: 30px;
        padding-top: 120px;
        height: 560px;
        width: 100%;
       }
       .link {
        margin-left : 7%;
        display: flex;
       }
       .link a{
        text-decoration: none;
       }
       .li {
        padding : 8px 15px 8px 15px;
        border-radius: 0px;
        background-color: black;
        color: white;
        font-size: 17px;
        font-family: sans-serif;
       }
       .link a:hover .li{
        background-color: orange;
        color: black;
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
      <a class="nav-link text-danger" href="index.php"><i class="fa fa-home"></i> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about-us.php"><i class="fa fa-users"></i> About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact-us.php"><i class="fa fa-address-book"></i> Contact Us</a>
    </li>
  </ul>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="login.php"><span class="text-secondary"><i class="fa fa-user-plus"></i> Account</span></a>
      </li>

    </ul>
  </div>
</nav>
  <div class="container-fluid"> 
    <div class="inner-c">
      <div class="text1">We feel the joy of Serving you the Best. <br>We connect service providers and customers</div>
      <div class="link"><a href="about-us.php" class="link-us"><div class="li">MORE ABOUT US <i class="fa fa-angle-double-right"></i></div></a></div>

    </div>
  </div>
  <br><br>
  <!--====== CONTACT PART START ======-->
    
    <section id="contact-page" class="pt-90 pb-120">
        <div class="container">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <form action="index.php" method="GET">
          <span class="input-group-text" id="inputGroup-sizing-default" >Search</span> 
        </div>
        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="search_ca"></form>
      </div> <?php if(!isset($_GET['search_ca'])) { ?>
                    <center><h4 style="font-weight: 700;">ROOMS</h4><hr style="width: 100px;"></center>
                    <div class="row">
                      <?php $qry_sel = mysqli_query($conn, "SELECT room.rid, room.rtype, room.price, room.sid, service.sid, service.oname, service.location FROM room JOIN service ON room.sid = service.sid");
                      while($row_st = mysqli_fetch_array($qry_sel)){ ?>
                     <div class="col-sm-4">
                     <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><span class="text-danger">Organization :</span> <?=$row_st['oname']?></p>
                        <p class="card-text"><span class="text-danger">Room Type :</span> <?=$row_st['rtype']?></p>
                        <p class="card-text"><span class="text-danger">Price :</span> <?=$row_st['price']?></p>
                        <p class="card-text"><span class="text-danger">Location :</span> <?=$row_st['location']?></p>
                        <a href="login.php" class="btn btn-info" title="Add to Cart">Book</a>
                      </div>
                    </div>
                  </div>
                      <?php }
                   ?>
                 </div>
                 <hr>
                 <center><h4 style="font-weight: 700;">FOODS</h4><hr style="width: 100px;"></center>
                    <div class="row">
                      <?php $qry_sel = mysqli_query($conn, "SELECT food.fid, food.fname, food.fprice, food.sid, service.sid, service.oname, service.location FROM food JOIN service ON food.sid = service.sid");
                      while($row_st = mysqli_fetch_array($qry_sel)){ ?>
                     <div class="col-sm-4">
                     <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><span class="text-danger">Organization :</span> <?=$row_st['oname']?></p>
                        <p class="card-text"><span class="text-danger">Food Name :</span> <?=$row_st['fname']?></p>
                        <p class="card-text"><span class="text-danger">Price :</span> <?=$row_st['fprice']?></p>
                        <p class="card-text"><span class="text-danger">Location :</span> <?=$row_st['location']?></p>
                        <a href="login.php" class="btn btn-info" title="Add to Cart">Book</a>
                      </div>
                    </div>
                  </div>
                      <?php }
                   ?>
                 </div>
                 <hr>
                 <center><h4 style="font-weight: 700;">CINEMA</h4><hr style="width: 100px;"></center>
                    <div class="row">
                      <?php $qry_sel = mysqli_query($conn, "SELECT cinema.cid, cinema.mtitle, cinema.wdate, cinema.wtime, cinema.price, service.sid, service.oname, service.location FROM cinema JOIN service ON cinema.cid = service.sid");
                      while($row_st = mysqli_fetch_array($qry_sel)){ ?>
                     <div class="col-sm-4">
                     <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><span class="text-danger">Organization :</span> <?=$row_st['oname']?></p>
                        <p class="card-text"><span class="text-danger">Movie Title :</span> <?=$row_st['mtitle']?></p>
                        <p class="card-text"><span class="text-danger">Price :</span> <?=$row_st['price']?></p>
                        <p class="card-text"><span class="text-danger">Location :</span> <?=$row_st['location']?></p>
                        <a href="login.php" class="btn btn-info" title="Add to Cart">Book</a>
                      </div>
                    </div>
                  </div>
                      <?php }
                   ?>
                 </div> <?php } else{ ?> 

                  <?php if($_GET['search_ca'] == 'room' || $_GET['search_ca'] == 'Room' ){ ?>

                    <center><h4 style="font-weight: 700;">ROOMS</h4><hr style="width: 100px;"></center>
                    <div class="row">
                      <?php $qry_sel = mysqli_query($conn, "SELECT room.rid, room.rtype, room.price, room.sid, service.sid, service.oname, service.location FROM room JOIN service ON room.sid = service.sid");
                      while($row_st = mysqli_fetch_array($qry_sel)){ ?>
                     <div class="col-sm-4">
                     <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><span class="text-danger">Organization :</span> <?=$row_st['oname']?></p>
                        <p class="card-text"><span class="text-danger">Room Type :</span> <?=$row_st['rtype']?></p>
                        <p class="card-text"><span class="text-danger">Price :</span> <?=$row_st['price']?></p>
                        <p class="card-text"><span class="text-danger">Location :</span> <?=$row_st['location']?></p>
                        <a href="login.php" class="btn btn-info" title="Add to Cart">Book</a>
                      </div>
                    </div>
                  </div>
                      <?php }
                   ?>
                 </div>

                  <?php } if($_GET['search_ca'] == 'food' || $_GET['search_ca'] == 'Food' ) { ?>
                    <center><h4 style="font-weight: 700;">FOODS</h4><hr style="width: 100px;"></center>
                    <div class="row">
                      <?php $qry_sel = mysqli_query($conn, "SELECT food.fid, food.fname, food.fprice, food.sid, service.sid, service.oname, service.location FROM food JOIN service ON food.sid = service.sid");
                      while($row_st = mysqli_fetch_array($qry_sel)){ ?>
                     <div class="col-sm-4">
                     <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><span class="text-danger">Organization :</span> <?=$row_st['oname']?></p>
                        <p class="card-text"><span class="text-danger">Food Name :</span> <?=$row_st['fname']?></p>
                        <p class="card-text"><span class="text-danger">Price :</span> <?=$row_st['fprice']?></p>
                        <p class="card-text"><span class="text-danger">Location :</span> <?=$row_st['location']?></p>
                        <a href="login.php" class="btn btn-info" title="Add to Cart">Book</a>
                      </div>
                    </div>
                  </div>
                      <?php }
                   ?>
                 </div>
                  <?php } if($_GET['search_ca'] == 'cinema' || $_GET['search_ca'] == 'Cinema' ) { ?>
                      <center><h4 style="font-weight: 700;">CINEMA</h4><hr style="width: 100px;"></center>
                    <div class="row">
                      <?php $qry_sel = mysqli_query($conn, "SELECT cinema.cid, cinema.mtitle, cinema.wdate, cinema.wtime, cinema.price, service.sid, service.oname, service.location FROM cinema JOIN service ON cinema.cid = service.sid");
                      while($row_st = mysqli_fetch_array($qry_sel)){ ?>
                     <div class="col-sm-4">
                     <div class="card">
                      <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><span class="text-danger">Organization :</span> <?=$row_st['oname']?></p>
                        <p class="card-text"><span class="text-danger">Movie Title :</span> <?=$row_st['mtitle']?></p>
                        <p class="card-text"><span class="text-danger">Price :</span> <?=$row_st['price']?></p>
                        <p class="card-text"><span class="text-danger">Location :</span> <?=$row_st['location']?></p>
                        <a href="login.php" class="btn btn-info" title="Add to Cart">Book</a>
                      </div>
                    </div>
                  </div>
                      <?php }
                   ?>
                 </div>
                  <?php } ?>



                 <?php } ?>
                  </div>
            </div> <!-- row -->
            <br>
            </div>
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

  function filter_job(){
    //alert("Hi");
     var xmlhttp = new XMLHttpRequest();
     var emp_status = document.getElementById("emp_status").value;
     var emp_position = document.getElementById("emp_position").value;
     var acc_status = document.getElementById("acc_status").value;
     var dep = document.getElementById("department").value;
     var location = document.getElementById("location").value;
     xmlhttp.open("GET","select.php?emp_status="+emp_status+"&emp_position="+emp_position+"&acc_status="+acc_status+"&dep="+dep+"&location="+location,false);   
     xmlhttp.send(null);
     document.getElementById("job").innerHTML = xmlhttp.responseText;
}

function search_job(){
     var xmlhttp = new XMLHttpRequest();
     var search = document.getElementById("search_me").value;
     xmlhttp.open("GET","select.php?search="+search,false);   
     xmlhttp.send(null);
     document.getElementById("job").innerHTML = xmlhttp.responseText;
}
</script>