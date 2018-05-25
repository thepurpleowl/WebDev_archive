<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
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
	<title>Feastyfi</title>
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

<body class="homepage">

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
	         <a class="smoothscroll" href="#hero">Feastyfi.</a>
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
	            <li class="current"><a class="smoothscroll" href="#hero">Home</a></li>
		         <li><a class="smoothscroll" href="#portfolio">Restaurants</a></li>
	            <li><a class="smoothscroll" href="#journal">About Us</a></li>
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


   <!-- Hero
   =================================================== -->
   <section id="hero">	
   	  
		<div class="row hero-content">

			<div class="twelve columns flex-container">

			   <div id="hero-slider" class="flexslider">

				   <ul class="slides">

					   <!-- Slide -->
					   <li>
						   <div class="flex-caption">
                           	<img src="images/logolarge.png" style="width:512px ; height:49px"/>
                            <br>
                            <br>
								<h1>Hola all you foodies! We are here to satiate all your yummy cravings!</h1>	
								<p><a class="button stroke smoothscroll" href="#journal">Who we are?</a></p>																   
							</div>						
					   </li>

					   <!-- Slide -->
					   <li>						
							<div class="flex-caption">
                            <img src="images/logolarge.png" style="width:512px ; height:49px"/>
                            <br>
                            <br>
								<h1>Find a restaurant near you from the comfort of your cozy-beans.</h1>	
								<p><a class="button stroke smoothscroll" href="#portfolio">Find Restaurants</a></p>									   
							</div>					
					   </li>

					   <!-- Slide -->
					   <li>
						   <div class="flex-caption">
                           <img src="images/logolarge.png" style="width:512px ; height:49px"/>
                            <br>
                            <br>
								<h1 >Feel free to drop a message anytime.<br>We are even nocturnal!</h1>
								<p><a class="button stroke smoothscroll" href="#foot">Get In Touch</a></p>										   
							</div>
					   </li>					              

				   </ul>

			   </div> <!-- .flexslider -->				   

	      </div> <!-- .flex-container -->      

		</div> <!-- .hero-content -->	   

   </section> <!-- #hero -->


   <!-- Portfolio
   ================================================== -->
   <section id="portfolio">


	         <h3 align="center" style="font-family: 'raleway-heavy';
    src: url('fonts/raleway/raleway-heavy-webfont.eot');
    src: url('fonts/raleway/raleway-heavy-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/raleway/raleway-heavy-webfont.woff') format('woff'),
         url('fonts/raleway/raleway-heavy-webfont.ttf') format('truetype'),
         url('fonts/raleway/raleway-heavy-webfont.svg#ralewayheavy') format('svg');
    font-weight: normal;
    font-style: normal;" >LOOK FOR RESTAURANTS NEARBY</h3>

	         <hr />
             
   <div style="height:250px">
		
<form action="restaurant.php" method="GET">
 
<table align="center" cellpadding = "10">

<tr>
<td>Enter City : </td>
<td><select name="city">
    <option value="Rourkela">Rourkela</option>
  </select>
</td>
</tr>

<?php require 'cred.php';
$con=mysql_connect($host,$user,$password);
if(!$con)
{
	die(mysql_error());
}
else
{
	mysql_select_db($database,$con);
	
		$query=mysql_query("SELECT DISTINCT res_locality FROM restaurant ORDER BY res_locality ASC ") or die(mysql_error());

echo '<tr>';
echo '<td>Enter City : </td>';
echo '<td><select name="area">';
while($arr=mysql_fetch_array($query))
{

echo '    <option value="'.$arr["res_locality"].'">'.$arr["res_locality"].'</option>';
}
echo '  </select>';
echo '</td>';
echo '</tr>';

			
}
?>
<!----- User Name ---------------------------------------------------------->


<!----- Password ---------------------------------------------------------->


 

<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" class="button orange" value="Find" name="Find">

</td>
</tr>
</table>
 
</form>
		</div>

