<?php
session_start();
if(!isset($_SESSION['is_login'])){ // no login, redirect to login page
	header('Location:login.php');
	exit;
}
 ?>
<!DOCTYPE html>
<html>
<body>
<head>
<title>Create Post | My Blog</title>

<?php include('menu_bar.php');?>

<form method ="post" action="process_create_post.php" style="width:60%; margin-top:10px;">
  <fieldset>
    <legend> <strong>Create Post</strong></legend>
    Title:<br>
    <input type="text" style="width:80%;" name="title" required>
    <br/><br/>
    Content:<br/>
    <textarea name="content" rows=8  style="width:80%;" required> </textarea>  <br/><br/>
	
    <input style="width:25%; height:30px;" type="submit"  name="submit" value="Submit">
    <input style="width:25%; height:30px;" type="reset"  name="reset" value="Reset">
  </fieldset>
</form>
</body>
</html>