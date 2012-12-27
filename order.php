<?php 
	require("/function/PDO.php");		//連結資料庫
	require("/function/function.php");	//時間,session設定
	isLogin(basename(__FILE__));
	
	if(isset($_POST['placeorder'])){
		if(!empty($_POST['book_title']) AND !empty($_POST['author']) AND !empty($_POST['isbn'])){
			sql_i("INSERT INTO orders VALUES(?,?,?,?,?,?,?,?)", array(
			null, date("m/d/Y"), $_POST['end'], $_POST['price'], $_SESSION['account'], $_POST['book_title'], $_POST['author'], $_POST['isbn']));
		}		
	}
	
	if(isset($_POST['editprofile'])){
		if(!empty($_POST['name']) AND !empty($_POST['password'])){
			sql_i("UPDATE users SET name = ?, password = ? WHERE account = ?", array(
			$_POST['name'], md5($_POST['password']), $_SESSION['account']));
		}
	}
	
	if(isset($_POST['delOID'])){
		sql_i("DELETE FROM orders WHERE OID = ?", array($_POST['delOID']));
	}
	
	if(isset($_POST['buybook'])){
		sql_i("INSERT INTO inorder VALUES(?,?,?,?)", array(null, $_SESSION['account'], $_POST['OID'], $_POST['number']));
	}
	
	$orders = sql_q("SELECT * FROM orders");
	
	include("order.tpl.php");
?>