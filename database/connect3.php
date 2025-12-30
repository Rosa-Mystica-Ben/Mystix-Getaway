<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$packageName = $_POST['packageName'];
	$email = $_POST['email'];
	$travel = $_POST['travel'];
	$include = $_POST['include'];
	$number = $_POST['number'];
	$conn = new mysqli('localhost','root','','mystixgetaway');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into couple(fname, lname, packageName, email, travel, include, number) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssi", $fname, $lname, $packageName, $email, $travel, $include, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>