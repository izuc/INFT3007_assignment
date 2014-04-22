<?php
session_start();
define("MYSQL_HOSTNAME", "");
define("MYSQL_USER_NAME", "");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "currency_loans");

$connection = @mysqli_connect(MYSQL_HOSTNAME, MYSQL_USER_NAME, MYSQL_PASSWORD, MYSQL_DATABASE) 
		OR die('Could not connect to MySQL: ' . mysqli_error());

$page = (isset($_GET['page']) ? $_GET['page'] : 'home');
$actions = array('home', 'task_2', 'task_3', 'task_4', 'task_5', 'task_6', 'task_7', 'task_8', 'task_9', 'task_10', 'task_11');

if (in_array($page, $actions)) {
	require_once('pages/'.$page.'.php');
} else {
	require_once('pages/home.php');
}

include_once('template/header.php');
display();
include_once('template/footer.php');
?>
