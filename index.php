<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-TW">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="script/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="bootstrap/css/bootstrap.css" />
	<title>Booking System</title>
</head>

<body>	
	<form method="post" class="form-horizontal" action="login.php?redirect=">

		<fieldset>
			<legend>Login</legend>
			
			<div class="control-group">
				<label for="account" class="control-label">UserID</label>						
				
				<div class="controls">
					<input type="text" class="input-small" placeholder="Account" name="account" />					
				</div><!--end of .controls-->					
				
			</div><!--end of .control-group-->
			
			<div class="control-group">
				<label for="password" class="control-label">Password</label>							
				
				<div class="controls">
					<input type="password" id="inputPassword" class="input-small" placeholder="Account" name="password" />
				</div><!--end of .controls-->
				
			</div><!--end of .control-group-->
			
			<input name="submit" type="submit" value="Login"/>
			
		</fieldset>
		
	</form>	
</body>
</html>