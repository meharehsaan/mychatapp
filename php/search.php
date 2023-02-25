<?php 
session_start();
include "config.php";
$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$output = "";
$sql = "SELECT * FROM users WHERE unique_id != '{$outgoing_id}' AND (fname LIKE '%{$searchTerm}%' or lname LIKE '%{$searchTerm}%')";
$result = mysqli_query($conn, $sql) or die("Query Failed" . $sql);

if (mysqli_num_rows($result) > 0) {
		include "data.php";
	}else{
		$output .= "no user found";
	}

	echo $output;




?>