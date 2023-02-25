<?php

session_start();
if (!isset($_SESSION['unique_id'])) {
	header("location: login.php");
}
?>

<?php include "header.php"; ?>
<body>
	<div class="wrapper">
		<section class="users">
			<header>
				<?php

				include "php/config.php";
				$sql = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";
				$result = mysqli_query($conn, $sql) or die("Query Failed =".$sql);

				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
				}
				?>
				<div class="content">
					<img src="php/upload/<?php echo $row['img']; ?>" alt="Image">
					<div class="detail">
						<span><?php echo $row['fname']. " " .$row['lname']; ?></span>
						<p><?php echo $row['status'] ?></p>
					</div>
				</div>
				<a href="php/logout.php?id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
			</header>
			<div class="search">
				<!-- <span class="text">Search</span> -->
				<input type="text" placeholder="Search a user">
				<button><i class="fa fa-search"></i></button>
			</div>
			<div class="user-list">

			</div>
		</section> 
	</div>

	<script src="script/users.js"></script>

</body>
</html>