

<?php include "header.php"; ?>
<body>
	<div class="wrapper">
		<section class="form signup">
			<header>My Chat Application</header>
			<form action="post" enctype="multipart/form-data" autocomplete="off">
				<div class="error-txt"></div>
				<div class="name-detail">
					<div class="field input">
						<label for="name">First Name</label>
						<input type="text" placeholder="first name" name="fname" >
					</div>
					<div class="field input">
						<label>last Name</label>
						<input type="text" placeholder="last name" name="lname" >
					</div>
				</div>
				<div class="field input">
					<label>Email</label> 
					<input type="email" placeholder="Email" name="email">
				</div>
				<div class="field input">
					<label>Password</label> 
					<input type="password" placeholder="Password" id="pass" name="password">
					<i class="fas fa-eye" onclick="showpass()"></i>
				</div>
				<div class="field image">
					<label >Select image</label> 
					<input type="file" name="image">
				</div>
				<div class="field button">
					<input type="submit" value="Continue to chat">
				</div>
				<div class="link">
					Already signed up?<a href="login.php"> Login here</a>
				</div>
			</form>
		</section> 
	</div>


<script src="script/show-hide-pass.js"></script>
<script src="script/signup.js"></script>

</body>
</html>