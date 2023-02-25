<?php 

if (isset($_SESSION['unique_id'])) {
	header("location: users.php");
}
?>

<?php include "header.php"; ?>
<body>
	<div class="wrapper">
		<section class="form login">
			<header>My Chat Application</header>
			<form action="post" autocomplete="off">
				<div class="error-txt"></div>
				<div class="field input">
					<label for="name">Email</label> 
					<input type="email" placeholder="Email" name="email">
				</div>
				<div class="field input">
					<label for="name">Password</label> 
					<input type="password" placeholder="Password" id="pass" name="password">
					<i class="fas fa-eye" onclick="showpass()"></i>
				</div>
				<div class="field button">
					<input type="submit" value="Login">
				</div>
				<div class="link">
					Not yet signed up?<a href="index.php"> SignUp here</a>
				</div>
			</form>
		</section> 
	</div>

<script src="script/show-hide-pass.js"></script>
<script src="script/login.js"></script>

</body>
</html>