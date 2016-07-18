<?php
include('Global/global.inc.php');

if(isset($_SESSION['user_name'])) {
    header("Location: index.php");
}

include('Global/temp/view.login.php');

//check if form is submitted
if (isset($_POST['signin'])) {

    $user_name = mysqli_real_escape_string($connect, $_POST['user_name']);
    $user_pass = mysqli_real_escape_string($connect, $_POST['user_pass']);
	$result = mysqli_query($connect, "SELECT * FROM `" . USERS_TABLE . "` WHERE user_name = '$user_name'");

//Now we check if we have empty fields
	if (empty($user_name) || empty($user_pass)) {
		echo "empty fields";
	}
//Check password hash from db and login deatils
		if ($row = mysqli_fetch_array($result)) {
			$hashed = $row['hash'];
			
		//if password verify = true
			if (password_verify($user_pass, $hashed)) {
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['user_avatar'] = $row['user_avatar'];
				$_SESSION['user_mail'] = $row['user_mail'];
				$_SESSION['user_active'] = $row['user_active'];
				
				header("Location: index.php");
			}

		}
	else {

        echo 'Invalid Username or Password!<br />';
    }
}