<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(!isset($_SESSION["sess_user"]))
{
	header('location:login.php');
}
$user_name=$_SESSION["sess_user"];
if(!strcmp($user_name,"admin"))
{
	header('location:admin.php');
}
?>
<script src="js/JQuery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".butt").click(function() {
		var button=this;
       
		
		$.ajax({
			url:"cartmod.php",
			type:"POST",
			dataType:"html",
			data:{name:$(button).siblings('[name="item"]').attr("id"),
					date:$(button).siblings('[name="date"]').attr("id"),
					quantity:$(button).siblings('[name="qty"]').attr("value")},
			success: function()
			{
				location.reload();
			}
		});
		
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $(".butt1").click(function() {
		var button=this;
       
		
		$.ajax({
			url:"cartdel.php",
			type:"POST",
			dataType:"html",
			data:{name:$(button).siblings('[name="item"]').attr("id"),
					date:$(button).siblings('[name="date"]').attr("id"),
					quantity:$(button).siblings('[name="qty"]').attr("value")},
			success: function()
			{
				location.reload();
			}
		});
		
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
	<title>Account</title>
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

				<h2 style="color:#FFF">Hola, <?php echo $_SESSION["sess_user"] ?></h2>
				<h4 style="color:#F60">Welcome to your Cart!!</h4>

			</div>			    

		</div> <!-- /row -->	   

   </section> <!-- /page-title -->


   <!-- Content
   ================================================== -->
   <section id="cart">
  <div style="width:100% ; height:500px ; background-color:#e4e4e4; ">
  <div  align="center" style="background-color:#000; margin-left:30px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; width:20%; height:50px  ">
  
  	<span><h1 style="color:#FFF;" align="center">Your Cart</h1></span>
  </div>
 
  
  <div style="width:100%;;padding-left:50px;" align="center">
  <div style="width:100%">
  <div style="clear:both">
<div style="background-color:#595b5f; float:left; width:2%; border-top-left-radius:4px; color:#FFF" ><center><b>Sl.</b></center></div>
<div style="background-color:#595b5f; float:left; width:20%; border-left-style:ridge; color:#FFF; border-width:thin" ><center><b>Item Ordered:</b></center></div>
<div style="background-color:#595b5f;float:left; width:20%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Item ordered on:</b></center></div>
<div style="background-color:#595b5f;float:left; width:20%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Item ordered from:</b></center></div>
<div style="background-color:#595b5f;float:left; width:10%; border-left-style:ridge; border-right-style:ridge; border-width:thin; color:#FFF" ><center><b>Item Price</b></center></div>

<div style="background-color:#595b5f;float:left; width:10%; border-top-right-radius:4px;  border-width:thin; color:#FFF" ><center><b>Subtotal</b></center></div>

<div style="background-color:#595b5f;float:left; width:7%; border-top-right-radius:4px; margin-left:10px; border-top-left-radius:4px; color:#FFF"><center><b>Qty</b></center></div>
</div>

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
	$query=mysql_query("SELECT * FROM user_order_cart WHERE user_name='$user_name' AND checkedout='n'") or die(mysql_error());
	
$sum=0;
$count=0;	
while($arr=mysql_fetch_array($query))
{
	$count=$count+1;
echo '<div style="clear:both">';
echo '  	<div style="background-color:#FFF; float:left; width:2%;" ><center><b>'.$count.'</b></center></div>';
echo '  	<div style="background-color:#FFF; float:left; width:20%" ><center>'.$arr["menu_name"].'</center></div>';
echo '  	<div style="background-color:#FFF;float:left; width:20%" ><center>'.$arr["order_date"].'</center></div>';
echo '  	<div style="background-color:#FFF;float:left; width:20%" ><center>'.$arr["res_name"].'</center></div>';
echo '  	<div style="background-color:#FFF;float:left; width:10%" ><center>Rs. '.$arr["price"].'</center></div>';


echo '  	<div id="total price" style="background-color:#FFF;float:left; width:10%" ><center>Rs. '.$arr["total_price"].'</center></div>';
$sum=$sum+$arr["total_price"];
$res_id=$arr["res_id"];
echo '  	<div style="float:left; width:7%; margin-left:10px " ><span class="orders">
<input type="hidden" name="price" id="'.$arr["price"].'"/>
<input type="hidden" name="date" id="'.$arr["order_date"].'"/>
<input type="hidden" name="item" id="'.$arr["menu_name"].'"/>
<input type="number" name="qty" id="'.$arr["quantity"].'" placeholder="'.$arr["quantity"].'" min="1" max="100"/>
<input class="butt" type="image" src="images/refresh.png" border="0" name="cart">

			</span></div>';
echo '  	<div style="float:left; width:3%; margin-left:10px " ><span class="orders">
<input type="hidden" name="price" id="'.$arr["price"].'"/>
<input type="hidden" name="date" id="'.$arr["order_date"].'"/>
<input type="hidden" name="item" id="'.$arr["menu_name"].'"/>
<input class="butt1" type="image" src="images/cross.png" border="0" name="cart">
			</span></div>';


echo '<br>';
}


echo '  </div>';
$c=mysql_query("SELECT res_id,COUNT(DISTINCT res_id) AS restaurants FROM user_order_cart");
if($co=mysql_fetch_array($c))
{
	if($co["restaurants"]==0)
	{
		echo '<div style=" clear:both; height:auto;">';
		echo '<center><h1>Your cart is empty!!!</h1></center>';
		echo '</div>';
		
	}
	elseif($co["restaurants"]==1)
	{



echo '<div style=" clear:both; height:auto">';
echo '<div style="width:67%;float:left; background-color:#CCC; text-align:right; font-size:large;  "><font style="color:#000;">Total</font></div> ';
echo '<div style="width:15%;float:left; font-size: large; background-color:#CCC; font-size:large;"><font style="color:#000;"><center>Rs.'.$sum.'/-</center></font></div> ';

$d=mysql_query("SELECT * FROM discount WHERE res_id='$res_id'");
$discount=0;
		while($di=mysql_fetch_array($d))
		{
	date_default_timezone_set("Asia/Kolkata");
	$start=strtotime($di["start"]);
	$close=strtotime($di["close"]);
	$min_price=$di["min_price"];
	date_default_timezone_set("Asia/Kolkata");
	$date=strtotime(date('H:i:s'));
	$discount=0;
	
			if(($date>=$start) and ($date<=$close))
			{
				if($sum>=$min_price)
				{
		
				$discount=$di["discount"];
				break;
		
				}
				else
				{
					$discount="less than min price";
				}
			}
			else
			{
				$discount=0;
			}
		

	
		}


echo '<div style="width:67%; float:left; background-color:#ccc; text-align:right; font-size:large;  "><font style="color:#000">Discount </font></div> ';
echo '<div style="width:15%; float:left; font-size: large; background-color:#ccc;"><center><font style="color:#900;">- '.$discount.'%</font></center></div> ';

$sum=$sum*(1-($discount/100));
echo '<div style="width:67%; border-bottom-left-radius:4px; float:left; background-color:595b5f; text-align:right; font-size:x-large;  "><font style="color:#FFF">Grand Total </font></div> ';
echo '<div style="width:15%; border-bottom-right-radius:4px; float:left; font-size: x-large; background-color:595b5f;"><center><font style="color:#FFF;">Rs. '.$sum.'/-</font></center></div> ';
echo '</div>';

echo '<div style="width:67%; padding-top:100px;">';
echo '<form action="purchase.php" method="post">';
echo '<input type="hidden" name="total" value="'.$sum.'"/>';
echo '<input type="hidden" name="discount" value="'.$discount.'"/>';
echo '<input type="submit" name="confirm" style="background-color:#090" value="Order Confirm"/>';

echo '</form>';
echo '</div>';

$q1=mysql_query("TRUNCATE TABLE user_order_cart");          //truncate the user_cart table

	}
	else
	{
		echo '<div style=" clear:both; height:auto;">';
		echo '<center><h3 style="color:red;">One restaurant at a time please!!!</h3></center>';
		echo '<center><h4>Delete all other restaurants</h4></center>';
		echo '</div>';
	}
}
}



?>
		
		</div>
        </div>
        </div>
        


</section>


<!--
<section id="cart">  -->
<!--<hr style="border:none; background-color:#0e1015; margin:none; width:100%">  -->
 <!-- <div style="width:100% ; height:500px ; background-color:#f0f4ff; ">
  	<div  align="center" style="background-color:#0e1015; margin-left:30px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; width:20%; height:50px  ">
  	-->
<!--  		<span><h1 style="color:#FFF;" align="center">Active Orders</h1></span>
  	</div>
 
  
  	<div style="width:100%; padding-left:100px;  height: 400px; " align="center"; >
  		<div style="width:100%; overflow-style:marquee-line; overflow:auto; height:400px; ">
  			<div style="clear:both">
				<div style="background-color:#595b5f; float:left; width:2%; border-top-left-radius:4px; color:#FFF" ><center><b>Sl.</b></center></div>
				<div style="background-color:#595b5f; float:left; width:15%; border-left-style:ridge; color:#FFF; border-width:thin" ><center><b>Item Ordered</b></center></div>
				<div style="background-color:#595b5f;float:left; width:15%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Item ordered on:</b></center></div>
				<div style="background-color:#595b5f;float:left; width:15%; border-left-style:ridge; border-width:thin; color:#FFF"><center><b>Item Ordered From:</b></center></div>
				<div style="background-color:#595b5f;float:left; width:10%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Item Price</b></center></div>
				<div style="background-color:#595b5f;float:left; width:5%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Qty</b></center></div>  -->
			<!--	<div style="background-color:#595b5f;float:left; width:10%; border-left-style:ridge; border-right-style:ridge; border-width:thin; color:#FFF" ><center><b>Discount</b></center></div>  -->
			<!--	<div style="background-color:#595b5f;float:left; width:10%; border-top-right-radius:4px;  border-width:thin; color:#FFF" ><center><b>Final Price</b></center></div>


			</div>  -->
           

  <?php
  /*require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	
	mysql_select_db($database,$con);
	$query=mysql_query("SELECT order_date,menu_name,quantity,res_name,price,discount,total_price FROM user_active WHERE user_name='$user_name'") or die(mysql_error());
	$query2=mysql_query("SELECT order_date,menu_name,quantity,res_name,price,discount,total_price FROM user_active WHERE user_name='$user_name'") or die(mysql_error());
	date_default_timezone_set("Asia/Kolkata");
	$cur_time=strtotime(date('H:i:s'));
	if($t=mysql_fetch_array($query));
	{
		if((($cur_time-strtotime($t["order_date"]))/60)<20)	
		{

$count=0;	
while($arr=mysql_fetch_array($query2))
{
	$count=$count+1;
echo '		<div style="clear:both; ">';
echo '  		<div style="background-color:#FFF; float:left; width:2%;" ><center><b>'.$count.'</b></center></div>';
echo '  		<div style="background-color:#FFF; float:left; width:15%" ><center>'.$arr["menu_name"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:15%" ><center>'.$arr["order_date"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:15%" ><center>'.$arr["res_name"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:10%" ><center>Rs. '.$arr["price"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:5%" ><center>'.$arr["quantity"].'</center></div>';
//echo '  		<div style="background-color:#FFF;float:left; width:10%" ><center>'.$arr["discount_offered"].' %</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:10%" ><center>Rs. '.$arr["total_price"].'/-</center></div>';
}
echo '<form action="purchase2.php" method="post">';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<input type="submit" name="confirm" style="background-color:#C03" value="Delete Order"/>';

echo '</form>';

		}
		else
		{
			echo '<div style=" clear:both; height:auto;">';
			echo '<center><h3 style="color:red;">No active orders!!!</h3></center>';
			echo '</div>';
			$fquery=mysql_query("INSERT INTO user_purchase SELECT * FROM user_active WHERE user_name='$user_name'") or die(mysql_error());
			$fquery2=mysql_query("DELETE FROM user_active WHERE user_name='$user_name'") or die(mysql_error());
			
		}
	}
}

echo '  	</div>';*/
?>

<!--
		
		</div>   -->
<!--	</div>  
</div>


</section>
-->

<!--

<section id="cart">
<hr style="border:none; background-color:#0e1015; margin:none; width:100%">
  <div style="width:100% ; height:500px ; background-color:#f0f4ff; ">
  	<div  align="center" style="background-color:#0e1015; margin-left:30px; border-bottom-left-radius:20px; border-bottom-right-radius:20px; width:20%; height:50px  ">
  
  		<span><h1 style="color:#FFF;" align="center">Order History</h1></span>
  	</div>
 
  
  	<div style="width:100%; padding-left:100px;  height: 400px; " align="center"; >
  		<div style="width:100%; overflow-style:marquee-line; overflow:auto; height:400px; ">
  			<div style="clear:both">
				<div style="background-color:#595b5f; float:left; width:2%; border-top-left-radius:4px; color:#FFF" ><center><b>Sl.</b></center></div>
				<div style="background-color:#595b5f; float:left; width:15%; border-left-style:ridge; color:#FFF; border-width:thin" ><center><b>Item Ordered</b></center></div>
				<div style="background-color:#595b5f;float:left; width:15%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Item ordered on:</b></center></div>
				<div style="background-color:#595b5f;float:left; width:15%; border-left-style:ridge; border-width:thin; color:#FFF"><center><b>Item Ordered From:</b></center></div>
				<div style="background-color:#595b5f;float:left; width:10%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Item Price</b></center></div>
				<div style="background-color:#595b5f;float:left; width:5%; border-left-style:ridge; border-width:thin; color:#FFF" ><center><b>Qty</b></center></div>
				<div style="background-color:#595b5f;float:left; width:10%; border-left-style:ridge; border-right-style:ridge; border-width:thin; color:#FFF" ><center><b>Discount</b></center></div>
				<div style="background-color:#595b5f;float:left; width:10%; border-top-right-radius:4px;  border-width:thin; color:#FFF" ><center><b>Final Price</b></center></div>


			</div>
           
-->
  <?php
 /* require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	
	mysql_select_db($database,$con);
	$query=mysql_query("SELECT * FROM user_purchase WHERE user_name='$user_name'") or die(mysql_error());

$count=0;	
while($arr=mysql_fetch_array($query))
{
	$count=$count+1;
echo '		<div style="clear:both; ">';
echo '  		<div style="background-color:#FFF; float:left; width:2%;" ><center><b>'.$count.'</b></center></div>';
echo '  		<div style="background-color:#FFF; float:left; width:15%" ><center>'.$arr["menu_name"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:15%" ><center>'.$arr["date"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:15%" ><center>'.$arr["res_name"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:10%" ><center>Rs. '.$arr["price"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:5%" ><center>'.$arr["quantity"].'</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:10%" ><center>'.$arr["discount_offered"].' %</center></div>';
echo '  		<div style="background-color:#FFF;float:left; width:10%" ><center>Rs. '.$arr["final_price"].'/-</center></div>';
}
}

echo '  	</div>';*/
?>

<!--
		
		</div>
	</div>
</div>
       


</section>
-->



<!-- ============================================== -->

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
                  Plot No. S2H6</br>
                  Chhend Colony<br>
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
         <p class="copyright">Website Design and Development Credits:<a href=""> THE ARC TEAM<a></br>&copy
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