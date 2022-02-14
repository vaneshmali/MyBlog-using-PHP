<?php
session_start();
if(!isset($_SESSION['is_login'])){ // no login, redirect to login page
	header('Location:login.php');
	exit;
}
?>
 
<html>
<body>
<head>
<title>Change Password | My Blog</title>
<?php include('menu_bar.php');?>
<?php 
// Print msg
if(isset($_SESSION['msg'])){
	echo "<br/><b><i>".$_SESSION['msg'] . "</i></b>";
	unset($_SESSION['msg']);
}
?>
<form method ="post" action="process_change_password.php" style="width:60%; margin-top:10px;">
  <fieldset>
    <legend> <strong>Change Password</strong></legend>
    Old Password:<br>
    <input type="password" style="width:50%;" name="old_pass" required>
    <br/><br/>
    New Password:<br/>
    <input type="password" style="width:50%;" name="new_pass" required>  <br/>
	<br/>
    <input style="width:25%; height:30px;" type="submit"  name="submit" value="Submit">
  </fieldset>
</form>

</body>
</html>