<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(strcmp($_SESSION["sess_user"],"admin"))
{
	header('location:login.php');
}

if (isset($_POST['res'])) 
{
	$res_id=$_POST['res_id'];
	$res_name=$_POST['res_name'];
	$res_address=$_POST['res_address'];
	
	$res_openingtime=$_POST['res_openingtime'];
	$res_closingtime=$_POST['res_closingtime'];
	$res_city=$_POST['res_city'];
	$res_locality=$_POST['res_locality'];
	$res_id=$_POST['res_id'];
	
	$res_mail=$_POST['res_mail'];
	$res_halal=$_POST['res_halal'];
	$res_discount=$_POST['res_discount'];
	
	if(getimagesize($_FILES['res_image']['tmp_name'])==FALSE)
	{
		echo 'please upload an image';
	}
	else
	{
		$res_image=addslashes($_FILES['res_image']['tmp_name']);
		$res_imagename=addslashes($_FILES['res_image']['name']);
		$res_image=file_get_contents($res_image);
		$res_image=base64_encode($res_image);
	}
	
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	
	$res=mysql_query("INSERT INTO restaurant values('$res_id','$res_name','$res_address','$res_openingtime','$res_closingtime','$res_image','$res_city','$res_locality','$res_imagename','$res_mail','$res_halal','$res_discount')") or die(mysql_error());
	mysql_query("INSERT INTO popular values('$res_id',0)");
	mysql_close($con);
	 
}
if (isset($_POST['mod_res'])) 
{
	$res_id=$_POST['res_id'];
	$res_name=$_POST['res_name'];
	$res_address=$_POST['res_address'];
	
	$res_openingtime=$_POST['res_openingtime'];
	$res_closingtime=$_POST['res_closingtime'];
	$res_city=$_POST['res_city'];
	$res_locality=$_POST['res_locality'];
	$res_id=$_POST['res_id'];
	
	$res_mail=$_POST['res_mail'];
	$res_halal=$_POST['res_halal'];
	
	if(getimagesize($_FILES['res_image']['tmp_name'])==FALSE)
	{
		echo 'please upload an image';
	}
	else
	{
		$res_image=addslashes($_FILES['res_image']['tmp_name']);
		$res_imagename=addslashes($_FILES['res_image']['name']);
		$res_image=file_get_contents($res_image);
		$res_image=base64_encode($res_image);
	}
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	mysql_query("DELETE FROM restaurant WHERE res_id='$res_id'");
	$res=mysql_query("INSERT INTO restaurant values('$res_id','$res_name','$res_address','$res_openingtime','$res_closingtime','$res_image','$res_city','$res_locality','$res_imagename','$res_mail','$res_halal','$res_discount')") or die(mysql_error());
	
	mysql_close($con);
	 
}

if (isset($_POST['discount_add'])) 
{
	$res_id=$_POST['res_id'];
	$start=$_POST['start'];
	$close=$_POST['close'];
	$min_price=$_POST['min_price'];
	$discount=$_POST['discount'];
	
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	
	$res=mysql_query("INSERT INTO discount values('$res_id','$start','$close','$min_price','$discount')");
	mysql_close($con);
	 
}

if (isset($_POST['menu_category'])) 
{
	$res_id=$_POST['res_id'];
	$menu_id=$_POST['menu_id'];
	$menu_cat=$_POST['menu_cat'];
	
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	
	$res=mysql_query("INSERT INTO menu_category values('$res_id','$menu_id','$menu_cat')");
	mysql_close($con);
	 
}
if (isset($_POST['mod_menu_category'])) 
{
	$res_id=$_POST['res_id'];
	$menu_id=$_POST['menu_id'];
	$menu_cat=$_POST['menu_cat'];
	
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	mysql_query("DELETE FROM menu_category WHERE res_id='$res_id' and menu_id='menu_id'");
	$res=mysql_query("INSERT INTO menu_category values('$res_id','$menu_id','$menu_cat')");
	mysql_close($con);
	 
}

