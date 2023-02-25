<?php 

session_start();
include "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));

if (!empty($email) && !empty($password)) {
	$sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
	$result = mysqli_query($conn, $sql) or die("Query Failed");
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$status = "Active now";
		$sql2 = "UPDATE users SET status = '{$status}' WHERE unique_id = '{$row['unique_id']}'";
		$result2 = mysqli_query($conn, $sql2);
		if ($result2) {
			$_SESSION['unique_id'] = $row['unique_id'];
			echo "success";
		}
		
	}else{
		echo "Email or password is incorrect";
	}
}else{
	echo "All fields must be reqiured";
}

?>