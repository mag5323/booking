<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-TW">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="reset.css" />
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" type="text/css" />
	<title>Booking System</title>
	
	<script>
		$(document).ready(function(){
			//ModalForm設定
			$('#signup').dialog({
				autoOpen:false,
				modal:true,
				resizable:false
			});
			
			//點擊註冊後跳出註冊表單
			$('#signupbt').click(function(){
				$('#signup').dialog('open');
			});
		});
	</script>
		
</head>

<body>	
	<div class="container-fluid">
	
	<div class="push-lg"></div>
	<div class="row">
	<!--登入後將使用者導回登入前正在瀏覽之頁面-->
	
	<div class="col-md-5"></div>
	
	<div class="col-md-2">
	<form method="post" role="form" action="index.php?redirect=<?php echo @$_GET['redirect'];?>">

		<fieldset>
			<legend>Login</legend>			
			<div class="form-group">
				<label for="account">學號</label>	
				<input type="text" class="form-control" placeholder="SID" name="account" />		
			</div>
			
			<div class="form-group">
				<label for="password">密碼</label>
				<input type="password" class="form-control" placeholder="Password" name="password" />
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-default" value="Login" name="login"/>
				<input type="button" class="btn btn-default" id="signupbt" value="Sign up"/>		
			</div>
		</fieldset>		
	</form>	
	</div>
	<div class="col-md-5"></div>
	
	<div id="signup" class="disappear" title="Sign Up">
		<form method="post" role="form" action="index.php">
			
			<div class="form-group">
				<label for="account">帳號</label>		
				<input type="text" class="form-control" placeholder="s0000000" name="account" />	
			</div>
			
			<div class="form-group">
				<label for="password">密碼</label>
				<input type="password" class="form-control" placeholder="Password" name="password" />
			</div>
			
			<div class="form-group">
				<label for="name">姓名</label>
				<input type="text" class="form-control" placeholder="Name" name="name" />
			</div>
			
			<input type="submit" class="btn btn-default" name="signup" value="Submit" />
		</form>
	</div><!--end of #signup-->
	
	</div><!--end of .row-->
	</div><!--end of .container-fluid-->
</body>
</html>