if (isset($_POST['menu_item'])) 
{
	$res_id=$_POST['res_id'];
	$menu_id=$_POST['menu_id'];
	$menu_name=$_POST['menu_name'];
	$menu_price=$_POST['menu_price'];
	
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	mysql_query("DELETE FROM menu WHERE res_id='$res_id' and menu_id='menu_id' and menu_name='$menu_name'");
	$res=mysql_query("INSERT INTO menu values('$menu_id','$menu_name','$menu_price','$res_id')");
	mysql_close($con);
	 
}
if (isset($_POST['mod_menu_item'])) 
{
	$res_id=$_POST['res_id'];
	$menu_id=$_POST['menu_id'];
	$menu_name=$_POST['menu_name'];
	$menu_price=$_POST['menu_price'];
	
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	
	$res=mysql_query("INSERT INTO menu values('$menu_id','$menu_name','$menu_price','$res_id')");
	mysql_close($con);
	 
}
if (isset($_POST['cuisine'])) 
{
	$res_id=$_POST['res_id'];
	$res_cuisine=$_POST['res_cuisine'];
	
	
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	
	$res=mysql_query("INSERT INTO cuisine values('$res_id','$res_cuisine')");
	mysql_close($con);
	 
}
?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Administrator</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/media-queries.css">         

   <!-- Script
   =================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- Favicons
	=================================================== -->
	<link rel="shortcut icon" href="favicon.png" >

</head>

<body>

	<div id="top"></div>
   <div id="preloader"> 
	   <div id="status">
         <img src="images/loader.gif" height="60" width="60" alt="">
         <div class="loader">Loading...</div>
      </div>
   </div>

   <!-- Header
   =================================================== -->
   <header id="main-header">

   	<div class="row header-inner">

	      <div class="logo">
	         <a href="index.php">Puremedia.</a>
	      </div>

	      <nav id="nav-wrap">         
	         
	         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
	         	<span class='menu-text'>Show Menu</span>
	         	<span class="menu-icon"></span>
	         </a>
         	<a class="mobile-btn" href="#" title="Hide navigation">
         		<span class='menu-text'>Hide Menu</span>
         		<span class="menu-icon"></span>
         	</a>         

	         <ul id="nav" class="nav">
	            <li><a href="index.php#hero">Home</a></li>
		         <li><a href="logout.php">Sign Out</a></li>
	            
	         </ul> 

	      </nav> <!-- /nav-wrap -->	      

	   </div> <!-- /header-inner -->

   </header>


   <!-- Page Title
   ================================================== -->
   
   <!-- Content
   ================================================== -->
    <div style="height:1000px; background-color:white">
   <br>
   <br>
   <br>
<div style="float:left; width:33%; margin-left:10px;">
   <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table title="add restaurant"align="left" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>Id</td>
<td><input type="text" name="res_id"/></td>
</tr>

<!----- Last Name ---------------------------------------------------------->
<tr>
<td>Name</td>
<td><input type="text" name="res_name"/></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="res_address"/></td>
</tr>


<tr>
<td>Opening time</td>
<td><input type="time" name="res_openingtime"/></td>
</tr>

<tr>
<td>Closing Time</td>
<td><input type="time" name="res_closingtime"/></td>
</tr>

<tr>
<td>Enter City</td>
<td><input type="text" name="res_city"/></td>
</tr>

<tr>
<td>Enter Locality</td>
<td><input type="text" name="res_locality"/></td>
</tr>
<tr>
<td>Halal? (y for yes, n for no)</td>
<td><input type="text" name="res_halal"/></td>
</tr>
<tr>
<td>Enter max discount</td>
<td><input type="text" name="res_discount"/></td>
</tr>

<tr>
<td>Enter image</td>
<td><input type="file" name="res_image"/></td>
</tr>


<td>Enter E mail</td>
<td><input type="text" name="res_mail"/></td>
</tr>
<tr>
<td><input type="submit" value="add restaurant" name="res"/></td><td> <input type="submit" value="Modify restaurant" name="mod_res"/></td>
</tr>
</table>
   </form>
   </div> <!-- add restaurant-->
   
   
   
   <div style="float:left; width:30%; margin-left:10px;">
   <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table title="add restaurant"align="left" cellpadding = "10">
<tr>
<td>Restaurant ID</td>
<td><input type="text" name="res_id"/></td>
</tr>
<tr>
<td>Cuisine</td>
<td><input type="text" name="res_cuisine"/></td>
</tr>
<tr>
<td><input type="submit" value="add cuisine" name="cuisine"/></td>
</tr>

