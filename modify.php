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
	<link type="text/css" rel="stylesheet" href="css/style.css"><!--Links this filetype to a css style sheet for design aspects-->
	<link rel="icon" type="image/png" href="images/bdsctitle.png"><!--Makes the tab of the site have the BDSC logo-->
	
</head>

<body>
	
	<header>
		<div class = "container">
			<div id = "title">
				<a href = "index.php"><img src = "images/nicelogo.png"></a>
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
					<li class="current"><a href="modify.php">Modify data</a></li><!--navigation div for the index button with a class to make the style the same-->
					<li><a href="browse.php">Browse books</a></li><!--navigation div for the index button with a class to make the style the same-->
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
				<h1 class = "page-title">Edit a Member</h1>
				<p>
				In order for a Library such as ours to function, you'll need to have library books inserted into the database. Please fill in the fields below in order to add to the members database table. All fields are <b>required</b> and will need to be filled out, in order for the database to be submitted. Must be logged in.
				</p>
				<!--SELECT THE MEMBER-->
				<?php
	
                	$current_borrower = $_GET['borrower'];
                    
                    if (!$current_borrower){
                        echo "Please select a Borrower to edit <br></br>";
                        $current_borrower = 1;
                    }
                    
                    //Query to find all borrowers
                    $all_borrowers_query = "SELECT *
                							FROM Borrowers";
                    $all_borrowers_result = mysqli_query($dbcon, $all_borrowers_query);
                    $all_borrowers_rows = mysqli_num_rows($all_borrowers_result);
                    echo "<b>$all_borrowers_rows</b>";
                    echo " borrowers in the database. <br>";
                    
                    //Create a dynamic form
                    echo "<form name = 'garbage.php' action = 'modify.php'>";
                        echo "<select name = 'borrower'>";
                            while ($all_borrower_record = mysqli_fetch_assoc($all_borrowers_result)){
                                echo "<option value = '".$all_borrower_record['Borrower_ID']."'>".$all_borrower_record['First_Name']." ".$all_borrower_record['Last_Name']."</option>";
                            }
                        echo "</select>";
                        echo "<input type = 'submit' value = 'Edit Borrower'>";
                        echo "<p>";
                    echo "</form>";
                	
                	$current_borrower_query = "SELECT *
                                            FROM Borrowers, Memberships
                                            WHERE Borrower_ID = '".$current_borrower."'
                                            AND Borrowers.Membership_ID = Memberships.Membership_ID";
                    $current_borrower_result = mysqli_query ($dbcon, $current_borrower_query);
                    $current_borrower_record = mysqli_fetch_assoc ($current_borrower_result);
                
                ?>
				
				<!--Actual editing forms aspect-->
				<form name='update_borrowers' method = 'POST' action='process_form.php'>
			    <input type='hidden' name="Borrower_ID" value="<?php echo $current_borrower_record['Borrower_ID']; ?>"><br>
			    First name:<br>
			    <input type="text" name="First_Name" maxlength="25" required value="<?php echo $current_borrower_record['First_Name']; ?>"><br></br>
			    Last name:<br>
			    <input type="text" name="Last_Name" maxlength="25" required value="<?php echo $current_borrower_record['Last_Name']; ?>"><br></br>
			    DOB:<br>
			    <input type="date" name="DOB" maxlength="20" required value="<?php echo $current_borrower_record['DOB']; ?>"><br></br>
			    Sex: Currently - <b><?php echo $current_borrower_record['Sex']; ?></b><br>
			    <select name="Sex" required>
			        <option></option>
	                <option value="M">Male</option>
	                <option value="F">Female</option>
		        </select><br></br>
			    Street number:<br>
			    <input type="text" name="Street_Number" maxlength="20" required value="<?php echo $current_borrower_record['Street_Number']; ?>"><br></br>
			    Address:<br>
			    <input type="text" name="Street_Name" maxlength="30" required value="<?php echo $current_borrower_record['Street_Name']; ?>"><br></br>
			    Suburb:<br>
			    <input type="text" name="Suburb" maxlength="25" required value="<?php echo $current_borrower_record['Suburb']; ?>"><br></br>
			    Email:<br>
			    <input type="text" name="Email" maxlength="40" required value="<?php echo $current_borrower_record['Email']; ?>"><br></br>
			    Membership Type: Currently - <b><?php echo $current_borrower_record['Membership_Type']; ?></b><br>
			    <select name="Membership_ID">
				<?php
					$Membership = "SELECT Membership_ID, Membership_Type
					FROM Memberships";
                    $Membership_query = mysqli_query ($dbcon, $Membership);
                    while ($displayname = mysqli_fetch_assoc($Membership_query)){
                        echo "<option value = '".$displayname['Membership_ID']."'>".$displayname['Membership_Type']."</option>";
                    }
                ?>
                </select><br></br>
			    
			    <input type='submit' name='submit' value='Update Borrower'><br>
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