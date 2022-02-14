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
	$id= $_POST['id'];
  $query="UPDATE users  SET
			fname = '$fname',
			lname = '$lname', 
			email = '$email', 
			mobile = '$mobile',
			address = '$address',
			username = '$username'
			WHERE id = $id";
  $result=mysqli_query($con,$query);
  if ($result) {
	  $_SESSION['msg'] = "Profile updated Successfully!!!";
    header('Location:edit_profile.php');
	exit;
}else{
	printf("Error: %s\n", mysqli_error($con));
    exit();
}
  mysqli_close($con);	
}
?>