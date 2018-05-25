<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(isset($_SESSION["sess_user"]))
{

$menu_name= $_POST['name'];
$order_date= $_POST['date'];
$qty=$_POST['quantity'];
require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	
	mysql_select_db($database,$con);
	$query=mysql_query("UPDATE user_order_cart SET quantity='$qty', total_price=price*quantity WHERE order_date='$order_date' and menu_name='$menu_name'") or die(mysql_error());
	//}
	mysql_close($con);
	
}
}
?>