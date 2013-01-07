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
			$('#placeorder').dialog({
				autoOpen:false,
				modal:true,
				resizable:false,
				title:"Place an order"
			});
			
			$('#editprofile').dialog({
				autoOpen:false,
				modal:true,
				resizable:false,
				title:"Edit profile"
			});
						
			$('#inorder').dialog({
				autoOpen:false,
				modal:true,
				resizable:false				
			});
			
			//Calendar設定
			$('#end').datepicker({minDate: 0});
			
			//點擊開單或個人資訊顯示Modal form
			$('#placeorderbtn').click(function(){
				$('#placeorder').dialog('open');
			});
			
			$('#editprofilebtn').click(function(){
				$('#editprofile').dialog('open');
			});			
			
			//刪除訂單
			$('.del').click(function(){
				var id = $(this).attr('class').split(' ');
				if(!confirm('Are you sure?')){
					e.preventDefault();
				}		
				$.post("order.php",{'delOID':id[2]},function(data){window.location.reload();});
			});
			
			//訂購
			$('.buy').click(function(){
				var id = $(this).attr('class').split(' ');
				var title = $(this).parent().next().text();
				var author = $(this).parent().next().next().text();
				//設定對話視窗的標題為訂單標題及開單人
				$('#inorder').dialog('option','title',title + " - " + author);	
				$('#inorder').dialog('open');	
				$.get("inorder.php",{'OID':id[2]},
					function(data){
						$('#inorder').html(data);
					});
			});
			
			//不是自己開的訂單無法刪除
			$('.notmine').attr('disabled',true);
		});
	</script>
</head>

<body>	
	<ul id="navi">
		<li><a href="#" id="placeorderbtn">開單</a></li>
		<li><a href="#" id="editprofilebtn">個人資訊</a></li>
		<li><a href="logout.php">logout</a></li>
		<li><p class="hello"><i class="icon-user"></i><strong> Hello! <?php echo $_SESSION['name']?></strong></p></li>
	</ul>
	
	<table class="table table-hover big">
		<tr>
			<th>刪除</th>
			<th>訂購</th>
			<th>書名</th>
			<th>作者</th>
			<th>ISBN</th>
			<th>發起人</th>
			<th>截止日期</th>
			<th>單價</th>
		</tr>
		
		<?php
			$password = "";
			$author = "";			
			$myorder = "";
			foreach($orders as $order){
				//檢查該訂單是否為SESSION['acconut']發起的訂單,若為他人的訂單,將$myorder設為'notmine'
				if($_SESSION['account'] !== $order['account']){
					$myorder = "notmine";
				}else{
					$myorder = "mine";
				}
				
				$user = sql_q("SELECT * FROM users WHERE account = ? ", array($order['account']));
				$password = $user[0]['password'];
				$author = $order['author'];				
		?>
		<tr>
			<!--使用$myorder內的字串作為class名稱,再將對應的按鈕disabled.-->
			<td><button class="btn del <?php echo $order['OID']." ".$myorder;?>">Delete</button></td>
			<td><button class="btn buy <?php echo $order['OID'];?>">Buy</button></td>
			<td><a href="vieworder.php?OID=<?php echo $order['OID'];?>"><?php echo $order['book_title'];?></a></td>
			<td><?php echo $author;?></td>			
			<td><?php echo $order['isbn'];?></td>
			<td><?php echo $user[0]['name'];?></td>
			<td><?php echo $order['end']?></td>
			<td><?php echo $order['price']?></td>
		</tr>		
		<?php } ?>
	</table>
	
	<div id="placeorder" class="disappear">
		<form method="post" action="order.php">
			<label for="book_title">書名</label>
			<input type="text" name="book_title" />
			<label for="author">作者</label>
			<input type="text" name="author" />
			<label for="ISBN">ISBN</label>
			<input type="text" name="isbn" />
			<label for="price">單價</label>
			<input type="text" name="price" />
			<label for="end">截止日期</label>
			<input type="text" id="end" name="end" />
			
			<input type="submit" class="btn" name="placeorder" />
		</form>
	</div>
	
	<div id="editprofile" class="disappear">
		<form method="post" action="order.php">
			<label for="name">姓名</label>
			<input type="text" value="<?php echo $_SESSION['name'];?>" name="name"/>
			<label for="password">新密碼</label>
			<input type="password" value="<?php echo $_SESSION['password'];?>" name="password" />
			
			<input type="submit" class="btn" name="editprofile"/>			
		</form>
	</div>
	
	<div id="inorder"></div>
</body>

</html>