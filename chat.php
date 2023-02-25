<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
	header("location: login.php");
}

?>

<?php include "header.php"; ?>
<body>
	<div class="wrapper">
		<section class="chat-area">
			<header>
				<?php

				include "php/config.php";
				$user_id = $_GET['user_id'];
				$sql = "SELECT * FROM users WHERE unique_id = {$user_id}";
				$result = mysqli_query($conn, $sql) or die("Query Failed =".$sql);
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
				}
				?>
				<a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
				<img src="php/upload/<?php echo $row['img'] ?>">
				<div class="detail">
					<span><?php echo $row['fname']. " " .$row['lname']; ?></span>
					<p><?php echo $row['status'] ?></p>
				</div>
			</header>

			<div class="chat-box">
				<div class="chat outgoing">
					<div class="detail">
						<p></p>
					</div>
				</div>
				<div class="chat incoming">
					<img src="img/Mehar.jpg" alt="">
					<div class="detail">
						<p></p>
					</div>
				</div>
			</div>

				<form action="#" class="typing-area">
					<input  type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
					<input  type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden>
					<input class="input-field" name="message" type="text" placeholder="Type your message">
					<button><i class="fab fa-telegram-plane"></i></button>
				</form>

			</section> 
		</div>

		<script src="script/chat.js"></script>

	</body>
	</html>