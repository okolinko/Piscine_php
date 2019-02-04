<?php 
	session_start();

	require_once 'install.php';

	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	define('HOST','localhost');
	define('LOGIN', 'root');
	define('PASSWORD', 'myroot');
	define('DATABASE', 'table');

	define('DIR', dirname(__FILE__));

	$db = mysqli_connect(HOST, LOGIN, PASSWORD, DATABASE);

	if (mysqli_connect_errno())
	{
		echo "ERROR: DATABASE DIDN'T CONNECT! # ".mysqli_connect_errno();
		exit();
	}

	$query = "SELECT * FROM "
?>