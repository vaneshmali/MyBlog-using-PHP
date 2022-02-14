<style>
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
<body <?php if(isset($home_page)){ echo "class='body-bg'";} ?>>
<div style="text-align:center; margin-bottom:10px;"> <strong> My Blog </strong></div>
<ul>
  <li><a href="home.php">Home</a></li>
  <?php if(isset($_SESSION['is_login']) && $_SESSION['role'] == 0) { ?>
  <li><a href="add_user.php">Add User</a></li>
  <li><a href="all_users.php">All Users</a></li>
  <li><a href="create_post.php">Create Post</a></li>
  <li><a href="all_posts.php">All Posts</a></li>
  <li><a href="edit_profile.php">Edit Profile</a></li>
   <li><a href="change_password.php">Change Password</a></li>
  <li><a href="logout.php">Logout</a></li>
  <?php } ?>
  <?php if(isset($_SESSION['is_login']) && $_SESSION['role'] == 1) { ?>
  <li><a href="create_post.php">Create Post</a></li>
  <li><a href="my_posts.php">My Posts</a></li>
  <li><a href="edit_profile.php">Edit Profile</a></li>
  <li><a href="change_password.php">Change Password</a></li>
  <li><a href="logout.php">Logout</a></li>
  <?php } ?>
  <?php 
  
  if(false === isset($_SESSION['is_login'])) { ?>
  <li><a href="login.php">Login</a></li>
  <?php } ?>
</ul>