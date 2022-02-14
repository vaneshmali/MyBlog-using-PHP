<?php
session_start();
if(isset($_SESSION['is_login'])){
	header('Location:all_posts.php');
}else{
	header('Location:login.php');
}
?>