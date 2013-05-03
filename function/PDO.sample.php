<?php
	/*
		This file show you how to set your PDO.php
	*/
?>

<?php
	try	{
		$dbh = new PDO('mysql:host=YOURHOST; dbname=booking','root','YOURPASSWORD');
		$dbh -> query("SET NAMES utf8");
	} 
	
	catch (PDOException $e){
		print 'Error!'. $e -> getMessage() .'<br />';
	}
?>