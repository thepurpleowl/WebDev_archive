<?php
date_default_timezone_set('Asia/Kolkata');
// define variables and set to empty values
$user_first = $user_last = $user_name = $user_email = $user_pwd = $user_repwd = $user_mobile = $user_address = $user_pin ="";
$user_firsterr = $user_lasterr = $user_nameerr = $user_emailerr = $user_pwderr = $user_repwderr = $user_mobileerr = $user_addresserr = $user_pinerr ="";
$count=0;
$error=array();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["user_first"])) 
	{
    	$user_firsterr = "Name is required";
		$count++;
  	}
	else
	{
  		$user_first = test_input($_POST["user_first"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$user_first))
		{
			$user_firsterr = "Only letters and white spaces allowed";
			$count++;
		}
	}
	
	if (empty($_POST["user_last"])) 
	{
    	$user_lasterr = "Name is required";
		$count++;
  	}
	else
	{
  		$user_last = test_input($_POST["user_last"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$user_last))
		{
			$user_lasterr = "Only letters and white spaces allowed";
			$count++;
		}
	}
	
	if (empty($_POST["user_name"])) 
	{
    	$user_nameerr = "Name is required";
		$count++;
  	}
	else
	{
		$user_name = test_input($_POST["user_name"]);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/",$user_name))
		{
			$user_nameerr = "Only letters and white spaces allowed";
			$count++;
		}
	}
	
	if (empty($_POST["user_email"])) 
	{
    	$user_emailerr = "Name is required";
		$count++;
  	}
	else
	{
		$user_email = test_input($_POST["user_email"]);
		if (!filter_var($user_email, FILTER_VALIDATE_EMAIL))
		{
			$user_emailerr = "invalid format";
			$count++;
		}
	}
	
	if (empty($_POST["user_pwd"])) 
	{
    	$user_pwderr = "pwd is required";
		$count++;
  	}
	else
	{
		$user_pwd = test_input($_POST["user_pwd"]);
		if (0 === preg_match("/.{6,}/",$_POST['user_pwd']))
		{
			$user_pwderr = "invalid format";
			$count++;
		}
		
	}
	
	if (empty($_POST["user_repwd"])) 
	{
    	$user_repwderr = "Re enter password";
		$count++;
  	}
	else
	{
		$user_repwd = test_input($_POST["user_repwd"]);
		if (0 !== strcmp($_POST['user_pwd'],$_POST['user_repwd']))
		{
			$user_repwderr = "password doesnt match";
			$count++;
		}
    
	}
	
	
	
	
	if (empty($_POST["user_mobile"])) 
	{
    	$user_mobileerr = "Mobile is required";
  	}
	else
	{
		$user_mobile = test_input($_POST["user_mobile"]);
		if(!is_numeric($user_mobile))
		{
			$user_mobileerr="Enter a valid number";
			$count++;
		}
	}
}

if($count==0)
{
	$user_attempt=0;
	$user_pwd=md5($user_pwd);
	require 'cred.php';
	$con=mysql_connect($host,$user, $password);
	mysql_select_db($database,$con);
	if($user_name)
	{
	$res=mysql_query("INSERT INTO users(user_first,user_last,user_name,user_email,user_pwd,user_mobile) values('$user_first','$user_last','$user_name','$user_email','$user_pwd','$user_mobile')");
	if(!$res)
		die(mysql_error());
	if(mysql_errno()==0)
	{
		header("location:index.php");
	}
	elseif(preg_match("/^Duplicate.*PRIMARY.*/i",mysql_error()))
	{
		$user_nameerr="Username already exists!!";
	}
	}
	
}



	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  
  return $data;
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
	<title>Register</title>
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
	            <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                 <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                 <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                 <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                 <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                <li><a href="index.html#hero"></a></li>
                
	         </ul> 

	      </nav> <!-- /nav-wrap -->	      

	   </div> <!-- /header-inner -->

   </header>


   <!-- Page Title
   ================================================== -->
   <section id="page-title">	
   	  
		<div class="row">

			<div class="twelve columns">

				<h1>Register</h1>
                <hr>
				<h2 style="color:#F60">We know you're hungry! Ready to binge on food!</h2>

			</div>			    

		</div> <!-- /row -->	   

   </section> <!-- /page-title -->


   <!-- Content
   ================================================== -->
   <section id="content">

   	
        <div style="height:780px">

		
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 
<table align="center" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>First Name</td>
<td><input type="text" name="user_first" value="<?php echo $user_first;?>"/></td>
<td><span class="error"> <?php echo $user_firsterr;?></span></td>

</tr>

<!----- Last Name ---------------------------------------------------------->
<tr>
<td>Last Name</td>
<td><input type="text" name="user_last" maxlength="30" value="<?php echo $user_last;?>"/>
</td>
<td><span class="error"> <?php echo $user_lasterr;?></span></td>
</tr>

<!----- User Name ---------------------------------------------------------->
<tr>
<td>User Name</td>
<td><input type="text" name="user_name" id="user_name" maxlength="30"  value="<?php echo $user_name;?>"/>
</td>
<td><span class="error"> <?php echo $user_nameerr;?></span></td>
</tr>


 

 
<!----- Email Id ---------------------------------------------------------->
<tr>
<td>Email ID</td>
<td><input type="text" name="user_email" maxlength="100" value="<?php echo $user_email;?>"/></td>
<td><span class="error"> <?php echo $user_emailerr;?></span></td>
</tr>
 
 
 <!----- Password ---------------------------------------------------------->
<tr>
<td>Password</td>
<td><input type="password" name="user_pwd" />
(Min 6 characters)
</td>
<td><span class="error"> <?php echo $user_pwderr;?></span></td>
</tr>

 <!-----confirm Password ---------------------------------------------------------->
<tr>
<td>Confirm Password</td>
<td><input type="password" name="user_repwd" />
</td>
<td><span class="error"> <?php echo $user_repwderr;?></span></td>
</tr>

<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>Mobile Number</td>
<td>
<input type="text" name="user_mobile" maxlength="10" value="<?php echo $user_mobile;?>"/>
(10 digit number)
</td>
<td><span class="error"> <?php echo $user_mobileerr;?></span></td>
</tr>
 

<!----- Address ---------------------------------------------------------->

 

 

 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Submit" name="submit">
</td>
</tr>
</table>
 
</form>
		</div>


	     

   </section> <!-- /content -->  



   <!-- Footer
   ================================================== -->
   <footer>
 <section id="foot"
      <div class="row">       

         <div class="six columns tab-whole footer-about">
				
				<h1>Feastify</h1>
               
            

         </div> <!-- /footer-about -->

         <div class="six columns tab-whole right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Contact Us</h3>
                  <p>
                  d-321<br>
                  NIT Rourkela<br>
                  Rourkela
                  </p>

                  <ul>
                    <li><a href="tel:6473438234">647.343.8234</a></li>
                    <li><a href="tel:1234567890">123.456.7890</a></li>
                    <li><a href="mailto:someone@Feastify.com">someone@Feastify.com</a></li>
                  </ul>                  
               </div> <!-- /columns -->             

               <div class="columns last">
                  <h3 class="contact">Follow Us</h3>

                  <ul>
                     <li><a href="#">Facebook</a></li>
                     <li><a href="#">Twitter</a></li>
                     <li><a href="#">GooglePlus</a></li>
                     
                  </ul>
                  
               </div> <!-- /columns --> 

            </div> <!-- /Row(nested) -->

         </div>

         <p class="copyright">&copy; Copyright 2015 Feastify.</p>        

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#content"><span>Top</span><i class="fa fa-long-arrow-up"></i></a>
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