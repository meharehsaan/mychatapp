<?php 
	include "config.php";
	session_start();
	if (isset($_SESSION['unique_id'])) {
		$outgoing_msg_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
		$incoming_msg_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		if (!empty($message)) {
			$sql = "INSERT INTO messages(incoming_msg_id, outgoing_msg_id, msg) VALUES('{$outgoing_msg_id}', '{$incoming_msg_id}', '{$message}')";
			$result = mysqli_query($conn, $sql) or die("Query Failed");
			echo "success";

		}else{
			header("../login.php");
		}

	}else{
		header("../login.php");
	}


?>