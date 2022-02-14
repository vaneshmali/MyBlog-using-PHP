<?php
session_start();
	if(!isset($_SESSION['is_login'])){
		header('Location:login.php');
	}else{
		if($_SESSION['role'] != 0){ // i am not admin, so i can not access admin page
				header('Location:my_posts.php'); // redirecting to see only my posts
				exit;
			}
	}

include('connection.php'); //database connection

	// Delete Post
	if(isset($_GET['delete_id'])){
		$delete_id=$_GET['delete_id'];
		 $query="DELETE FROM users WHERE id = $delete_id";
	  $result=mysqli_query($con,$query);
	  if($result){
		  $_SESSION['msg'] = "User deleted successfully";
		  header('Location:all_users.php');
		  exit;
	  }
	}

  // fetch all users
  $my_id=$_SESSION['user_id'];
  $query="SELECT * FROM users WHERE id !=$my_id";
  $result=mysqli_query($con,$query);
  $all_users=mysqli_fetch_all($result,MYSQLI_ASSOC);
		
?>
<html>
<head>
	<title>All Users | My Blog</title>
	<?php include('menu_bar.php'); ?>
<?php 
// Print msg
if(isset($_SESSION['msg'])){
	echo "<br/><b><i>".$_SESSION['msg'] . "</i></b>";
	unset($_SESSION['msg']);
}
?>
<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
</style>
<table style="width:100%; margin-top:10px;">
<caption><strong>All Users </strong></caption>
<tr>
<th style="width:10%;">First Name</th>
	<th style="width:10%;">Last Name</th>
	<th style="width:10%;">Email</th>
	<th style="width:10%;">Mobile</th>
	<th style="width:20%;">Address</th>
	<th style="width:10%;">Username</th>
	<th style="width:10%;">Action</th>
</tr>
<?php 
		foreach($all_users as $user){
		?>
<tr>
<td><?php echo $user['fname']; ?></td>
<td><?php echo $user['lname']; ?></td>
<td><?php echo $user['email']; ?></td>
<td><?php echo $user['mobile']; ?></td>
<td><?php echo $user['address']; ?></td>
<td><?php echo $user['username']; ?></td>
<td>
	<a href="edit_user.php?id=<?php echo $user['id'];  ?>">Edit</a> &nbsp;
	<a href="all_users.php?delete_id=<?php echo $user['id'];  ?>">Delete</a>
</td>
</tr>
		<?php } ?>
</table>

</body>
</html>