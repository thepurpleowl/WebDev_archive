<?php
date_default_timezone_set('Asia/Kolkata');

session_start();
?>
<script type="text/javascript">

 function dis()
 {
	 x=document.getElementById("sort").value;
	 var city=document.getElementById("res_city").value;
	 var area=document.getElementById("res_area").value;
	 var f="Find";
	  <?php 
	 if(isset($_GET['cuisine']))
	 { ?>
	 var cuisine=document.getElementById("res_cuisine").value;
	 window.location="restaurant.php?city="+city+"&area="+area+"&cuisine="+cuisine+"&option="+x+"&Find="+f;
	<?php } 
	
 	 else
	 { ?>
	 window.location="restaurant.php?city="+city+"&area="+area+"&option="+x+"&Find="+f;
	<?php } ?>
		
 }
 function dis1()
 {
	 var x1=document.getElementById("cuisine").value;
	 var city=document.getElementById("res_city").value;
	 var area=document.getElementById("res_area").value;
	 var option=document.getElementById("res_option").value;
	 
	 var f="Find";
 	 
	 window.location="restaurant.php?city="+city+"&area="+area+"&option="+option+"&cuisine="+x1+"&Find="+f;
		
 }
</script>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Restaurant</title>
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
	<script type="text/javascript" src="js/JQuery.js"></script>
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
           
           
	            <li ><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li class="current"><a  href="index.php">Home</a></li>
		         
                <?php
				if(!isset($_SESSION["sess_user"]))
				{ ?>
	            <li><a href="login.php">Log In</a></li>
                <li><a href="register.php">Sign Up</a></li>	            
	            <li><a class="smoothscroll" href="#foot">Contact Us</a></li>
			<?php }
				else
				{ ?>
					            
	            <li><a class="smoothscroll" href="#foot">Contact Us</a></li>
                <li><a href="account.php">Hola! <?php echo $_SESSION["sess_user"]; ?></a></li>
            
                <li><a href="logout.php">Sign Out</a></li>
                <?php
				}
				?>
	         </ul>  


	      </nav> <!-- /nav-wrap -->	      

	   </div> <!-- /header-inner -->

   </header>


   <!-- Page Title
   ================================================== -->
   <section id="page-title">	
   	  
		<div class="row">

			<div class="twelve columns">

				<h1><?php
				if(isset($_GET['Find']))

{
	$city=$_GET['city'];
	$area=$_GET['area'];} echo $city; ?></h1><hr/>
				<p style="color:#FFF; font-size:24px" ><?php echo $area; ?></p>

			</div>			    

		</div> <!-- /row -->	   

   </section> <!-- /page-title -->


   <!-- Content
   ================================================== -->

  <div style="height:1200px; background-color:#e4e4e4">
  <br>
  
	
    <div style="width:10%; float:left">
    <br>
    </div>
    <div style=" width:13%; float:left;">
	
		<font > Sort By </font>
		<br>
		<div>
  			<select id="sort" onChange="dis()">
    			<option value="res_name">Name</option>
    			<option value="visit">Popularity</option>
    			<option value="res_discount">Discounts</option>
  			</select>
 		</div>
        <br>
        <font > Search Cuisine </font>
		<br>
        <div>
       		<select id="cuisine" onChange="dis1()">
        <?php
		require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	mysql_select_db($database,$con);
	
		 $query1=mysql_query("SELECT DISTINCT res_cuisine FROM cuisine ORDER BY res_cuisine ASC ");		
			while($arr1=mysql_fetch_array($query1))
			{

    			echo '<option value="'.$arr1["res_cuisine"].'">'.$arr1["res_cuisine"].'</option>';
			}
}
			 ?>
             </select>
        </div>
	</div>
	<div style=" background-color:#FFF; width:60%; float:left; border:hidden; border-top-left-radius:20px; border-top-right-radius:20px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; ">
    <div style="margin:10px;  height:1100px; overflow: auto;">
		<div>

<!------------------------------------------------------->			
<?php
if(isset($_GET['Find']))

{
	$city=$_GET['city'];
	$area=$_GET['area'];
	if(isset($_GET['cuisine']))
	{
		$cuisine=$_GET['cuisine'];
	}
	
	$option="res_name";
	if(isset($_GET['option']))
	{
		$option=$_GET['option'];
	}
	
		
}



require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	mysql_select_db($database,$con);
	
	if(!(isset($_GET['cuisine'])))
	{
	if(!strcmp($option,"res_name"))
	{
	
		$query=mysql_query("SELECT * FROM restaurant r WHERE r.res_city='$city' AND r.res_locality='$area' ORDER BY $option ASC") or die(mysql_error());
	}
	elseif(!strcmp($option,"visit"))
	{
		$query=mysql_query("SELECT * FROM restaurant r,popular p WHERE r.res_city='".$city."' AND r.res_locality='".$area."' and r.res_id=p.res_id ORDER BY p.visit DESC") or die(mysql_error());
	}
	
	else
	{
		$query=mysql_query("SELECT * FROM restaurant r WHERE r.res_city='$city' AND r.res_locality='$area' ORDER BY $option  DESC") or die(mysql_error());
	}
	
	}
	else 
	{
		if(!strcmp($option,"res_name"))
	{
	
		$query=mysql_query("SELECT * FROM restaurant r,cuisine c WHERE r.res_city='$city' AND r.res_locality='$area' AND r.res_id=c.res_id AND c.res_cuisine='$cuisine' ORDER BY $option ASC") or die(mysql_error());
	}
	elseif(!strcmp($option,"visit"))
	{
		$query=mysql_query("SELECT * FROM restaurant r,popular p, cuisine c WHERE r.res_city='".$city."' AND r.res_locality='".$area."' and r.res_id=p.res_id AND r.res_id=c.res_id AND c.res_cuisine='$cuisine' ORDER BY p.".$option." DESC") or die(mysql_error());
	}
	elseif(!strcmp($option,"res_minimum"))
	{
		$query=mysql_query("SELECT * FROM restaurant r,cuisine c WHERE r.res_city='$city' AND r.res_locality='$area' AND r.res_id=c.res_id AND c.res_cuisine='$cuisine' ORDER BY $option ASC") or die(mysql_error());
	}
	else
	{
		$query=mysql_query("SELECT * FROM restaurant r,cuisine c WHERE r.res_city='$city' AND r.res_locality='$area' AND r.res_id=c.res_id AND c.res_cuisine='$cuisine' ORDER BY res_discount  DESC") or die(mysql_error());
	}
		
	}
	
	
}
echo '
			<div style="width:100%" >';

