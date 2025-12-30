<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$packageName = $_POST['packageName'];
	$email = $_POST['email'];
	$travel = $_POST['travel'];
	$include = $_POST['include'];
	$adult = $_POST['adult'];
	$children = $_POST['children'];
	$number = $_POST['number'];
	$conn = new mysqli('localhost','root','','mystixgetaway');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into family(fname, lname, packageName, email, travel, include, adult, children, number) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssiii", $fname, $lname, $packageName, $email, $travel, $include, $adult, $children, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>