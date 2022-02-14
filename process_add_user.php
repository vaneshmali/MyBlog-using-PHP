<?php
session_start();

if(isset($_POST['submit'])){
	include('connection.php'); // database connection
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$pass=md5($_POST['pass']);
	$role=1;
  $query="INSERT INTO users ( fname, lname, email, mobile, address, username, pass, role )
                       VALUES
                       ( '$fname', '$lname', '$email', '$mobile', '$address', '$username', '$pass', $role )";
  $result=mysqli_query($con,$query);
  if ($result) {
	  $_SESSION['msg'] = "User added Successfully!!!";
    header('Location:all_users.php');
	exit;
}else{
	printf("Error: %s\n", mysqli_error($con));
    exit();
}
  mysqli_close($con);	
}
?>