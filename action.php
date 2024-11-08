<?php 
include 'conn.php';
session_start();

if(isset($_GET['delete-account'])){
	$id = $_GET['delete-account'];
	mysqli_query($conn, "DELETE FROM users WHERE username = '$id'");
	header('Location:admin/account.php?update_account=delete-success');

}

if(isset($_GET['cancel-food'])){
	$id = $_GET['cancel-food'];
	mysqli_query($conn, "DELETE FROM food_res WHERE resid = '$id'");
	header('Location:customer/booked.php?food=success-cancel');

} 

if(isset($_GET['cancel-cinema'])){
	$id = $_GET['cancel-cinema'];
	mysqli_query($conn, "DELETE FROM cinema_res WHERE resid = '$id'");
	header('Location:customer/booked.php?cinema=success-cancel');

} 

if(isset($_GET['cancel-room'])){
	$id = $_GET['cancel-room'];
	mysqli_query($conn, "DELETE FROM room_res WHERE resid = '$id'");
	header('Location:customer/booked.php?room=success-cancel');

} 
if(isset($_GET['cancel-tour'])){
	$id = $_GET['cancel-tour'];
	mysqli_query($conn, "DELETE FROM tour_res WHERE resid = '$id'");
	header('Location:customer/booked.php?tour=success-cancel');

} 

if(isset($_GET['cancel-car'])){
	$id = $_GET['cancel-car'];
	mysqli_query($conn, "DELETE FROM car_res WHERE resid = '$id'");
	header('Location:customer/booked.php?car=success-cancel');

}

if(isset($_GET['cancel-plane'])){
	$id = $_GET['cancel-plane'];
	mysqli_query($conn, "DELETE FROM plane_res WHERE resid = '$id'");
	header('Location:customer/booked.php?plane=success-cancel');

}  

if(isset($_GET['delete-vacancy-admin'])){
	$id = $_GET['delete-vacancy-admin'];
	mysqli_query($conn, "DELETE FROM job WHERE job_id = '$id'");
	mysqli_query($conn, "DELETE FROM applications WHERE job_id = '$id'");
	header('Location:admin/jobs.php?jobs=success');

} 

if(isset($_GET['delete-department'])){
	$id = $_GET['delete-department'];
	mysqli_query($conn, "DELETE FROM department WHERE department_id = '$id'");
	header('Location:admin/categories.php?update-category=delete-success');

}

if(isset($_GET['delete-service-request'])){
	$id = $_GET['delete-service-request'];
	mysqli_query($conn, "DELETE FROM service WHERE sid = '$id'");
	header('Location:company/services.php?update-service=delete-success');

}

if(isset($_GET['approve'])){
	
	$status = 'Approved';
	$id = $_GET['approve'];
	$qry_update = "UPDATE service SET status = '$status' WHERE sid = '$id'";
			$extup = mysqli_query($conn,$qry_update);
			header('Location:admin/jobs.php?jobs=success');

}

?>