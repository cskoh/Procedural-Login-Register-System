<?php
// Set DateBase information
define('DB_HOST' , 'localhost');
define('DB_USER' , 'root');
define('DB_PASS' , '');
define('DB_NAME' , 'project');

//Making a mysql connection and check it for errors
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($connect, 'UTF-8');

	if (mysqli_connect_errno($connect)) {
		echo "<font colo ='red'>Failed to connect to MySQLi: " .mysqli_connect_errno();
	}

	/*else {
		echo 'Everything is ok';
	}
	*/
