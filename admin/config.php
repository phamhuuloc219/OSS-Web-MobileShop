<?php
	const DBHOST = 'localhost';
	const DBUSER = 'root';
	const DBPASS = '';
	const DBNAME = 'mobile_shop';

	$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

	if ($conn->connect_error) {
	  die('Could not connect to the database!' . $conn->connect_error);
	} 
	// else echo "connected sucessfully";
