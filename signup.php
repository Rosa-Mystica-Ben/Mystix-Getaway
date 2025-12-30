<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body style="background-image: url('bgg.gif');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}">

	<style type="text/css">
	
	#text{

		height: 30px;
		border-radius: 5px;
		padding: 5px;
		border: solid thin #000;
		width: 60%;
		position: relative;
		margin-left: 85px;
	}

	#button{

		padding: 12px;
		width: 160px;
		color: white;
		background-color: #00dbdb;
		border: none;
		position: relative;
		margin-left: 140px;
		top: 10px;
		font-size: 20px;
		color: #fff;
	}

	#box{

		background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
		margin: auto;
		width: 450px;
		padding: 90px;
		position: relative;
		margin-top: 25px;
		border-radius: 500px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 40px;margin: 20px;color: white;text-align: center;position: relative;bottom:20px;">| Mystix Getaway | SIGNUP</div>
            <div style="font-size: 20px;margin: 20px;color: white;text-align: center;">USERNAME</div>
			<input id="text" type="text" name="user_name"><br><br>
			<div style="font-size: 20px;margin: 20px;color: white;text-align: center;">PASSWORD</div>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="SIGN UP"><br><br>

			<a href="login.php"><div style="position: relative;left: 140px;top: 10px;" >Aldready Visited ? Login!</a><br><br></div>
		</form>
	</div>
</body>
</html>