<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?> | E-Service</title>
  <link rel="icon" type="image/icon" href="../pic/3.jpg">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <style>
   .card, .mn{
      border-radius: 0px;
    }
    .active{
      border-radius: 0px;
      background-color: #00151A;
      border-left: 2px solid orange;
    }
    #act{
      border-radius: 0px;
      background-color: #00151A;
    }
    #bg{
      background:url(../img/bg2.jpg);
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
         height: 150px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="dropdown user user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="../pic/user.png" class="user-image" alt="User Image"></a>
          <ul class="dropdown-menu">
            <li class="user-header bg-info">
              <img src="../pic/user.png" class="img-circle" alt="User Image">
              <p><span id="user"><?php echo user(); ?></span> - Admin</p>
            </li>
            <li class="user-body">
              <div class="row">
                <div class="pull-left">
                <a href="chpassword.php" class="btn btn-default btn-flat">Change Password</a>
              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="pull-right"> 
                <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
              </div>
              </div>
            </li>
          </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" title="">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="brand-text font-weight-light"><i class="fa fa-stream"></i> E-Service</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?php if($cur == "index"){ echo 'active'; } ?>">
            <a href="index.php" class="nav-link" <?php if($cur == 'index'){ echo 'id="act"'; } ?>>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($cur == "profile"){ echo 'active'; } ?>">
            <a href="profile.php" class="nav-link" <?php if($cur == 'profile'){ echo 'id="act"'; } ?>>
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($cur == "feedback"){ echo 'active'; } ?>">
            <a href="feedback.php?view-feedback" class="nav-link" <?php if($cur == 'feedback'){ echo 'id="act"'; } ?>>
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Feedbacks
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($cur == "categories"){ echo 'active'; } ?>">
            <a href="categories.php?add-category" class="nav-link" <?php if($cur == 'categories'){ echo 'id="act"'; } ?>>
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($cur == "jobs"){ echo 'active'; } ?>">
            <a href="jobs.php?jobs" class="nav-link" <?php if($cur == 'jobs'){ echo 'id="act"'; } ?>>
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Service Requests
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($cur == 'account'){ echo 'active'; } ?>">
            <a href="#" class="nav-link" <?php if($cur == 'account'){ echo 'id="act"'; } ?>>
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Manage Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="account.php?create_account" class="nav-link">
                  &nbsp;&nbsp;
                  <i class="nav-icon fa fa-plus"></i>
                  <p>Create Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="account.php?update_account" class="nav-link">
                  &nbsp;&nbsp;
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Update Account</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>