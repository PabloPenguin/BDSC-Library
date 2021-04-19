<?php
    
    ob_start();
    session_start();
        include 'connection.php';
    if ($_SESSION['admin'] != 1){
    header ('Location: login.php');
    exit(); 
    }
    
?>
<!DOCTYPE html> <!--Look at the gym resources on Mr Patchigallas email--->

<html lang="en">

<head>
	
	<title>BDSC Library 2017 | Add new members</title>
	<meta charset = "utf-8"/>
	<meta name = "viewport" content = "width-divice-width, initial-scale = 1.0">
	<meta name = "description" content = "BDSC Library 2017 database and website">
	<meta name = "keywords" content = "Library, BDSC, database, books">
	<meta name = "author" content = "Idreis Abdo">
	<link type = "text/css" rel = "stylesheet" href = "css/style.css"><!--Links this filetype to a css style sheet for design aspects-->
	<link rel = "icon" type = "image/png" href = "images/bdsctitle.png"><!--Makes the tab of the site have the BDSC logo-->
	
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
					<li><a href = "index.php" class = "navformat">Home Page</a></li><!--navigation div for the index button with a class to make the style the same-->		
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
				<h1 class = "page-title">Add a Member</h1>
				<p>
				In order for a Library such as ours to function, you'll need to have members into the database. Please fill in the fields below in order to add to the members database table. All fields are <b>required</b> and will need to be filled out, in order for the database to be submitted. Must be logged in.
				</p>
				<p> If you wish to add a library book, click <a href="books.php"><b>here</b></a>
				
				<form name = 'newdata.php' method = 'post' action = 'process_form.php'>
			
				First Name: <br><input type = 'text' maxlength = "50" name = 'First_Name' placeholder = "Idreis" required ></br></br>
				Last Name: <br><input type = 'text' maxlength = "50" name = 'Last_Name' placeholder = "Abdo" required></br></br>
				Email: <br><input type = 'email' maxlength = "50" name = 'Email' placeholder = "example@bdsc.school.nz" required><br></br>
				Sex: <br><input type = 'text' maxlength = "50" name = 'Sex' placeholder = "M/F" required ></br></br>
				Date of Birth: <br><input type='date' name = 'DOB' required ></br></br>
				Street Number: <br><input type = 'text' maxlength = "15" name = 'Street_Number' placeholder = "2B" required></br></br>
				Street Name: <br><input type = 'text' maxlength = "30" name = 'Street_Name' placeholder = "SantaAna Street" required></br></br>
				Suburb: <br><input type = 'text' maxlength = "15" name = 'Suburb' placeholder = "Botany" required></br></br>
				Membership Type: <br><select name = "Membership">
				<?php
					$Membership = "SELECT Membership_ID, Membership_Type
					FROM Memberships";
                    $Membership_query = mysqli_query ($dbcon, $Membership);
                    while ($displayname = mysqli_fetch_assoc($Membership_query)){
                        echo "<option value = '".$displayname['Membership_ID']."'>".$displayname['Membership_Type']."</option>";
                    }
                ?></br></br>
				</select><br><br>
				<input type = "submit" value = "Add New Member" name = 'Submit'></br></br>

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