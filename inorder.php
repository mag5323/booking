<?php
	require("/function/PDO.php");		//連結資料庫
	require("/function/function.php");	//時間,session設定
	
	if(!empty($_GET['OID']))
	{	
?>
	<div class="buybook">
		<form method="post" action="order.php">
			<label for="number">數量</label>
			<input type="text" name="number" />
			<input type="hidden" name="OID" value="<?php echo $_GET['OID'];?>" />
			<input type="submit" class="btn" name="buybook" />
		</form>
	</div>
<?php
	}
?>