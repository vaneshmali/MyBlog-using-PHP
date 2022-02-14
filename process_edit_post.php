<?php
session_start();

if(isset($_POST['submit'])){
	include('connection.php'); // database connection
	$title=$_POST['title'];
	$content=$_POST['content'];
	$id= $_POST['id'];
	if($_SESSION['role'] == 1){ // i am user, approval required
		$approved = 0;
	} else { // i am admin, approval not required
		$approved = 1;
	}

  $query="UPDATE posts  SET
			title = '$title',
			content = '$content',
			approved = $approved
			WHERE id = $id";
  $result=mysqli_query($con,$query);
  if ($result) {
	  $_SESSION['msg'] = "Post updated Successfully!!!";
    header('Location:all_posts.php');
	exit;
}else{
	printf("Error: %s\n", mysqli_error($con));
    exit();
}
  mysqli_close($con);	
}
?>