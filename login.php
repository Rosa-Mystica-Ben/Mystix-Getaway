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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body style="background-image: url('bggg.gif');
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
			<div style="font-size: 40px;margin: 20px;color: white;text-align: center;position: relative;bottom:20px;">| Mystix Getaway | LOGIN</div>

			<div style="font-size: 20px;margin: 20px;color: white;text-align: center;">USERNAME</div>
			<input id="text" type="text" name="user_name"><br><br>
			<div style="font-size: 20px;margin: 20px;color: white;text-align: center;">PASSWORD</div>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="LOG IN"><br><br>

			<a href="signup.php"><div style="position: relative;left: 155px;top: 10px;" >New here ? Signup!</a><br><br></div>
		</form>
	</div>
</div>
</body>
</html>