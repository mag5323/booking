<?php 
	require("/function/PDO.php");		//連結資料庫
	require("/function/function.php");	//時間,session設定
	
	if(!empty($_GET['OID'])){
		$inorder = sql_q("SELECT * FROM inorder WHERE OID = ? ", array($_GET['OID']));
		$orders = sql_q("SELECT * FROM orders WHERE OID = ? ", array($_GET['OID']));		
	}
	
	include("vieworder.tpl.php");
?>