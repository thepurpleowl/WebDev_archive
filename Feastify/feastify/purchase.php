<?php
date_default_timezone_set('Asia/Kolkata');	
require 'PHPMailerAutoload.php';


session_start();
if(isset($_POST['confirm']))
{
$total=$_POST['total'];
$user_name=$_SESSION["sess_user"];
$discount=$_POST['discount'];

}
?>
<?php
/*\\require 'cred.php';
$con=mysql_connect($host,$user, $password);
if(!$con)
{
	die(mysql_error());
}
else
{
	mysql_select_db($database,$con);
	$q2=mysql_query("SELECT * FROM user_order_cart WHERE user_name='$user_name' AND checkedout='n' ");
	while($arr=mysql_fetch_array($q2))
	{
		$menu_name=$arr["menu_name"];
		$quantity=$arr["quantity"];
		$res_id=$arr["res_id"];
		$res_name=$arr["res_name"];
		$t=$arr["order_date"];
		$price=$arr["price"];
		$total_price=($price*$quantity)*(1-($discount/100));
	
		
	 	
		
	$q=mysql_query("INSERT INTO user_active VALUES('$user_name',now(),'$menu_name','$quantity','$res_id','$res_name','$price','$discount','$total_price')") or die(mysql_error()); 
	}
	$q2=mysql_query("SELECT DISTINCT res_id FROM user_order_cart WHERE user_name='$user_name' AND checkedout='n'");
	while($arr2=mysql_fetch_array($q2))
	{
		
		$res_id=$arr2["res_id"];
		$q3=mysql_query("SELECT * FROM user_order_cart WHERE user_name='$user_name' AND checkedout='n' AND res_id='$res_id'");
		
		$q4=mysql_query("SELECT * FROM restaurant WHERE res_id='$res_id'");
		
		if($arr4=mysql_fetch_array($q4))
		{
			$send=$arr4["res_mail"];
			$sendname=$arr4["res_name"];
			$subject="Order";
		}
		
		
		$q5=mysql_query("SELECT * FROM users WHERE user_name='$user_name'");
		if($arr5=mysql_fetch_array($q5))
		{
			$first=$arr5["user_first"];
			$user_email=$arr5["user_email"];
			$name=$arr5["user_first"];
			$mobile=$arr5["user_mobile"];
			echo "mail setting done";
			
		}
	
		
    $m='	A order for : <b>Mr./Ms.' .$first.'</b><br><hr>To be made ready within 40 mins</b><br><br>
		<table style="border:1px solid">
			<tr style="border:1px solid">
				<td style="border:1px solid">Item</td><td style="border:1px solid"> Item Price</td><td style="border:1px solid"> Price</td><td style="border:1px solid"> Subtotal</td>
			</tr>';
			 $m2=' <b>Mr./Ms.' .$first.'</b><br><hr>Your order has been placed to be made ready within 40 mins</b><br><br>
		<table style="border:1px solid">
			<tr style="border:1px solid">
				<td style="border:1px solid">Item</td><td style="border:1px solid"> Item Price</td><td style="border:1px solid"> Price</td><td style="border:1px solid"> Subtotal</td>
			</tr>';
$final=0;
		while($arr3=mysql_fetch_array($q3))
		{
			$m1='<tr style="border:1px solid">
			<td style="border:1px solid">'.$arr3["menu_name"].'</td>
			<td style="border:1px solid">Rs. '.$arr3["price"].'/-</td>
			<td style="border:1px solid">'.$arr3["quantity"].'</td>
			<td style="border:1px solid">Rs. '.$arr3["total_price"].'/-</td>
			</tr>';
			$m=$m.$m1;
			$m2=$m2.$m1;
			$final=($final+$arr3["total_price"]);
		}
		
		$m1='<tr style="border:1px solid"><td style="border:1px solid" colspan="3">Sub Total</td><td style="border:1px solid">Rs. '.$final.'/-</td></tr><tr style="border:1px solid"><td style="border:1px solid" colspan="3">Discount</td><td style="border:1px solid">-'.$discount.'%</td></tr><tr style="border:1px solid"><td style="border:1px solid" colspan="3">Total : </td><td style="border:1px solid">Rs. '.$total.'/-</td></tr></table><br><br><b>Contact Details of customer : </b><br><hr><br><b>Contact : </b>'.$mobile.'<br><br>Please give a call on this number to confirm<br><br>Thank You<br>Team Feastyfi';
		$m3='<tr style="border:1px solid"><td style="border:1px solid" colspan="3">Total</td><td style="border:1px solid">'.$final.'</td></tr><tr style="border:1px solid"><td style="border:1px solid" colspan="3">Discount</td><td style="border:1px solid">-'.$discount.'%</td></tr><tr style="border:1px solid"><td style="border:1px solid" colspan="3">Total : </td><td style="border:1px solid">Rs. '.$total.'/-</td></tr></table><br><br>Thank You<br>Team Feastyfi';
		
		$m=$m.$m1;
		$m2=$m2.$m3;
		emailsend($send,$sendname,$subject,$m);
		emailsend($user_email,$name,$subject,$m2);
		
	}
	$q1=mysql_query("TRUNCATE TABLE user_order_cart");
?>	
	


<?php	
/*
	
}



function emailsend($send,$sendname,$subject,$message)
{
	
$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'feastyfi.india@gmail.com';                 // SMTP username
$mail->Password = 'feastyfi@rourkela2015';                           // SMTP password
$mail->SMTPSecure = 'tls';      
$mail->Port = 587;                      // Enable encryption, 'ssl' also accepted

$mail->From = 'feastyfi.india@gmail.com';
$mail->FromName = 'Team Feastyfi';
$mail->addAddress($send, $sendname);     // Add a recipient               // Name is optional


// Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;


if(!$mail->send()) {
    
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   
}
}
echo "mail sent";  */
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
	<title>Final</title>
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

				<h1>Thank You<span>.</span></h1>
			

			</div>			    

		</div> <!-- /row -->	   

   </section> <!-- /page-title -->


   <!-- Content
   ================================================== -->
   

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