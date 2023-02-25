<?php
session_start();
include "config.php";

	//saving data in var

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));

if(!empty($fname) && !empty($lname) &&  !empty($email) && !empty($password)){

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		$echksql = "SELECT email FROM users WHERE email = '{$email}'";
		$result = mysqli_query($conn, $echksql);
		if (mysqli_num_rows($result) > 0) {
			echo $email."The Email Already Exists";
		}else{
			if(isset($_FILES['image'])){
				$img_name = $_FILES['image']['name'];
				$img_type = $_FILES['image']['type'];
				$tmp_name = $_FILES['image']['tmp_name'];

				$img_explode = explode(".", $img_name);
				$img_ext = end($img_explode);
				$extensions = ['png', 'jpg', 'jpeg'];

				//checking file extension match
				if (in_array($img_ext, $extensions) === true) {
					$time = time();
					$new_img_name = $time.$img_name;

					//uploading file in our folder
					if (move_uploaded_file($tmp_name, "upload/".$new_img_name)) {
						$status = "Active now";
						$random_id = rand(time(), 10000000);

						//running sql query to insert data in table
						$sql = "INSERT INTO users(unique_id, fname, lname, email, password, img, status) VALUES('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')";
						$result = mysqli_query($conn, $sql) or die("Query Failed");

						//sql query for session var
						if($result){
							$sql2 = "SELECT * FROM users WHERE email = '{$email}'";
							$result1 = mysqli_query($conn, $sql2);
							if(mysqli_num_rows($result1) > 0){
								$row = mysqli_fetch_assoc($result1);
								$_SESSION['unique_id'] = $row['unique_id'];
								echo "success";
							}
						}else{
							echo "Something went wrong";
						}
					}
				}else{
					echo "Please choose image of extensions '.jpeg .jpg .png!'";
				}
			}else{
				echo "Please upload your Image";
			}
		}
	}else{
		echo "Please enter a valid Email address";
	}

}else{
	echo "All fields must be reqiured";
}


?>