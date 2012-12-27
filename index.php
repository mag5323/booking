<?php
	require("/function/PDO.php");		//連結資料庫
	require("/function/function.php");	//時間,session設定
	
	/*Sign up*/
	if(isset($_POST['signup'])){
		if(!empty($_POST['account']) AND !empty($_POST['password']) AND !empty($_POST['name'])){
			sql_i("INSERT INTO users VALUES(?,?,?)", array($_POST['account'], md5($_POST['password']), $_POST['name']));
		}		
	}
	
	/*Login*/
	if(isset($_POST['login'])){
		if(!empty($_POST['account']) AND !empty($_POST['password'])){
			$success = true;
			
			$users = sql_q("SELECT * FROM users WHERE account = ?", array($_POST['account']));	
			
			if(sizeOf($users)<1){
				echo "尚未註冊";
				$success = false;
			}
			
			if(@$users[0]['password'] !== md5($_POST['password'])){
				$success = false;
			}
			
			if($success){
				session_start();
				$_SESSION['account'] = $_POST['account'];
				$_SESSION['password'] = md5($_POST['password']);
				$_SESSION['name'] = $users[0]['name'];
				
				/*Redirect*/
				if(!empty($_GET['redirect']))
				{
					header("location:".$_GET['redirect']);
					exit;
				}
				
				header("location:order.php");
				exit;
			}
		}
	}
	
	include("index.tpl.php");
?>