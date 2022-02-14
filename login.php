<?php
session_start();

if(isset($_SESSION['is_login'])){ // if user is already logged in
		if($_SESSION['role'] == 0){ // i am admin
			header('Location:all_posts.php');
			exit;
		}else{ // i am user
			header('Location:my_posts.php');
			exit;
		}	
}
?>
<html>
	<head>
	<title>
		Login | My Blog
	</title>
	<style>
	/* Bordered form */
form {
    border: 3px solid #1fe50d;
	margin-left:25%;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* Menu Bar */
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
.body-bg {
	 background-color: #ffffcc;
}
	</style>
	</head>
	<body class="body-bg">
<div style="text-align:center; margin-bottom:10px;"> <strong>My Blog</strong></div>
	<ul>
  <li><a href="home.php">Home</a></li>
</ul>

<?php
if(isset($_SESSION['login_failed'])){ // if submitted login details are wrong
	echo "<p style='text-align:center; color:red;'> <b>Username or Password is wrong, please try again!!! </b></p>";
	unset($_SESSION['login_failed']);
	
}
?>
	<form method="post" action="login_process.php" style="width:50%; margin-top:10px;">
	  <div style="text-align: center; margin-top:10px;">
		<b>Login</b>
	  </div>
	  <div class="container">
		<label><b>Username</b></label>
		<input type="text" placeholder="Enter Username" name="username" required>

		<label><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="pass" required>
		<div style="text-align:center;">
		<button type="submit" name="submit" style="width:50%;">Login</button>
		</div>
	  </div>
	</form>
	</body>
</html>
