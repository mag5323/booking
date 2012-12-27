<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-TW">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="bootstrap/css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" type="text/css" />
	<title>Booking System</title>
	
	<script type="text/javascript">
		$(document).ready(function(){
			//ModalForm設定
			$('#signup').dialog({
				autoOpen:false,
				modal:true,
				resizable:false
			});
			
			$('#signupbt').click(function(){
				$('#signup').dialog('open');
			});
		});
	</script>
		
</head>

<body>	
	<form method="post" class="form-horizontal" action="index.php?redirect=<?php echo @$_GET['redirect'];?>">

		<fieldset>
			<legend>Login</legend>			
			<div class="control-group">
				<label  class="control-label" for="account">學號</label>	
				<div class="controls">				
					<input type="text" placeholder="SID" name="account" />						
				</div>
			</div>
			
			<div class="control-group">
				<label  class="control-label" for="password">密碼</label>
				<div class="controls">				
					<input type="password" placeholder="Password" name="password" />
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">
					<input type="submit" class="btn" value="Login" name="login"/>
					<input type="button" class="btn" id="signupbt" value="Sign up"/>			
				</div>
			</div>
		</fieldset>		
	</form>	
	
	<div id="signup" class="disappear" title="Sign Up">
		<form method="post" action="index.php">
		
			<label for="account">帳號</label>		
			<input type="text" placeholder="s0000000" name="account" />	
			
			<label for="password">密碼</label>
			<input type="password" placeholder="Password" name="password" />
			
			<label for="name">姓名</label>
			<input type="text" placeholder="Name" name="name" />
			
			<input type="submit" class="btn" name="signup" value="Submit" />
		</form>
	</div><!--end of #signup-->
</body>
</html>