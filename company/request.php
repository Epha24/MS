<?php

session_start();
include '../security.php';
include 'user.php';
include'../conn.php';
$msg = "";
$error = 0;
$title = "Requests";
$cur = "request";
if($_SESSION['role'] != 'company'){
    header("Location:../logout.php");
}

?>
<!DOCTYPE html>
<?php include 'includes/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php 
		  
      if(isset($_GET['student-resume'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Manage Student </a> / <a href="#" style="cursor: unset;">Student Resume</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Update Student Resume</h3>
              <a href="student.php?student-resume" class="float-sm-right" title="Add Student"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Student Name</th>
                  <th>Department</th>
				  <th>Program</th>
				  <th>Graduation Year</th>	
                  <th>Phone</th>
                  <th>Action</th>                 
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT student.student_id, student.fname, student.mname, student.lname, student.age, student.sex, student.program, student.modality, student.department, student.g_year, resume.resume_id, resume.stud_id, resume.email, resume.phone, resume.primary_edu, resume.sec_edu, resume.college, resume.certificate, resume.skills FROM student JOIN resume ON student.student_id = resume.stud_id";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['fname']." ".$row['mname']; ?></td>
                  <td><?php echo $row['department']; ?></td>
                  <td style="text-transform:capitalize;"><?php echo $row['program']; ?></td>
				  <td><?php echo $row['g_year']; ?></td>
				  <td><?php echo $row['phone']; ?></td>
                  <td>&nbsp;&nbsp;&nbsp; <a href="student.php?view-resume-detail=<?php echo $row['resume_id']; ?>"><i class="fa fa-eye" style="color: red;" title="View Resume Detail"></i></a></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Student Name</th>
                  <th>Department</th>
				  <th>Program</th>
				  <th>Graduation Year</th>	
                  <th>Phone</th>
                  <th>Action</th> 
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
      <?php }

if(isset($_GET['view-resume-detail'])){ 
	$id = $_GET['view-resume-detail']; ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Manage Student </a> / <a href="#" style="cursor: unset;">Student Resume Detail</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
			<?php $qry1 = mysqli_query($conn, "SELECT student.student_id, student.fname, student.mname, student.lname, student.age, student.sex, student.e_status, student.e_organization, student.e_address, resume.resume_id, resume.stud_id, resume.email, resume.phone, resume.primary_edu, resume.sec_edu, resume.college, resume.certificate, resume.skills, resume.doc FROM student JOIN resume ON student.student_id = resume.stud_id AND resume_id = '$id'");
			
	while($row = mysqli_fetch_array($qry1)){ ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Personal Detail</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					<i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Full Name :<?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></span><br>
                  <i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Email : <?php echo $row['email']; ?></span><br>
                  <i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Phone : <?php echo $row['phone']; ?></span><br>
                  <i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Age : <?php echo $row['age']; ?></span><br>
                  <i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Gender :<?php echo $row['sex']; ?></span><br>
              </div>
			</div>
			<div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Education Detail</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					<i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Primary Education :<?php echo $row['primary_edu']; ?></span>
                  <i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Secondary Education : <?php echo $row['sec_edu']; ?></span>
                  <i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Higher Education : <?php echo $row['college']; ?></span>
                  <i class="fa fa-check"></i><span class="text-info">&nbsp;&nbsp; Certificate : <?php echo $row['certificate']; ?></span>
              </div>
			</div>
			<div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Skills</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
				  <span class="text-info">&nbsp;&nbsp;<?php echo $row['skills']; ?></span>
              </div>
			</div>
      <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Document (PDF)</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
          <span class="text-info">&nbsp;&nbsp; <a href="../student/docs/<?php echo $row['doc']; ?>" target="_blank"><?php echo $row['doc']; ?></a></span>
              </div>
      </div>
		  <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Employement Status</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
					&nbsp;&nbsp;<strong>Employement Status</strong> :<span class="text-info"> <?php echo $row['e_status']; ?></span><br>
              </div>
			</div>
			<?php } ?>
        </div>
      <?php }  ?>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'includes/footer.php'; ?>
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
	
 function change_program(){
     var xmlhttp = new XMLHttpRequest();
     var program = document.getElementById("program").value;
     xmlhttp.open("GET","select.php?program="+program,false);     
     xmlhttp.send(null);
     document.getElementById("dep").innerHTML = xmlhttp.responseText;
}	
	
</script>