</form>
<div class="row section-head">

      	<div class="twelve columns">

	         <h1>We have allied with the best restaurants</h1>

	         <hr />
             
      </div>
      <div class="row items">

      	<div class="twelve columns">

            <div id="portfolio-wrapper" class="bgrid-fourth s-bgrid-third mob-bgrid-half group">

          	   <div class="bgrid item">
                  <div class="item-wrap">

                     <a href="#">
                        <img src="images/portfolio/grizzly.jpg" alt="Grizzly">
                        <div class="overlay"></div>                       
                        <div class="portfolio-item-meta">
          					      <h5>The Moksha</h5>
                              <p>Rourkela</p>
          					</div>                         
                     </a>

                  </div>
          		</div> <!-- /item -->

               <div class="bgrid item">
                  <div class="item-wrap">

                     <a href="#">
                        <img src="images/portfolio/hotel.jpg" alt="Hotel Sign">
                        <div class="overlay">
                        	<div class="portfolio-item-meta">
          					      <h5>The Central Park</h5>
                              <p>Rourkela</p>
          					   </div>
                        </div>                        
                     </a>

                  </div>
          		</div> <!-- /item -->

               <div class="bgrid stack item">
                  <div class="item-wrap">

                     <a href="#">
                        <img src="images/portfolio/beetle.jpg" alt="Beetle">                        
                        <div class="overlay">
                        	<div class="portfolio-item-meta">
          					      <h5>The Regency Inn</h5>
                              <p>Rourkela</p>
          					   </div>
                        </div>                        
                     </a>

                  </div>
          		</div> <!-- /item -->

               <div class="bgrid item">
                  <div class="item-wrap">

                     <a href="#">
                        <img src="images/portfolio/banjo-player.jpg" alt="Banjo Player">
                        <div class="overlay">
                        	<div class="portfolio-item-meta">
          					      <h5>Khana Khazaana</h5>
                              <p>Rourkela</p>
          					   </div>
                        </div>                       
                     </a>

                  </div>
          		</div> <!-- /item -->

               <div class="bgrid item">
                  <div class="item-wrap">

                     <a href="#">
                     	<img src="images/portfolio/coffee.jpg" alt="Coffee Cup">
                       	<div class="overlay">
                       		<div class="portfolio-item-meta">
          					      <h5>The Madhuban</h5>
                              <p>Rourkela</p>
          					   </div>
                       	</div>                        
                     </a>

                  </div>
          		</div> 

               <div class="bgrid item">
                  <div class="item-wrap">

                     <a href="#">
                        <img src="images/portfolio/farmerboy.jpg" alt="Farmerboy">
                        <div class="overlay">
                        	<div class="portfolio-item-meta">
          					      <h5>Mayfair</h5>
                              <p>Rourkela</p>
          					   </div>
                        </div>                        
                     </a>

                  </div>
          		</div> 

               <div class="bgrid item">
                  <div class="item-wrap">

                     <a href="#">                        
                        <img src="images/portfolio/judah.jpg" alt="Judah">                       
                        <div class="overlay">
                        	<div class="portfolio-item-meta">
          					      <h5>Nirvana</h5>
                              <p>Rourkela</p>
          					   </div>
                        </div>                        
                     </a>

                  </div>
          		</div>

               <div class="bgrid item">
                  <div class="item-wrap">

                     <a href="#">
                        <img src="images/portfolio/embossed-paper.jpg" alt="Embossed Paper">
                        <div class="overlay">
                        	<div class="portfolio-item-meta">
          					      <h5>Sarovar</h5>
                              <p>Rourkela</p>
          					   </div>
                        </div>                                                
                     </a>                   

                  </div>
          		</div>  
            </div> <!-- /portfolio-wrapper -->

         </div> <!-- /twelve -->

      </div>  <!-- /row -->
      
   </section> <!-- /Portfolio -->

<!-- ===================================== -->


<section id="journal">
   

	      <div class="row team section-head">

	   		<div class="twelve columns">

		         <h1>Who we are?</h1>

		         <hr />

		         <p>Does your tummy growl all day long? Does that agony in your starving belly irk you? Perhaps, your boss has squeezed out all life outta you and you promised your lovely family a dinner outside! Maybe, your favorite classy awesome restaurant is miles away from your place! Your voracious pals have devised a party at your home and cooking is your strongest aversion! ;) Perhaps, your kids are persisting in having a relishing meal! Your health has wrecked fury and you fall sick! Wanna get food from your dearest restaurant?</br> Well, then Feastyfi is your dark knight, your savior!</br></br>  Feastyfi is an online food ordering portal. We have allied with a plethora of diverse restaurants who are always avid and keen to cook your delicious delicacies. We deliver your food hot n’ tasty! All you gotta do is login and place your order. You even get to see your appetizing meal approaching you on a map! YES! We fetch you turn-by-turn GPS navigation data on a map!
		         </p>	         

		      </div>

	      </div>

      	<div class="row about-content">

      		<div class="twelve columns">

		         <div id="team-wrapper" class="bgrid-half mob-bgrid-whole group">

		            <div class="bgrid member">

		               <div class="member-header">

		                 	<div class="member-pic">
									<img src="images/team/surya.jpg" alt=""/>                        	                       	
		                 	</div>

		                  <div class="member-name">
		                     <h3>Surya Prakash Sahu</h3>
		                     <span>Co-Founder</span>
		                  </div>

		               </div>							

		               <p>Currently a student at NIT,Rourkela. </p>
                       <span><a href=""><img src="images/fborange.png"/></a> <a href=""><img src="images/twitterorange.png"/></a> <a href=""><img src="images/linkedin.png"/></a></span>

		               
		          	</div> <!-- /member -->

		            <div class="bgrid member">

		              	<div class="member-header">
										
								<div class="member-pic">
		                 		<img src="images/team/prateek.jpg" alt=""/>                        	
		                	</div>
		                
		                	<div class="member-name">
		                   	<h3>Prateek Pradhan</h3>
		                   	<span>Co-Founder</span>
                            
		                	</div>

		               </div>

		               <p>Currently a student at NIT Rourkela.</p>
                       <span><a href=""><img src="images/fborange.png"/></a> <a href=""><img src="images/twitterorange.png"/></a> <a href=""><img src="images/linkedin.png"/></a></span>

		               
		       		</div> <!-- /member -->

		 
		         </div> <!-- /twelve -->

	         </div> <!-- /team-wrapper -->

         </div> <!-- /row -->

      <!-- /team -->           

   </section> <!-- /about -->


   <!-- journal
   =================================================== -->
   
   <!-- Contact Section
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
                  MSS Hall of Residence<br>
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
         <p class="copyright">Website Design and Development Credits:<a href="">The Arc Team<a></br>&copy
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
