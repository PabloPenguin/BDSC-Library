<!DOCTYPE html> <!--Look at the gym resources on Mr Patchigallas email--->
<?php
	session_start(); //So login switches to logout
	include 'connection.php';

?>
<html lang="en">

<head>
	
	<title>BDSC Library 2017 | Home Page</title>
	<meta charset = "utf-8"/>
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
	
			<nav class = "navbar">
				<span class = "open-slide">
					<a href = "#" onclick = "openSlideMenu()">
						<svg width = "30" height = "30">
							<path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
							<path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
							<path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
						</svg>
					</a>
				</span>
				
				<ul class = "real_nav">
					<li class = "current"><a href = "index.php" class = "navformat">Home Page</a></li><!--navigation div for the index button with a class to make the style the same-->		
					<li><a href = "issue.php">Issue an Item</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li><a href = "newdata.php">Add new data</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li><a href = "modify.php">Modify data</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li><a href = "browse.php">Browse books</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li>
					<?php
						if($_SESSION['admin'] == 1) {
							echo "<a class='navlink' href='logout.php'>Logout</a>";
						} else {
							echo "<a class='navlink' href='login.php'>Login</a>";
						}
					?>
					</li><!--navigation div for the index button with a class to make the style the same-->
				</ul>
			</nav>
			
			<div id = "side-menu" class = "side-nav">
				<a href = "#" class = "btn-close" onclick = "closeSlideMenu()">&times;</a>
				<a href = "index.php">Home Page</a>
				<a href = "issue.php">Issue an Item</a>
				<a href = "newdata.php">Add new data</a>
				<a href = "#">Modify data</a>
				<a href = "#">Browse books</a>
			</div>
		</div>
	</header>
	
	<section id = "showcase_library">
		<div class = "container">
			<h1>Botany Downs Secondary College Library</h1>
			<p>A library database for BDSC</p>
		</div>
	</section>
	
	<section id = "subscription">
		<div class = "container">
			<h1>Subscribe to the BDSC Newsletter!</h1>
			<form action = "somethinglikeprocess.php">
				<input type = "email" placeholder = "example@bdsc.school.nz">
				<button type = "submit" class = "button_1">Subscribe</button>
			</form>
		</div>
	</section>
	
	<section id = "columns">
		<div class = "container">
			<div class = "box">
				<img src = "images/barcode_logo.png">
				<h3>Issue/Return</h3>
				<p>This database will allow staff to record books issued to borrowers and 'clear' them once the books, CDs, or DVDs, have been returned.</p>
			</div>
			<div class = "box">
				<img src = "images/tick_logo.png">
				<h3>Easy to use</h3>
				<p>This database will be very designer friendly, meaning that the functionality of the website will be easy and intuitive.</p>
			</div>
			<div class = "box">
				<img src = "images/plus_logo.png">
				<h3>Add staff/books</h3>
				<p>This database will allow staff to add in new staff that may be joining the BDSC Library, or add in new books, DVDs or CDs.</p>
			</div>
		</div>
	</section>
	
	<div style = "clear:both">
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