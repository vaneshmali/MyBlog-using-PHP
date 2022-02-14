<?php
session_start();
if(!isset($_SESSION['is_login'])){ // no login, redirect to login page
	header('Location:login.php');
	exit;
}
if(isset($_GET['id'])){
	include('connection.php');
	$id=$_GET['id'];
	  $query="SELECT * FROM posts WHERE id = $id";
  $result=mysqli_query($con,$query);
  $post_details=mysqli_fetch_assoc($result);
	mysqli_close($con);
}else{ // unathorised access for edit post page: not allowed.
	if($_SESSION['role'] == 1){ // i am user
		header('Location:my_posts.php');
		exit;
	} else { // i am admin
		header('Location:all_posts.php');
		exit;
	}
}
 ?>
<!DOCTYPE html>
<html>
<body>
<head>
<title>Edit Post | My Blog</title>
<?php include('menu_bar.php');?>
<form method ="post" action="process_edit_post.php" style="width:60%; margin-top:10px;">
  <fieldset>
    <legend> <strong>Edit Post</strong></legend>
	 <input type="hidden" value="<?php echo $post_details['id']; ?>" name="id">
    Title:<br>
    <input type="text" value="<?php echo $post_details['title']; ?>" style="width:80%;" name="title" required>
    <br/><br/>
    Content:<br/>
    <textarea name="content" rows=8 cols="86" required>
		<?php echo $post_details['content']; ?>
	</textarea>  <br/><br/>
	
    <input style="width:25%; height:30px;" type="submit"  name="submit" value="Submit">
    <input style="width:25%; height:30px;" type="reset"  name="reset" value="Reset">
  </fieldset>
</form>

</body>
</html>