<?php

include 'config.php';

session_start();
if (isset($_SESSION['unique_id'])) {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$status = "offline now";
		$sql = "UPDATE users SET status = '{$status}' WHERE unique_id = '{$id}'";
		$result = mysqli_query($conn, $sql);
		if ($sql) {
			session_unset();
			session_destroy();
			header("location: ../login.php");
		}
	}else{
		header("location: ../users.php");
	}
}else{
	header("location: ../login.php");
}

