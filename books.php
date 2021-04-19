<!DOCTYPE html> <!--Look at the gym resources on Mr Patchigallas email--->
<?php 
	include 'connection.php';
	session_start();
	
    $all_categories_query = "SELECT * FROM Categories";
	$all_categories_result = mysqli_query($dbcon, $all_categories_query);
	$all_categories_rows = mysqli_num_rows($all_categories_result);
	
	$all_authors_query = "SELECT * FROM Authors";
	$all_authors_result = mysqli_query($dbcon, $all_authors_query);
	$all_authors_rows = mysqli_num_rows($all_authors_result);
	
	$all_publishers_query = "SELECT * FROM Publishers";
	$all_publishers_result = mysqli_query($dbcon, $all_publishers_query);
	$all_publishers_rows = mysqli_num_rows($all_publishers_result);
	

?>
<html lang="en">

<head>
	
	<title>BDSC Library 2017 | Add new members</title>
	<meta charset = "utf-8"/>
	<meta name = "viewport" content = "width-divice-width, initial-scale = 1.0">
	<meta name = "description" content = "BDSC Library 2017 database and website">
	<meta name = "keywords" content = "Library, BDSC, database, books">
	<meta name = "author" content = "Idreis Abdo">
	<link type = "text/css" rel = "stylesheet" href = "css/style.css"><!--Links this filetype to a css style sheet for design aspects-->
	<link rel="icon" type = "image/png" href = "images/bdsctitle.png"><!--Makes the tab of the site have the BDSC logo-->
	
</head>

<body>
	
	<header>
		<div class = "container">
			<div id = "title">
				<a href = "index.php"><img src = "images/nicelogo.png"></a>
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
					<li><a href = "index.php" class="navformat">Home Page</a></li><!--navigation div for the index button with a class to make the style the same-->		
					<li><a href = "issue.php">Issue an Item</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li class = "current"><a href="newdata.php">Add new data</a></li><!--navigation div for the index button with a class to make the style the same-->
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
					</li>
				</ul>
			</nav>
			
			<div id="side-menu" class="side-nav">
				<a href = "#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href = "index.php">Home Page</a>
				<a href = "issue.php">Issue an Item</a>
				<a href = "newdata.php">Add new data</a>
				<a href = "#">Modify data</a>
				<a href = "#">Browse books</a>
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
				<h1 class = "page-title">Add a Library Book</h1>
				<p>
				In order for a Library such as ours to function, you'll need to have library books inserted into the database. Please fill in the fields below in order to add to the members database table. All fields are <b>required</b> and will need to be filled out, in order for the database to be submitted. Must be logged in.
				</p>
				<p> If you wish to add members, click <a href = "newdata.php"><b>here</b></a>
				
				<form name = 'books.php' method = 'post' action = 'process_form.php'>
			
				Title:<br> <input type = "text" name = "Title" maxlength = "20" placeholder = "How To Do Python" required> <br></br>
                Cost:<br> <input type = "number" step = "0.01" name = "Cost" maxlength = "20" placeholder = "49.95" required> <br></br>
                Adult themes:<br> <select name = 'Adult' required><option value='Y'>Y</option><option value='N'>N</option></select><br><br>
                Year Published:<br> <input type = "number" name = "Publication_Year" maxlength = "20" placeholder = "2009" required> <br></br>
                ISBN of Book:<br> <input type = "text" name = "ISBN" maxlength = "20" placeholder = "978-186940-434-5"required> <br></br>
	
            	Category:<br> <?php
            
            
            		echo "<select name = 'Category_ID'>";
            			while ($all_categories_record = mysqli_fetch_assoc ($all_categories_result)){
            				echo "<option value = '".$all_categories_record['Category_ID']."'>".$all_categories_record['Category']." </option>"; 
            			}
            
            		echo "</select><br>";
            	?><br>
            				Author:<br> <?php
            
            
            		echo "<select name = 'Author_ID'>";
            			while ($all_authors_record = mysqli_fetch_assoc ($all_authors_result)){
            				echo "<option value = '".$all_authors_record['Author_ID']."'>".$all_authors_record['Author_FirstName']." ".$all_authors_record['Author_LastName']."</option>"; 
            			}
            
            		echo "</select><br>";
            		
            		
            	?><br>
            		
            		Publisher:<br> <?php
            
            
            
            		echo "<select name = 'Publisher_ID'>";
            			while ($all_publishers_record = mysqli_fetch_assoc ($all_publishers_result)){
            				echo "<option value = '".$all_publishers_record['Publisher_ID']."'>".$all_publishers_record['Publisher']." </option>"; 
            			}
            
            		echo "</select><br>";
            	?><br>

		
				<input type = "submit" value = "Add New Book" name = 'submit'></br></br>

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