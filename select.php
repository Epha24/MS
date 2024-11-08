<?php

include 'conn.php';

if(isset($_GET['hotel'])){

	$dep = $_GET['hotel'];
  $sid = $_GET['sid'];
	if($dep == 'Room'){
		echo "<div class='card card-default'><div class='card-header'>Add Room Detail</div><div class='card-body'><form action='services.php?update-service' method='POST'><div class='form-row'><div class='form-group col-sm-6'><lable>Room No</label><input type='number' name='rno' class='form-control' required></div><div class='form-group col-sm-6'><lable>Room Type</label><select class='form-control' name='rtype'><option>Single Room</option><option>Double Room</option><option>Twin Room</option></select></div><div class='form-group col-sm-6'><lable>Price</label><input type='text' name='price' class='form-control' required></div></div><input type='hidden' value='".$sid."' name='sid'><input type='submit' class='btn btn-danger' name='save_room' value='Save'></form></div></div>";
	} if($dep == 'Food'){
		echo "<div class='card card-default'><div class='card-header'>Add Food Detail</div><div class='card-body'><form action='services.php?update-service' method='POST'><div class='form-row'><div class='form-group col-sm-6'><lable>Name</label><input type='text' name='fname' class='form-control' required></div><div class='form-group col-sm-6'><lable>Price</label><input type='text' name='fprice' class='form-control' required></div></div><input type='hidden' value='".$_GET['sid']."' name='sid'><input type='submit' class='btn btn-danger' name='save_food' value='Save'></form></div></div>";
	} 
}

if(isset($_GET['addedhotels'])){

	$dep = $_GET['addedhotels'];
	if($dep == 'Room'){
		$qry_sel = mysqli_query($conn, "SELECT *FROM room"); ?>
		<div class='card card-default'><div class='card-header'>Added Rooms </div><div class='card-body'>
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Room No</th>
                  <th>Room Type</th> 
                  <th>Price</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;

                   $qry = "SELECT *FROM room";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['rno']; ?></td>
                  <td><?php echo $row['rtype']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Room No</th>
                  <th>Room Type</th> 
                  <th>Price</th> 
                </tr>
                </tfoot>
              </table>
           </div></div>
	<?php } if($dep == 'Food'){
		$qry_sel = mysqli_query($conn, "SELECT *FROM food"); ?>
		<div class='card card-default'><div class='card-header'>Added Foods </div><div class='card-body'>
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Food Name</th>
                  <th>Price</th>                
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;

                   $qry = "SELECT *FROM food";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['fprice']; ?></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Food Name</th> 
                  <th>Price</th> 
                </tr>
                </tfoot>
              </table>
           </div></div>
	<?php } 
}

if(isset($_GET['addedtransport'])){

	$dep = $_GET['addedtransport'];
	if($dep == 'Plane'){
		$qry_sel = mysqli_query($conn, "SELECT *FROM plane"); ?>
		<div class='card card-default'><div class='card-header'>Added Flights </div><div class='card-body'>
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tail No</th>
                  <th>Model</th> 
                  <th>Total Seat No</th>     
                  <th>From</th> 
                  <th>To</th> 
                  <th>Date</th>  
                  <th>Time</th>      
                  <th>Price</th>  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;

                   $qry = "SELECT *FROM plane";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['tno']; ?></td>
                  <td><?php echo $row['model']; ?></td>
                  <td><?php echo $row['tsno']; ?></td>
                  <td><?php echo $row['from_s']; ?></td>
                  <td><?php echo $row['to_s']; ?></td>
                  <td><?php echo $row['fdate']; ?></td>
                  <td><?php echo $row['ftime']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tail No</th>
                  <th>Model</th> 
                  <th>Total Seat No</th>     
                  <th>From</th> 
                  <th>To</th> 
                  <th>Date</th>  
                  <th>Time</th> 
                  <th>Price</th> 
                </tr>
                </tfoot>
              </table>
           </div></div>
	<?php } if($dep == 'Car'){
		$qry_sel = mysqli_query($conn, "SELECT *FROM car"); ?>
		<div class='card card-default'><div class='card-header'>Added Car Flights </div><div class='card-body'>
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tail No</th>
                  <th>Level</th> 
                  <th>Total Seat No</th>     
                  <th>From</th> 
                  <th>To</th> 
                  <th>Date</th>  
                  <th>Time</th>      
                  <th>Price</th>  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;

                   $qry = "SELECT *FROM plane";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['tno']; ?></td>
                  <td><?php echo $row['model']; ?></td>
                  <td><?php echo $row['tsno']; ?></td>
                  <td><?php echo $row['from_s']; ?></td>
                  <td><?php echo $row['to_s']; ?></td>
                  <td><?php echo $row['fdate']; ?></td>
                  <td><?php echo $row['ftime']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tail No</th>
                  <th>Level</th> 
                  <th>Total Seat No</th>     
                  <th>From</th> 
                  <th>To</th> 
                  <th>Date</th>  
                  <th>Time</th> 
                  <th>Price</th> 
                </tr>
                </tfoot>
              </table>
           </div></div>
	<?php } 
}