while($arr=mysql_fetch_array($query))
{
echo           '<input type="hidden" value="'.$arr["res_city"].'" id="res_city"/>';
echo           '<input type="hidden" value="'.$option.'" id="res_option"/>';

	 if(isset($_GET['cuisine']))
	 {
echo           '<input type="hidden" value="'.$arr["res_cuisine"].'" id="res_cuisine"/>';
	 }
echo           '<input type="hidden" value="'.$arr["res_locality"].'" id="res_area"/>';
echo '			<div style="float:left; width:40%; "><img style="border:hidden; border-top-left-radius:20px; border-top-right-radius:20px; border-bottom-left-radius:20px; border-bottom-right-radius:20px;" src="data:image;base64,'.$arr["res_image"].'" style="height:250px; width:250px"/><h1>'.$arr["res_name"].'</h1><h3>'.$arr["res_address"].'</h3></div>';



echo '          <div style="float:left;width:40%; margin:10px">';

	$res_id=$arr["res_id"];
echo 'CUISINE :<br>';
	$q=mysql_query("SELECT * FROM cuisine WHERE res_id='$res_id'") or die(mysql_error());
	while($a=mysql_fetch_array($q))
	{
		echo '	<b>'.$a["res_cuisine"].'</b>, ';
	}
$h=mysql_query("SELECT * FROM restaurant WHERE res_id='$res_id'") ;
if($h1=mysql_fetch_array($h))
{
if($h1["res_halal"]=='y' || $h1["res_halal"]=='Y')
{
echo '<br>';
echo '<img src="images/halal.png"> ';
}
}
echo '<br><br>';	
	$d=mysql_query("SELECT * FROM discount WHERE res_id='$res_id'") ;
	while($d1=mysql_fetch_array($d))
	{
		$s=date("h:i p",strtotime($d1["start"]));
		$c=date("h:i p",strtotime($d1["close"]));
		echo '	<b><font color="#CC0000">-'.$d1["discount"].'%<br></font></b> between<b> '.$s.'m</b> and <b>'.$c.'m </b> for a minimum order of <br>Rs. '.$d1["min_price"].'/-</b><br> ';
	}


echo           '<br>';

echo           '</div>'; 
echo           '<div style="float:left; width:15%">';  
echo           '	<form action="menu.php" method="post">';
echo           '		<input type="hidden" value="'.$arr["res_id"].'" name="res_id"/>';
echo           '		<input type="submit" value="View Menu" name="Menu"/>';   
echo           '	</form>';   
echo           '</div>';
echo           '<hr style="margin: 0px; width:100%; border-color:#e4e4e4"/>';

echo '<br><br>';           

}
echo '		</div>';


?>     
       
            
 <!------------------------------------------------------->           
		</div>
 	</div>
    </div>
    
            
	<div style=" width:10%; float:left; margin-left:14px">
    <form action="account.php" method="post">
		<input type="image" style="height:60px ; width:60px" src="images/cart_big.png" value="Cart" name="cart" style="position:fixed "/>
        </form>
    </div>
</div>


   <!-- Footer
   ================================================== -->
<footer>
 <section id="foot"
      <div class="row">       

         <div class="six columns tab-whole footer-about">
				
				<h1>féastyfi</h1>
               
            

         </div> <!-- /footer-about -->

         <div class="six columns tab-whole right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Contact Us</h3>
                  <p>
                  D-303</br>
                  MSS Hall of Residence,NIT<br>
                  Rourkela
                  </p>

               <ul>
                  <!-- <li><a href="tel:6473438234">647.343.8234</a></li>
                    <li><a href="tel:1234567890">123.456.7890</a></li>
                    <li><a href="mailto:someonefarhanhaq@Feastify.com">someone@Feastify.com</a></li>-->
                  </ul>                  
               </div> <!-- /columns -->             

               <div class="columns last">
                  <h3 class="contact">Follow Us</h3>

                  <ul>
                     <li><a href="https://www.facebook.com/feastyfi">Facebook</a></li>
                     <li><a href="#">Twitter</a></li>
                     <li><a href="#">LinkedIn</a></li>
                     
                  </ul>
                  
               </div> <!-- /columns --> 

            </div> <!-- /Row(nested) -->

         </div>
         <p class="copyright">Website Design and Development Credits:<a href="">THE ARC TEAM<a></br>&copy
             Copyright 2015 Feastyfi.
         </p>
         

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#hero"><span>Top</span><i class="fa fa-long-arrow-up"></i></a>
         </div>

      </div> <!-- /row -->
      </section>

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