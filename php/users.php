<?php 


session_start();
include "config.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM users WHERE unique_id != {$outgoing_id}";
$result = mysqli_query($conn, $sql) or die("Query Failed".$sql);

$output = "";

if (mysqli_num_rows($result) == 0) {
	$output .= "No user is avaliable";
}elseif(mysqli_num_rows($result) > 0){
	include "data.php";
}

echo $output;


?>