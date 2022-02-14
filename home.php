<?php
session_start();
include('connection.php');
$home_page=true;
  // fetch all approved posts
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
<head> <title>My Blog | Home</title>
<?php include('menu_bar.php');?>
<div style="width:100%; background-color: silver;"; >
	<div style="width:60%; float:left;  margin-top:10px;  margin-left:10px;";>
		<?php 
		foreach($all_approved_posts as $post){
		?>
		
		<h1 style="color:#e55c0d;">
				<?php echo $post['title']; ?>
		</h1>
		<strong>Post By: <?php echo $usernames[$post['created_by']] ?></strong> <br/>
		<strong>Date: <?php echo date('d-M-Y',strtotime($post['created_date'])); ?></strong> 
		<p>
		<?php echo $post['content']; ?>
		</p>
		<hr/>
		<?php 
		}
		?>
		
	</div>
	<div style="width:20%; float:right;  margin-top:10px;";>
		<h1>
			Recent Posts:
		</h1>
		<?php
		$i= 0;
		foreach($all_approved_posts as $post){
			$i = $i+1;
			if($i>10){
				break;
			}
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
