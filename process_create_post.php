<?php
session_start();

if(isset($_POST['submit'])){
	include('connection.php'); // database connection
	$title=$_POST['title'];
	$content=$_POST['content'];
	$created_by=$_SESSION['user_id'];
	$created_date=date('Y-m-d H:i:s');
	if($_SESSION['role'] != 1){ // I am not user, i am admin
		$approved=1;
	}else{
		$approved=0;
	}
  $query="INSERT INTO posts ( title, content, created_by, created_date, approved )
                       VALUES
                       ( '$title', '$content', $created_by, '$created_date', $approved)";
  $result=mysqli_query($con,$query);
  if ($result) {
	  $_SESSION['msg'] = "Post created Successfully!!!";
	  if($_SESSION['role'] != 1){ // I am not user, i am admin
		 header('Location:all_posts.php');
		 exit;
	}else{
		 header('Location:my_posts.php');
		 exit;
	}
   
}else{
	printf("Error: %s\n", mysqli_error($con));
    exit();
}
  mysqli_close($con);	
}
?>