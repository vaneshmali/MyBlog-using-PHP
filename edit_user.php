<?php
session_start();
if(!isset($_SESSION['is_login'])){ // no login, redirect to login page
	header('Location:login.php');
	exit;
}else{
	if($_SESSION['role'] == 1){ // i am not admin, i can not add user
		header('Location:my_posts.php');
		exit;
	}
}
if(isset($_GET['id'])){
	include('connection.php');
	$id=$_GET['id'];
	  $query="SELECT * FROM users WHERE id = $id";
  $result=mysqli_query($con,$query);
  $user_details=mysqli_fetch_assoc($result);
	mysqli_close($con);
}else{ // unathorised access for edit user page: not allowed.
	header('Location:all_users.php');
		exit;
}
 ?>
<!DOCTYPE html>
<html>
<body>
<head>
<title>Edit User | My Blog</title>
<?php include('menu_bar.php');?>
<form method ="post" action="process_edit_user.php" style="width:60%; margin-top:10px;">
  <fieldset>
    <legend> <strong>Edit User</strong></legend>
	<input type="hidden" value="<?php echo $user_details['id']; ?>" name="id">
    First name:<br>
    <input type="text" style="width:50%;" value="<?php echo $user_details['fname']; ?>" name="fname" required>
    <br/><br/>
    Last name:<br/>
    <input type="text" style="width:50%;" value="<?php echo $user_details['lname']; ?>" name="lname" required>  <br/><br/>
	Address:<br/>
    <input type="text" style="width:50%;" value="<?php echo $user_details['address']; ?>" name="address" required>  <br/><br/>
      Email ID:<br/>
    <input type="text" style="width:50%;" value="<?php echo $user_details['email']; ?>" name="email" required>  <br/><br/>
	Mobile:<br/>
    <input type="text" style="width:50%;" value="<?php echo $user_details['mobile']; ?>" name="mobile" required> <br/><br/>
     User Name:<br/>
    <input type="text" style="width:50%;" value="<?php echo $user_details['username']; ?>" name="username" required>  <br/><br/>
    <br/>
    <input style="width:25%; height:30px;" type="submit"  name="submit" value="Submit">
    <a href="all_users.php" ><input style="width:25%; height:30px;" type="button"  name="cancel" value="Cancel">
  </fieldset>
</form>

</body>
</html>