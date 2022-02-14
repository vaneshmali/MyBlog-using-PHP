<?php
session_start();
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$pass=md5($_POST['pass']);
	$con=mysqli_connect('localhost','root','','myblog');
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
  }
  $query="SELECT id,username,fname,lname,mobile,role FROM users WHERE username = '$username' and pass = '$pass'";
  $result=mysqli_query($con,$query);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
  $row=mysqli_fetch_assoc($result);
  //to print array
  //print_r($row);exit;
  if(mysqli_num_rows($result) == 1){
	  //successfull login.
	  $_SESSION['is_login']=1;
	  $_SESSION['user_id']=$row['id'];
	  $_SESSION['username']=$row['username'];
	  $_SESSION['fname']=$row['fname'];
	  $_SESSION['lname']=$row['lname'];
	  $_SESSION['mobile']=$row['mobile'];
	  $_SESSION['role']=$row['role'];
	  if($_SESSION['role'] == 0){ // i am admin
			header('Location:all_posts.php');
			exit;
		}else{ // i am user
			header('Location:my_posts.php');
			exit;
		}	 
}else{
	//wrong credentials : wrong username or password\
	$_SESSION['login_failed']=1;
	unset($_SESSION['is_login']);
	header('Location:login.php');
	exit;
}
  mysqli_close($con);		
}
?>