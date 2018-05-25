<?php
date_default_timezone_set('Asia/Kolkata');
session_start();

if(isset($_SESSION["sess_user"]))
{
$user_name=$_SESSION["sess_user"];
$menu_name= $_POST['menu_name'];
$res_id= $_POST['res_id'];
$menu_price= $_POST['menu_price'];
require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	
	mysql_select_db($database,$con);
	$q=mysql_query("SELECT * FROM restaurant WHERE res_id='$res_id'") or die(mysql_error());
	if($arr=mysql_fetch_array($q))
	{
	$res_name=$arr["res_name"];
	}
	$query=mysql_query("INSERT INTO user_order_cart VALUES('$user_name',now(),'$menu_name','1','$menu_price','$menu_price','n','$res_id','$res_name')") or die(mysql_error());
	//}
	if(!$q)
{
	die(mysql_error());
}
	mysql_close($con);
	
}
}
?>