<?php
	try	{
		$dbh = new PDO('mysql:host=localhost; dbname=booking','root','yourpassword');
		$dbh -> query("SET NAMES utf8");
	} 
	
	catch (PDOException $e){
		print 'Error!'. $e -> getMessage() .'<br />';
	}
?>