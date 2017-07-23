<?php
try{
		$dsn = "mysql:dbname=kasiclassifieds";
		$username = "root";
		$password = "";
		$conn = new PDO( $dsn, $username, $password );
		} 
			catch ( PDOException $e ){
			echo "Connection failed: " . $e-> getMessage();
  }

   ?>