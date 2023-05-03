<?php

require "config.php";

use App\Pet;

try {
 	Pet::register('Lucy', 'Female', '2016-02-14', 'Mike Davis', 'mike.davis@example.com', '654 Pine St., Anytown, USA', '555-7890');    
	
	$pets = [    
	['name' => 'Fluffy', 'gender' => 'Female', 'birthdate' => '2019-04-15', 'owner' => 'John Smith', 'email' => 'john.smith@example.com', 'address' => '123 Main St., Anytown, USA', 'contact_number' => '555-1234'],
    ['name' => 'Fido', 'gender' => 'Male', 'birthdate' => '2018-10-05', 'owner' => 'Jane Doe', 'email' => 'jane.doe@example.com','address' => '456 Elm St., Anytown, USA','contact_number' => '555-5678'],
    ['name' => 'Max','gender' => 'Male','birthdate' => '2020-01-01','owner' => 'Bob Johnson','email' => 'bob.johnson@example.com', 'address' => '789 Oak St., Anytown, USA', 'contact_number' => '555-9012']
	];
	Pet::registerMany($pets);
} catch (PDOException $e) {
	error_log($e->getMessage());
	echo "<h1 style='color: red'>" . $e->getMessage() . "</h1>";
}

