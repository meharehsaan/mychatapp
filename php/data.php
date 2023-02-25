<?php 

while ($row = mysqli_fetch_assoc($result)) {
	$sql2 = "SELECT * FROM messages 
		WHERE 
			(incoming_msg_id = {$row['unique_id']} 
			OR outgoing_msg_id = {$row['unique_id']}) 
			AND (outgoing_msg_id = {$outgoing_id} 
			OR incoming_msg_id = {$outgoing_id}) 
		ORDER BY msg_id DESC LIMIT 1";
	$result2 = mysqli_query($conn, $sql2) or die("Query = ".$sql2);
	//echo $sql2;
	$row2 = mysqli_fetch_assoc($result2);
	if (mysqli_num_rows($result2) > 0) {
		$textmsg = $row2['msg'];
	}else{
		$textmsg = "No message avaliable";
	}

	//triming msg
	if(strlen($textmsg) > 30){
	 $msg = substr($textmsg, 0, 30).'...';
	}else{
		$msg = $textmsg;
	}

	($outgoing_id == $row2['incoming_msg_id']) ? $you = "You : " : $you = "";
	

	if ($row['status'] == "offline now") {
		$offline = "offline now";
	}else{
		$offline = "";
	}

	//echo $offline;

	$output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
	<div class="content">
	<img src="php/upload/'.$row['img'].'" alt="">
	<div class="detail">
	<span>' .$row['fname']. " " .$row['lname'] .'</span>
	<p>'.$you.$msg.'</p>
	</div>
	</div>
	<div class="status-dot '.$offline.'">
	<i class="fas fa-circle"></i>
	</div>
	</a>';
}	




?>