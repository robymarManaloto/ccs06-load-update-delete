<?php

require "config.php";

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
		echo "<li>Created Pet table";

	} catch (PDOException $e) {
		error_log($e->getMessage());
		echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
	}