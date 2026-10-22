<?php
$databaseConfigPath = __DIR__ . '/db_config.php';

if (!is_file($databaseConfigPath)) {
	exit('Create db_config.php from db_config.example.php and set your MySQL credentials.');
}

require $databaseConfigPath;

if (!isset($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME)) {
	exit('The MySQL configuration is incomplete.');
}

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$con) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
