<?php 
function user(){

$conn = mysqli_connect("localhost", "root","","multi_service");

$select = "SELECT *FROM users WHERE username = '".$_SESSION['user_name']."'";
$ext = mysqli_query($conn, $select);

while($row = mysqli_fetch_array($ext)){
	return ($row['fname']." ".$row['mname']);

}
}

?>