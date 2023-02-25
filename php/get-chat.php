<?php 
include "config.php";
session_start();
if (isset($_SESSION['unique_id'])) {
	$outgoing_msg_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
	$incoming_msg_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);

	$output = "";

	$sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
	WHERE ((outgoing_msg_id = '{$outgoing_msg_id}' AND incoming_msg_id = '{$incoming_msg_id}') OR (outgoing_msg_id = '{$incoming_msg_id}' AND incoming_msg_id = '{$outgoing_msg_id}')) ORDER BY msg_id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {

				if ($row['outgoing_msg_id'] === $outgoing_msg_id) { //if equal then sending msg
					$output .= '<div class="chat outgoing">
					<div class="detail">
					<p>'.$row['msg'].'</p>
					</div>
					</div>';
					
				}else{
					$output .= '<div class="chat incoming">
					<img src="php/upload/'.$row['img'].'" alt="">
					<div class="detail">
					<p>'.$row['msg'].'</p>
					</div>
					</div>';
					
					

				}
			}

			echo $output;
		}




	}else{
		header("../login.php");
	}


?>