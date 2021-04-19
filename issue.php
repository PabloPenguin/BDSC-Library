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
					<li class = "current"><a href = "issue.php">Issue an Item</a></li><!--navigation div for the index button with a class to make the style the same-->
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
				<h1 class = "page-title">Issue an item</h1>
				<p>
				In order for a Library such as ours to function, you'll need to issue books to members, and also clear them. Please fill in the fields below in order to issue books and/or return them. All fields are required and will need to be filled out for issuing or returning, in order for the database to be submitted. Must be logged in.
				</p>
				<form name = "issue.php" method = "post" action = "process_form.php">
				Book:<br>
    			<select name = "Book_ID">;
					<?php
						
						$all_books_query = "SELECT * FROM Books
											WHERE Books.Hired = '0'
											ORDER BY Book_ID"; //check to see if this cancer is efficient
						$all_books_result = mysqli_query($dbcon, $all_books_query);
						$all_books_rows = mysqli_num_rows($all_books_result);
						
								while ($all_books_record = mysqli_fetch_assoc ($all_books_result)){
									echo "<option value = '".$all_books_record['Book_ID']."'>".$all_books_record['Title']."</option>";
								}

							echo"<p>";
						
					 ?>
					</select><br><br>
				Borrower:<br>
				<select name = "Borrower_ID">;
				<?php

					$all_borrower_query = "SELECT * FROM Borrowers
										ORDER BY Borrower_ID";
					$all_borrower_result = mysqli_query($dbcon, $all_borrower_query);
					$all_borrower_rows = mysqli_num_rows($all_borrower_result);

							while ($all_borrower_record = mysqli_fetch_assoc ($all_borrower_result)){
								echo "<option value = '".$all_borrower_record['Borrower_ID']."'>".$all_borrower_record['First_Name']." ".$all_borrower_record['Last_Name']."</option>"; 
							}

						echo "</select><br>";
					?>
					 
                 </select><br>
                 Date Issued:<br> <input type = "date" name = "Date_Issued" value = "<?php echo date('Y-m-d'); ?>" /><br><!---Automatically sets the date to the server date--><br>
                 <input type = 'submit' name = 'submit' value = 'Add new loan'>
                 </form>
				 
				 <br><h1 class = "page-title">Return an issued item</h1>

				<form  method = "post" action = "process_form.php">
				Return a book that's been issued:<br>
				<?php

				$all_borrow_query = "SELECT *  
								FROM Hiring, Borrowers, Books 
								WHERE Books.Hired = '1'
								AND Hiring.Book_ID = Books.Book_ID
								AND Borrowers.Borrower_ID = Hiring.Borrower_ID
								AND Hiring.Date_Returned = 0000-00-00";
								
								
								
				
				$all_borrow_result = mysqli_query($dbcon, $all_borrow_query);
				$all_borrow_rows = mysqli_num_rows($all_borrow_result);
					echo "<select name = 'Hiring'>";
						while ($all_borrow_record = mysqli_fetch_assoc ($all_borrow_result)){
							echo "<option value = '".$all_borrow_record['Borrow_ID']."'>".$all_borrow_record['First_Name']." ".$all_borrow_record['Last_Name']." ".$all_borrow_record['Title']."</option>"; 
						}
			
					echo "</select><br>";
			
				?>
					<br>Date Returned: <br><input type='date' name= 'Date_Returned' required>
					<br><br><input type = 'submit' name = 'submit' value ='Return'>
									

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