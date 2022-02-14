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
 ?>
<!DOCTYPE html>
<html>
<body>
<head>
<title>My Blog | Add User</title>
<?php include('menu_bar.php');?>
<form method ="post" action="process_add_user.php" style="width:60%; margin-top:10px;">
  <fieldset>
    <legend> <strong>Add User</strong></legend>
    First name:<br>
    <input type="text" style="width:50%;" name="fname" required>
    <br/><br/>
    Last name:<br/>
    <input type="text" style="width:50%;" name="lname" required>  <br/><br/>
	Address:<br/>
    <input type="text" style="width:50%;" name="address" required>  <br/><br/>
      Email ID:<br/>
    <input type="text" style="width:50%;" name="email" required>  <br/><br/>
	Mobile:<br/>
    <input type="text" style="width:50%;" name="mobile" required> <br/><br/>
     User Name:<br/>
    <input type="text" style="width:50%;" name="username" required>  <br/><br/>
     Password:<br/>
    <input type="text" style="width:50%;" name="pass" required>  <br/><br/>
    <br/>
    <input style="width:25%; height:30px;" type="submit"  name="submit" value="Submit">
    <input style="width:25%; height:30px;" type="reset"  name="reset" value="Reset">
  </fieldset>
</form>

</body>
</html>