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
</head>

<body>		
	<ul id="navi">
		<li><a href="order.php">訂單列表</a></li>
		<li><a href="logout.php">logout</a></li>
		<li><p class="hello"><i class="icon-user"></i><strong> Hello! <?php echo $_SESSION['name']?></strong></p></li>
	</ul>
	
	<h3><?php echo $orders[0]['book_title']. " - ". $orders[0]['author'];?></h3>
	
	<table class="table table-hover small">
		<tr>
			<th>訂購者</th>
			<th>數量</th>
		</tr>
		
		<?php
			$total = 0;
			foreach($inorder as $item){			
				$user = sql_q("SELECT name FROM users WHERE account = ? ", array($item['account']));		
		?>
		<tr>
			<td><?php echo $user[0]['name'];?></td>
			<td><?php echo $item['number'];?></td>			
		</tr>		
		<?php 
				$total += $item['number'];
			} 
		?>
		
		<tr>
			<td>Total x Price</td>
			<td><?php echo $total." x ".$orders[0]['price']." = ".$total*$orders[0]['price'];?></td>
		</tr>
	</table>
</body>
</html>