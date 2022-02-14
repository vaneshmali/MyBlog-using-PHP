<?php
include('connection.php');
  // fetch single post by post id
  if(isset($_GET['id'])){
	  $id=$_GET['id'];
	  $query="SELECT * FROM posts WHERE id = $id";
  $result=mysqli_query($con,$query);
  $single_post=mysqli_fetch_assoc($result);
  }else{
	  header('Location:home.php');
  }
  
  // fetch all approved posts for Recent posts in right side
  $query="SELECT * FROM posts WHERE approved = 1 order by created_date DESC";
  $result=mysqli_query($con,$query);
  $all_approved_posts=mysqli_fetch_all($result,MYSQLI_ASSOC);
  
  // fetch all users : id, fname, lname
  $query="SELECT id, fname, lname FROM users ";
  $result=mysqli_query($con,$query);
  $all_users=mysqli_fetch_all($result,MYSQLI_ASSOC);
  $usernames= array();
  foreach($all_users as $user){
	  $usernames[$user['id']] = $user['fname']. " " . $user['lname'];
  }
  
  mysqli_close($con);
		
?>
<!DOCTYPE html>
<html>
<head> <title><?php echo $single_post['title']; ?> | Home</title>
<?php include('menu_bar.php');?>
<div style="width:100%; background-color: silver;"; >
	<div style="width:60%; float:left;  margin-top:10px;  margin-left:10px;";>
		<h1 style="color:red;">
				<?php echo $single_post['title']; ?>
		</h1>
		<strong>Post By: <?php echo $usernames[$single_post['created_by']] ?></strong> <br/>
		<strong>Date: <?php echo date('d-M-Y',strtotime($single_post['created_date'])); ?></strong> 
		<p>
		<?php echo $single_post['content']; ?>
		</p>
		<hr/>	
	</div>
	<div style="width:20%; float:right;  margin-top:10px;";>
		<h1>
			Recent Posts:
		</h1>
		<?php 
		foreach($all_approved_posts as $post){
		?>
		<strong><a href="single_post.php?id=<?php echo $post['id'];  ?>"><?php echo $post['title']; ?></a></strong> <br/>
		<p>
		Post By: <?php echo $usernames[$post['created_by']] ?> <br/>
		Date: <?php echo date('d-M-Y',strtotime($post['created_date'])); ?>
		</p>
		<br/>
		<?php 
		}
		?>
	</div>
</div>
</body>
</html>
