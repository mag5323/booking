<?php
	session_start();
	date_default_timezone_set('Asia/Brunei');//設定時區
	
	/*	sql_q()
		SQL query
		input	:SQL語法字串,過濾字串陣列
		return	:SQL query集合fetch()後的陣列	*/
	function sql_q( $sql, $sql_array = null ){
		global $dbh, $tmp_error;
		$sth = $dbh -> prepare($sql);
		$sth -> execute($sql_array);
		if($sth -> errorCode() != '00000'){
			$error = $sth -> errorInfo();
			$tmp_error['message'] =  $error[2];
			return false;
		}
		$result = filter_var_array($sth -> fetchAll(),FILTER_SANITIZE_MAGIC_QUOTES);
		return $result;
	}

	/*	sql_i()
		SQL execute query
		input	:SQL語法字串,過濾字串陣列
		return	:boolean	*/
	function sql_i( $sql, $sql_array ){
		global $dbh, $tmp_error;
		$sth = $dbh -> prepare($sql);
		$sth -> execute($sql_array);
		if($sth -> errorCode() != '00000'){
			$error = $sth -> errorInfo();
			$tmp_error['message'] =  $error[2];
			return false;
		}
		return true;
	}
	
	/*	isLogin()
		檢查是否登入
		input	:$url(basename(__FILE__))
		return	:none	*/	
	function isLogin($url = null){		
		if(empty($_SESSION['account']) || empty($_SESSION['password']))
		{
			header('location:index.php?redirect='.$url);
			exit;
		}
	}
?>