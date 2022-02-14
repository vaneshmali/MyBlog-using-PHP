<?php
session_start();
// change password process
if(isset($_POST['submit'])){
	include('connection.php'); // database connection
	$old_pass=md5($_POST['old_pass']);
	$new_pass=md5($_POST['new_pass']);
	$my_id= $_SESSION['user_id'];
	$query= "SELECT id FROM users WHERE id=$my_id AND pass='$old_pass'";
	//echo $query;exit;
	$result=mysqli_query($con,$query);
	$result=mysqli_num_rows($result);
	//echo $result;exit;
  if (!$result) {
	   $_SESSION['msg'] = "Old password entered wrong, please try again!!!";
	  header('Location:change_password.php');
  }else{	
  $query="UPDATE users  SET
			pass = '$new_pass'
			WHERE id =$my_id";
  $result=mysqli_query($con,$query);
  if ($result) {
	 $_SESSION['msg'] = "Password changed successfully!!!";
	  header('Location:change_password.php');
}else{
	printf("Error: %s\n", mysqli_error($con));
    exit();
}
  }
  mysqli_close($con);	
}
?>