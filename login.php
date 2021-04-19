<!DOCTYPE html> <!--Look at the gym resources on Mr Patchigallas email--->
<html lang="en">

<head>
	
	<title>BDSC Library 2017 | Issue/Clear</title>
	<meta charset = "utf-8" />
	<meta name = "viewport" content = "width-divice-width, initial-scale = 1.0">
	<meta name = "description" content = "BDSC Library 2017 database and website">
	<meta name = "keywords" content = "Library, BDSC, database, books">
	<meta name = "author" content = "Idreis Abdo">
	<link type="text/css" rel="stylesheet" href="css/style.css"><!--Links this filetype to a css style sheet for design aspects-->
	<link rel="icon" type="image/png" href="images/bdsctitle.png"><!--Makes the tab of the site have the BDSC logo-->
	
</head>

<body>
	
	<header>
		<div class = "container">
			<div id = "title">
				<a href = "index.php"><img src = "images/nicelogo.png"></a><!--Span makes it so the word doesn't go onto the next line-->
			</div>
	
			<nav class="navbar">
				<span class="open-slide">
					<a href="#" onclick="openSlideMenu()">
						<svg width="30" height="30">
							<path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
							<path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
							<path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
						</svg>
					</a>
				</span>
				
				<ul class = "real_nav">
					<li><a href="index.php" class="navformat">Home Page</a></li><!--navigation div for the index button with a class to make the style the same-->		
					<li><a href="issue.php">Issue an Item</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li><a href="newdata.php">Add new data</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li><a href="modify.php">Modify data</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li><a href="browse.php">Browse books</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li class="current"><a href="login.php">Login</a></li><!--navigation div for the index button with a class to make the style the same-->
				</ul>
			</nav>
			
			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="index.php">Home Page</a>
				<a href="issue.php">Issue an Item</a>
				<a href="newdata.php">Add new data</a>
				<a href="#">Modify data</a>
				<a href="#">Browse books</a>
			</div>
		</div>
	</header>
	
	<section id = "subscription">
		<div class = "container">
			<h1>Subscribe to the BDSC Newsletter!</h1>
			<form action = "somethinglikeprocess.php">
				<input type = "email" placeholder = "example@bdsc.school.nz">
				<button type = "submit" class = "button_1">Subscribe</button>
			</form>
		</div>
	</section>
	
	<section id = "main">
		<div class = "container">
			<article id = "main_content">
				<h1 class = "page-title">Issue/Clear an Item</h1>
				<form name = 'login.php' id = 'login' method = 'post' action = 'admin.php'>
					Username: <input type = 'text' maxlength = "35" name = 'Username' required> <br><br>
					Password: <input type = 'password' maxlength = "35" name = 'Password' required> <br><br>
        					    
        			<input type = 'submit' name = 'submit' value = 'Login'>
        		</form>	
			</article>
			
			<aside id = "sidebar">
				<div id = "dark_background">
					<h3>What We Do</h3>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu semper erat. Quisque quis mattis odio. Curabitur lobortis nibh eget elit placerat pulvinar. Praesent et ultricies massa, sit amet porttitor lacus. Donec consequat, libero vitae tincidunt elementum, felis ipsum ornare lectus, id placerat orci augue sit amet metus.
					</p>
				</div>
			</aside>
		</div>
	</section>
	
	<div style="clear:both">
	</div>
	
	<footer>
	    <?php
            include "connection.php";
        ?>
		<p>BDSC Library 2017, Copyright Idreis Abdo &copy; 2017</p>
	</footer>
	
	<script> <!---Script for hamburger button-->
    function openSlideMenu(){
      document.getElementById('side-menu').style.width = '250px';
      document.getElementById('main').style.marginLeft = '250px';
    }

    function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
    }
  </script>
	
 </body>

</html>