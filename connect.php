<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$packageName = $_POST['packageName'];
	$email = $_POST['email'];
	$departurecity = $_POST['departurecity'];
	$travel = $_POST['travel'];
	$include = $_POST['include'];
	$members = $_POST['members'];
	$number = $_POST['number'];
	$conn = new mysqli('localhost','root','','mystixgetaway');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into friends(fname, lname, packageName, email, departurecity, travel, include,  members, number) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssii", $fname, $lname, $packageName, $email, $departurecity, $travel, $include, $members, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>