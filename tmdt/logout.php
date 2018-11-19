<?php
	session_start();
	if(isset($_SESSION['email'])){
		//Huy session va dieu huong ve trang login
		unset($_SESSION['email']);
		header("location:login.php");
	}else{
		header("location:login.php");
	}
?>