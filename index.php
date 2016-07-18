<?php
include('Global/global.inc.php');

if (isset($_SESSION['user_name'])) {
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['user_name'];
	$user_avatar = $_SESSION['user_avatar'];
		echo "Welcome, ".$user_name."<br /><br />
		<a href='profile.php?user_id=".$user_id."' alt='' target='_blank'>View Profile</a><br /><br />
		<img src='".$user_avatar."' alt='".$user_avatar."' width='150' height='150'><br /><br />
		<form action='signout.php' method='POST'><input type='submit' name='signout' value='Sign Out'></form>";
} else {
	echo '<br /><br /><a href="signin.php">Sign in</a><br /><br /><a href="signup.php">Sign Up</a>';
}
