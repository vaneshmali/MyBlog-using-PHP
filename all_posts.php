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
		 $query="DELETE FROM posts WHERE id = $delete_id";
	  $result=mysqli_query($con,$query);
	  if($result){
		  $_SESSION['msg'] = "Post deleted successfully";
		  header('Location:all_posts.php');
		  exit;
	  }
	}
	
	// Approve Post
	if(isset($_GET['approve_id'])){
		$approve_id=$_GET['approve_id'];
		 $query="UPDATE posts 
					SET approved = 1
					WHERE id = $approve_id";
	  $result=mysqli_query($con,$query);
	  if($result){
		  $_SESSION['msg'] = "Post approved successfully";
		  header('Location:all_posts.php');
		  exit;
	  }
	}


  // fetch all posts : recent posts on top
  $query="SELECT * FROM posts order by created_date DESC";
  $result=mysqli_query($con,$query);
  $all_posts=mysqli_fetch_all($result,MYSQLI_ASSOC);
  
  // fetch all users : id, fname, lname
  $query="SELECT id, fname, lname FROM users ";
  $result=mysqli_query($con,$query);
  $all_users=mysqli_fetch_all($result,MYSQLI_ASSOC);
  $usernames= array();
  foreach($all_users as $user){
	  $usernames[$user['id']] = $user['fname']. " " . $user['lname'];
  }
  
		
?>
<html>
<head>
<html>
<head>
<title>All Posts | My Blog</title>
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
<caption><strong>All Posts </strong></caption>
<tr>
<th style="width:20%;">Title</th>
	<th style="width:40%;">Content</th>
	<th style="width:10%;">Created By</th>
	<th style="width:10%;">Created Date</th>
	<th style="width:10%;">Action</th>
</tr>
<?php 
		foreach($all_posts as $post){
		?>
<tr>
<td><?php echo $post['title']; ?></td>
<td><?php echo $post['content']; ?></td>
<td><?php echo $usernames[$post['created_by']] ?></td>
<td><?php echo date('d-M-Y',strtotime($post['created_date'])); ?></td>
<td>
	<a href="edit_post.php?id=<?php echo $post['id'];  ?>">Edit</a> &nbsp;
	<a href="all_posts.php?delete_id=<?php echo $post['id'];  ?>">Delete</a>&nbsp;
	<?php if($post['approved'] == 1){ ?>
		<i style="color:green">Approved</i>
	<?php } else { ?>
		<a href="all_posts.php?approve_id=<?php echo $post['id'];  ?>">Approve</a>
	<?php } ?>
	
</td>
</tr>
		<?php } ?>
</table>

</body>
</html>