if(isset($_GET['transport'])){

	$dep = $_GET['transport'];
  $sid = $_GET['sid'];
	if($dep == 'Plane'){
		echo "<div class='card card-default'><div class='card-header'>Add Plane Transport Detail</div><div class='card-body'><form action='services.php?update-service' method='POST'><div class='form-row'><div class='form-group col-sm-6'><lable>Tail No</label><input type='number' name='tno' class='form-control' required></div><div class='form-group col-sm-6'><lable>Model</label><select class='form-control' name='model'><option>Airbus A321XLR:</option><option>Boeing 737 MAX 10</option><option>Boeing 777</option></select></div><div class='form-group col-sm-6'><lable>Total No of Seat</label><input type='number' name='tsno' class='form-control' required></div><div class='form-group col-sm-6'><lable>From</label><input type='text' name='from' class='form-control' required></div><div class='form-group col-sm-6'><lable>To</label><input type='text' name='to' class='form-control' required></div><div class='form-group col-sm-6'><lable>Date</label><input type='date' name='date' class='form-control' required></div><div class='form-group col-sm-6'><lable>Time</label><input type='time' name='time' class='form-control' required></div><div class='form-group col-sm-6'><lable>Price(Full Package)</label><input type='text' name='price' class='form-control' required></div></div><input type='hidden' value='".$_GET['sid']."' name='sid'><input type='submit' class='btn btn-danger' name='save_plane' value='Save'></form></div></div>";
	} if($dep == 'Car'){
		echo "<div class='card card-default'><div class='card-header'>Add Car Transport Detail</div><div class='card-body'><form action='services.php?update-service' method='POST'><div class='form-row'><div class='form-group col-sm-6'><lable>Tail No</label><input type='number' name='tno' class='form-control' required></div><div class='form-group col-sm-6'><lable>Level</label><select class='form-control' name='level'><option>Level I</option><option>Level II</option><option>Level III</option></select></div><div class='form-group col-sm-6'><lable>Total No of Seat</label><input type='number' name='tsno' class='form-control' required></div><div class='form-group col-sm-6'><lable>From</label><input type='name' name='from' class='form-control' required></div><div class='form-group col-sm-6'><lable>To</label><input type='text' name='to' class='form-control' required></div><div class='form-group col-sm-6'><lable>Date</label><input type='date' name='date' class='form-control' required></div><div class='form-group col-sm-6'><lable>Time</label><input type='time' name='time' class='form-control' required></div><div class='form-group col-sm-6'><lable>Price</label><input type='text' name='price' class='form-control' required></div></div><input type='hidden' value='".$_GET['sid']."' name='sid'><input type='submit' class='btn btn-danger' name='save_car' value='Save'></form></div></div>";
	} 
}

?>