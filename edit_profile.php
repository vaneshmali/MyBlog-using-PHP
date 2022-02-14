<?php
session_start();
if(!isset($_SESSION['is_login'])){ // no login, redirect to login page
	header('Location:login.php');
	exit;
}

	include('connection.php');
	$my_id=$_SESSION['user_id'];
	  $query="SELECT * FROM users WHERE id = $my_id";
  $result=mysqli_query($con,$query);
  $user_details=mysqli_fetch_assoc($result);
	mysqli_close($con);

 ?>
<!DOCTYPE html>
<html>
<body>
<head>
<title>Edit Profile | My Blog</title>
<?php include('menu_bar.php');?>
<form method ="post" action="process_edit_profile.php" style="width:60%; margin-top:10px;">
<?php 
// Print msg
if(isset($_SESSION['msg'])){
	echo "<br/><b><i>".$_SESSION['msg'] . "</i></b>";
	unset($_SESSION['msg']);
}
?>
  <fieldset>
    <legend> <strong>Edit Profile</strong></legend>
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
  </fieldset>
</form>

</body>
</html>