<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Home</title>
</head>
<body>
	<div class="container">
	<h1 class="page-header">HOME</h1>
<?php
			if(!isset($_SESSION['email'])){
				echo("<script>location.href = 'login.php';</script>");
			}else{
				require "mysql-connect.php";
				$database=new Database();
				$db= $database -> getConnection();
				echo "<div class='alert alert-success'>Xin Chao:".$emp['name']."</div>";
			}
?>
	</div>
</body>
</html>
