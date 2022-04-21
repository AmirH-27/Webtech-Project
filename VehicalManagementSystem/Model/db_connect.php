<?php
	function db_conn(){
    	$servername = "localhost";
    	$username = "root";
    	$password = "";
    	$dbname = "vehicalmanage";

        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
		return $connection; 
    }
?>