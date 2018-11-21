<?php
	//ham khoi dong session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <title>Home</title>
</head>
<body>
	<div class="container-fluid" style="background-color:red">
	<div class="container">
	<h2 class="page-header">Welcome to host <?=$_SERVER['HTTP_HOST']?></h2>
	<?php
	
	if($_POST){
		require "mysql-connect.php";
		$database=new Database();
		$db= $database -> getConnection();
		require "models/user.php";
		$empObj=new User($db);
		$empObj->email=$_POST['txtEmail'];
		$empObj->password=$_POST['txtPassword'];
		if($empObj->checkUser()){
			//cap phien lam viec voi session
			$_SESSION['email']=$empObj->email;
			//dieu huong toi trang chu
			//header("location:index.php");
			echo("<script>location.href = 'index.php';</script>");
		}else{
			echo "<div class='alert alert-danger'>Sai thong tin tai khoan</div>";
			
		}	
	}
	

	?>

	<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
		<table class="table table-bordered table-hover table-responsive">
			<tr>
				<th>Email or username</th>
				<td>
					<input type="text" name="txtEmail" placehover="Nhap Email">
				</td>
			</tr>
			<tr>
				<th>Mat khau</th>
				<td>
					<input type="password" name="txtPassword" placehover="Nhap Mat Khau">
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<input type="submit" value="Dang nhap"class="btn btn-info">
				</td>
			</tr>
		</table>
	</form>
	</div>
	</div>
</body>
</html>
