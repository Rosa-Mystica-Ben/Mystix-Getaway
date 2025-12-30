<?php
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$conn = new mysqli('localhost','root','','mystixgetaway');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactus(fullname, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $fullname, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>