<?php
session_start();
if(!isset($_SESSION['is_login'])){ // if no login
	header('Location:login.php');
	exit;
}else{
	if($_SESSION['role'] != 1){ // I am not user, i am admin
		header('Location:all_posts.php');
		exit;
	}
}
$my_id= $_SESSION['user_id'];
include('connection.php'); //database connection

	// Delete Post
	if(isset($_GET['delete_id'])){
		$delete_id=$_GET['delete_id'];
		 $query="DELETE FROM posts WHERE id = $delete_id";
	  $result=mysqli_query($con,$query);
	  if($result){
		  $_SESSION['msg'] = "Post deleted successfully";
		  header('Location:my_posts.php');
		  exit;
	  }
	}

  // fetch my posts : recent posts on top
  $query="SELECT * FROM posts WHERE created_by = $my_id  order by created_date DESC";
  $result=mysqli_query($con,$query);
  $all_posts=mysqli_fetch_all($result,MYSQLI_ASSOC);

  
		
?>
<html>
<head>
<title>My Posts | My Blog</title>
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
<caption><strong>My Posts | My Blog</strong></caption>
<tr>
<th style="width:20%;">Title</th>
	<th style="width:40%;">Content</th>
	<th style="width:10%;">Created Date</th>
	<th style="width:10%;">Approved?</th>
	<th style="width:10%;">Action</th>
</tr>
<?php 
		foreach($all_posts as $post){
		?>
<tr>
<td><?php echo $post['title']; ?></td>
<td><?php echo $post['content']; ?></td>
<td><?php echo date('d-M-Y',strtotime($post['created_date'])); ?></td>
<td>
<?php if($post['approved'] == 1){ ?>
		<i style="color:green">Yes</i>
	<?php } else { ?>
		<i style="color:red">Not Yet</i>
	<?php } ?>
	</td>
<td>
	<a href="edit_post.php?id=<?php echo $post['id'];  ?>">Edit</a> &nbsp;
	<a href="all_posts.php?delete_id=<?php echo $post['id'];  ?>">Delete</a>&nbsp;	
</td>
</tr>
		<?php } ?>
</table>

</body>
</html>