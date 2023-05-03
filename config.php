<?php

require "vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db_type = $_ENV['DB_CONNECTION'];
$db_host = $_ENV['DB_HOST'];
$db_name = $_ENV['DB_DATABASE'];
$db_username = $_ENV['DB_USERNAME'];
$db_password = $_ENV['DB_PASSWORD'];

$dsn = "$db_type:host=$db_host;dbname=$db_name";


try {
$conn = new PDO($dsn, $db_username, $db_password);
}
catch (PDOException $e) { 
    $conn = new PDO("mysql:host=$db_host", $db_username, $db_password);
    $conn->exec("CREATE DATABASE `$db_name`;") or die(print_r($conn->errorInfo(), true));
	$conn = new PDO($dsn, $db_username, $db_password);    
    try {
		$sql_users = "
			CREATE TABLE IF NOT EXISTS pets (
				id INT PRIMARY KEY AUTO_INCREMENT,
				name VARCHAR(30),
				gender CHAR(6),
				birthdate DATE,
				owner VARCHAR(70),
				email VARCHAR(100),
				address VARCHAR(255),
				contact_number VARCHAR(20)
			);		
		";
		$conn->exec($sql_users);
		include	'load-data.php';
	} catch (PDOException $e) {
		error_log($e->getMessage());
		echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
	}

}