</table>
</form>
<br>
<br>
<br>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table title="add restaurant"align="left" cellpadding = "10">
<tr>
<td>Restaurant ID</td>
<td><input type="text" name="res_id"/></td>
</tr>
<tr>
<td>Discount start time</td>
<td><input type="time" name="start"/></td>
</tr>
<tr>
<td>Discount close time</td>
<td><input type="time" name="close"/></td>
</tr>

<tr>
<td>Min Price</td>
<td><input type="text" name="min_price"/></td>
</tr>

<tr>
<td>Discount</td>
<td><input type="text" name="discount"/></td>
</tr>

<tr>
<td><input type="submit" value="add discount" name="discount_add"/></td>
</tr>

</table>
</form>
</div>
   <!-- =================================== -->
   
   
   <div style="float:left; width:33%; margin-left:10px;">
   <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table title="add restaurant"align="left" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>Restaurant ID</td>
<td><input type="text" name="res_id"/></td>
</tr>

<!----- Last Name ---------------------------------------------------------->
<tr>
<td>Menu ID</td>
<td><input type="text" name="menu_id"/></td>
</tr>

<tr>
<td>Menu Category</td>
<td><input type="text" name="menu_cat"/></td>
</tr>


<tr>
<td><input type="submit" value="add menu category" name="menu_category"/></td><td><input type="submit" value="Modify menu category" name="mod_menu_category"/></td>
</tr>
</table>
   </form>
    <!-- add menu-->
   
   
   
    <!-- =================================== -->
   
   
   <br>
   <br>
   <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <br>
   <br>
   <br>
<table title="add restaurant"align="left" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->

<tr>
<td>Res ID</td>
<td><input type="text" name="res_id"/></td>
</tr>

<tr>
<td>Menu ID</td>
<td><input type="text" name="menu_id"/></td>
</tr>

<!----- Last Name ---------------------------------------------------------->
<tr>
<td>Menu Name</td>
<td><input type="text" name="menu_name"/></td>
</tr>

<tr>
<td>Menu Price</td>
<td><input type="text" name="menu_price"/></td>
</tr>


<tr>
<td><input type="submit" value="add menu item" name="menu_item"/></td><td><input type="submit" value="modify menu item" name=mod"mod_menu_item"/></td>
</tr>
</table>
   </form>
   </div> <!-- add menu-->
   <hr style="width:100%; ">
   </div> <!-- /content -->  
   


   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">       

         <div class="six columns tab-whole footer-about">
				
				<h3>About Puremedia</h3>
               
            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
            nibh id elit. 
            </p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
            	incididunt ut labore et dolore magna aliqua.</p>        

         </div> <!-- /footer-about -->

         <div class="six columns tab-whole right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Contact Us</h3>
                  <p>
                  1600 Amphitheatre Parkway<br>
                  Mountain View, CA<br>
                  94043 US
                  </p>

                  <ul>
                    <li><a href="tel:6473438234">647.343.8234</a></li>
                    <li><a href="tel:1234567890">123.456.7890</a></li>
                    <li><a href="mailto:someone@puremedia.com">someone@puremedia.com</a></li>
                  </ul>                  
               </div> <!-- /columns -->             

               <div class="columns last">
                  <h3 class="contact">Follow Us</h3>

                  <ul>
                     <li><a href="#">Facebook</a></li>
                     <li><a href="#">Twitter</a></li>
                     <li><a href="#">GooglePlus</a></li>
                     <li><a href="#">Instagram</a></li>
                     <li><a href="#">Flickr</a></li>
                     <li><a href="#">Skype</a></li>
                  </ul>
                  
               </div> <!-- /columns --> 

            </div> <!-- /Row(nested) -->

         </div>

         <p class="copyright">&copy; Copyright 2014 Puremedia. Design by <a href="http://www.styleshout.com/">Styleshout.</a></p>        

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"><span>Top</span><i class="fa fa-long-arrow-up"></i></a>
         </div>

      </div> <!-- /row -->

   </footer> <!-- /footer -->


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>   
   <script src="js/jquery.flexslider.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/backstretch.js"></script> 
   <script src="js/waypoints.js"></script>  
   <script src="js/main.js"></script>

</body>

</html>