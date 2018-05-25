<?php
date_default_timezone_set('Asia/Kolkata');
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
?>
<script src="js/JQuery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".butt").click(function() {
		
		var button=this;
       
		
		$.ajax({
			url:"cartadd.php",
			type:"POST",
			dataType:"html",
			data:{menu_name:$(button).siblings('[name="item"]').attr("id"),
					res_id:$(button).siblings('[name="res_id"]').attr("id"),
					menu_price:$(button).siblings('[name="price"]').attr("id")},
			success: function()
			{
				alert("Item added to cart!");
				
			}
		});
		
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(".downButton").click(function() {
		var menu=$(this).attr('value');
		$('#'+menu).slideDown();
	});
		
		
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(".upButton").click(function() {
		var menu=$(this).attr('value');
		$('#'+menu).slideUp();
	});
		
		
});
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
	<title>Menu</title>
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
   <link rel="stylesheet" type="text/css" href="css/formdesign.css">
   

   <!-- Script
   =================================================== -->
	<script src="js/modernizr.js"></script>
    <script src="js/formdesign.js"></script>

   <!-- Favicons<link rel="stylesheet" type="text/css" href="css/formdesign.css">
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
                
	         </ul> 

	      </nav> <!-- /nav-wrap -->	      

	   </div> <!-- /header-inner -->

   </header>


   
<br>
<br>



   <!-- Content
   ================================================== -->
<div style="height:1200px; background-color:#e4e4e4">
<?php
if(isset($_POST['Menu']))
{
	$res_id=$_POST['res_id'];
}
$res_id=$_POST['res_id'];

require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	
	mysql_select_db($database,$con);
	
	mysql_query("UPDATE popular SET visit=visit+1 WHERE res_id='$res_id'");
	if(isset($_SESSION["sess_user"]))
	{
	$user_name=$_SESSION["sess_user"];
	mysql_query("INSERT into user_favourite VALUES('$user_name','$res_id',now())");
	}
	$query=mysql_query("SELECT * FROM restaurant WHERE res_id='$res_id'") or die(mysql_error());
	
} 
if($arr=mysql_fetch_array($query))
{

echo '	<div style=" background-image:url(images/hero-bg.jpg); height:130px; width:100%">';
echo '<br>';
echo '		<!--  top bar -->';

echo '		<div style="width:15% ; float:left ; margin-left:100px">';
echo '			<img src="data:image;base64,'.$arr["res_image"].'"" height="250px" width="250px" style="border:hidden; border-top-left-radius:20px; border-top-right-radius:20px; border-bottom-left-radius:20px; border-bottom-right-radius:20px;">';
echo '		</div>';

echo '		<div style="width:30% ; float:left ; margin-left:10px">';
echo '			<h1 style="color:#FFF">'.$arr["res_name"].'</h1>';
echo '			<h3 style="color:#FFF">'.$arr["res_locality"].'</h3>';

 
				
echo '		</div>';
echo '	</div>';
	
echo '	<div style="height:1200px; width:100%; clear:both ;">   '; 
echo '  	<br>';
echo '  	<div style="width:18%; background-color:#fff; float:left; margin-left:100px; border:hidden; border-top-left-radius:20px; border-top-right-radius:20px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; ">';

				$query2=mysql_query("SELECT * FROM menu_category WHERE res_id='$res_id'") or die(mysql_error());
echo '				<div style="margin:10px;">';
echo '<b>ADDRESS<br></b>';
echo $arr["res_address"];
echo '<br><br><b>CUISINE<br></b>';

				$query1=mysql_query("SELECT * FROM cuisine WHERE res_id='$res_id'") or die(mysql_error());
				while($arr1=mysql_fetch_array($query1))
				{
echo '				'.$arr1["res_cuisine"].'/ ';
				}
echo '<br><br><b>DISCOUNTS AVAILABLE:</b>';
$d=mysql_query("SELECT * FROM discount WHERE res_id='$res_id'") ;
	while($d1=mysql_fetch_array($d))
	{
		$s=date("h:i p",strtotime($d1["start"]));
		$c=date("h:i p",strtotime($d1["close"]));
		echo '	<b><font color="#CC0000">-'.$d1["discount"].'%<br></font></b> between<b> '.$s.'m</b> and <b>'.$c.'m </b> for a minimum order of <b><br>Rs. '.$d1["min_price"].'/-</b><br> ';
	}

/*$r=mysql_query("SELECT * FROM ");
echo		'<br><br><br>Rate the restaurant: <input type="number" max="5" min="1"/>';
echo		'<br>Rate us: <input type="number" max="5" min="1"/>';

*/
echo '				</div>';


echo '    	</div>';


echo '   	<div style="width:60%; float:left;  padding:10px; background-color:#fff; margin-left:15px; border:hidden; border-top-left-radius:20px; border-top-right-radius:20px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; overflow:hidden; height:900px">';
				$query2=mysql_query("SELECT * FROM menu_category WHERE res_id='$res_id'") or die(mysql_error());
				while($arr2=mysql_fetch_array($query2))
				{
echo '				<div style="clear:both; background-color:#5f5f5f; color:#FFF; margin:15px; border:hidden; border-top-left-radius:20px; border-top-right-radius:20px; border-bottom-left-radius:20px; border-bottom-right-radius:20px;" id="'.$arr2["menu_cat"].'">'; 
$cat=$arr2["menu_id"];
echo '			    	<b><center>'.$arr2["menu_cat"].'<input type="image" src="images/up.png" class="upButton" value="'.$cat.'"/>    <input type="image" src="images/down.png" class="downButton" value="'.$cat.'"/></center>';
echo '				</div>';
						

						$query3=mysql_query("SELECT * FROM menu WHERE menu_id='$cat' and res_id='$res_id'") or die(mysql_error());
						echo '<div class="targetDiv" id="'.$cat.'">';
						while($arr3=mysql_fetch_array($query3))
						{
echo '						<div style="width:65%; vertical-align:center;  margin-left:40px; float:left ;" >';
echo '							'.$arr3["menu_name"].'';
echo '						</div>';
echo '						<div style="width:15%; float:left">';
echo '							Rs. '.$arr3["menu_price"].'/-';
echo '						</div>';
echo '						<div style="width:10% ; height:25px; float:left ;">';
echo '							<span class="butt_multiple">';
echo '								<input type="hidden" name="item" id="'.$arr3["menu_name"].'"/>';
echo '								<input type="hidden" name="res_id" id="'.$res_id.'"/>';
echo '								<input type="hidden" name="price" id="'.$arr3["menu_price"].'"/>';
echo '								<input class="butt" type="image" src="images/addtocart-green-4.png" style="height:20px" border="0" name="cart">';
echo '							</span>';
echo '						</div>';

						}
						echo '</div>';
				}
}
echo '   	</div>';


?>
    <div style="float:left; margin-left:15px">
    <form action="account.php" method="post">
    <input type="image" src="images/cart_big.png" style="height:60px ; width:60px" value="Cart" name="checkout" style="position:fixed; margin-right:0px"/>
    </form>
    <br>
            
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
                  MSS HALL OF RESIDENCE<br>
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