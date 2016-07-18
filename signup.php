<?php
include('Global/global.inc.php');

if (isset($_SESSION['user_name'])) {
	header("Location: index.php");
}

include('Global/temp/view.register.php');
	
//Set error as false
$error = FALSE;
	
//Check if signup form is send
if (isset($_POST['signup'])) {
	$user_name = mysqli_real_escape_string($connect, htmlspecialchars($_POST['user_name']));
	$user_pass = mysqli_real_escape_string($connect, htmlspecialchars($_POST['user_pass']));
	$hash = password_hash($user_pass, PASSWORD_DEFAULT);
	$user_repass = mysqli_real_escape_string($connect, htmlspecialchars($_POST['user_repass']));
	$user_mail = mysqli_real_escape_string($connect, $_POST['user_mail']);
	$user_avatar = mysqli_real_escape_string($connect, $_POST['user_avatar']);
	$registered = date('d-m-Y , H:i');
	
//Check if username is already in use
$user_check = mysqli_query($connect, "SELECT user_name FROM ".USERS_TABLE." WHERE user_name='$user_name'");
$do_user_check = mysqli_num_rows($user_check);

//If email is already in use
$email_check = mysqli_query($connect, "SELECT user_mail FROM ".USERS_TABLE." WHERE user_mail='$user_mail'");
$do_email_check = mysqli_num_rows($email_check);

//Display Errors
if($do_user_check > 0){
	$error = TRUE;
	echo '<font color=\'red\'>Username is already in use!</font><br />';
}

//Checking username lenght
if (mb_strlen($user_name, 'UTF-8') < 6 && mb_strlen($user_name, 'UTF-8') > 100) {
	$error = TRUE;
		echo '<font color=\'#FF0000\'>Username must be minimum of <b>6</b> and maximum of <b>100</b> characters</font><br />';
}

if($do_email_check > 0){
	$error = TRUE;
	echo '<font color=\'red\'>Email is already in use!</font><br />';
} 
else {
	
//Username can contain only alpha character and space
if (!preg_match("/^[a-zA-Z0-9]+$/", $user_name)){
	$error = TRUE;
		echo '<font color=\'#FF0000\'>Name must be only with alphabets and space</font><br />';
}

//Check email is valid
if (!filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {
	$error = TRUE;
		echo '<font color=\'#FF0000\'>Invalid Email Adress. Please enter a valid email adress</font><br >';
}
	
//Checking password lenght
if (mb_strlen($user_pass, 'UTF-8') < 6 && mb_strlen($user_pass, 'UTF-8') > 250) {
	$error = TRUE;
		echo '<font color=\'#FF0000\'>Password must be minimum of <b>6</b> characters and maximum of <b>250</b></font><br />';
}

//Cheking Passwords match
if ($user_pass != $user_repass) {
	$error = TRUE;
		echo '<font color=\'#FF0000\'>Passwords doesn\'t match</font><br />';
}

//If we no have error query will send to datebase
if (!$error) {
        if(mysqli_query($connect, "INSERT INTO `".USERS_TABLE."` (user_name, hash, user_mail, user_avatar, registered) VALUES('$user_name', '$hash', '$user_mail', '$user_avatar', '$registered')")) {
            echo "<font color=\'green\'>Successfully Registered! </font><br /><a href='signin.php'>Click here to Sign in</a><br />";
        } else {
            echo "<font color=\'red\'>invalid registration!</font>";
        }
    }	
}
}