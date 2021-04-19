<?php 
    include 'connection.php';
    
    if($_POST['submit'] == 'Add New Book') {
        $Title = $_POST['Title'];
        $Cost = $_POST['Cost'];
        $Adult = $_POST['Adult'];
        $Publication_Year = $_POST['Publication_Year'];
        $ISBN = $_POST['ISBN'];
        $AuthorID = trim(addslashes($_POST['Author_ID']));
		$Publisher_ID = trim(addslashes($_POST['Publisher_ID']));
		$Category_ID = trim(addslashes($_POST['Category_ID']));
		
        
        $books_insert_query = "INSERT INTO Books (Title, Cost, Adult, Publication_Year, ISBN, Author_ID, Publisher_ID, Category_ID) 
        VALUES ('$Title', '$Cost','$Adult', '$Publication_Year', '$ISBN', '$AuthorID', '$Publisher_ID', '$Category_ID')";
        
        $books_insert_result = mysqli_query ($dbcon, $books_insert_query);
    	
    	if(!$books_insert_result) {
    		echo "An error happened";
    	
    	}
    	
    	else {
    		echo "New book has been added!";
    	}
    }
    
    
    
    if($_POST['submit'] == 'Update Borrower') { 
        $Borrower_ID = $_POST['Borrower_ID'];
        $First_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $DOB = $_POST['DOB'];
        $Sex = $_POST['Sex'];
        $Street_Number = $_POST['Street_Number'];
        $Street_Name = $_POST['Street_Name'];
        $Suburb = $_POST['Suburb'];
        $Email = $_POST['Email'];
        $Membership_ID = $_POST['Membership_ID'];
    
        //This if statement checks if the request came from the right form
            $member_update_query = "UPDATE Borrowers
                                    SET First_Name = '$First_Name', Last_Name = '$Last_Name', DOB= '$DOB', Sex = '$Sex', Street_Number = '$Street_Number', Street_Name = '$Street_Name', Suburb = '$Suburb', Email = '$Email', Membership_ID = '$Membership_ID'
                                    WHERE Borrower_ID = '$Borrower_ID'";
            
            $member_update_result = mysqli_query($dbcon, $member_update_query);
            
            if (!$member_update_result) {
                echo "An error has occured";
            }
            else {
                echo "Member's details have been updated";
                header('Location: index.php');
            
        }
    }
        
    if($_POST['submit'] == 'Add New Member') {
        $First_Name = $_POST['First_Name'];
    	$Last_Name = $_POST['Last_Name'];
    	$DOB = $_POST['DOB'];
    	$Email = $_POST['Email'];
    	$Sex = $_POST['Sex'];
    	$Membership = $_POST['Membership'];
    	$Street_Number = $_POST['Street_Number'];
    	$Street_Name = $_POST['Street_Name'];
    	$Suburb = $_POST['Suburb'];
    					
    	$member_insert_query = "INSERT INTO Borrowers (First_Name, Last_Name, DOB, Email, Sex, Membership_ID, Street_Number, Street_Name, Suburb)
    							VALUES('$First_Name', '$Last_Name', '$DOB', '$Email', '$Sex', '$Membership','$Street_Number','$Street_Name', '$Suburb')";
    					
    	$member_insert_result = mysqli_query($dbcon, $member_insert_query);	    
    					
    	if(!$member_insert_result){
    	echo "An error has occurred.";
    	}
    }
		
		
		
		
		
	if($_POST['submit'] == 'Add new loan') {
		$Borrower_ID = trim(addslashes($_POST['Borrower_ID']));
		$Book_ID = trim(addslashes($_POST['Book_ID']));
		$Date_Issued = strtotime($_POST['Date_Issued']);
		$Final_Date_Issued= date("Y-m-d",$Date_Issued);
		$Date_Due = strtotime("+14 days", $Date_Issued);
		$Final_Date_Due = date("Y-m-d",$Date_Due);
		$hiring_insert_query = "INSERT INTO Hiring (Borrower_ID, Book_ID, Date_Issued, Date_Due)
		VALUES ('$Borrower_ID', '$Book_ID', '$Final_Date_Issued', '$Final_Date_Due')";
		$hiring_query = "UPDATE Books
								SET Hired = '1'  
								WHERE Book_ID = '$Book_ID'";
		$hiring_result = mysqli_query($dbcon, $hiring_query);

		$hiring_insert_result = mysqli_query ($dbcon, $hiring_insert_query);
		
			if ($hiring_insert_result = 0) {
				echo "Error";
			}

			else {
				echo "Book Issued";
				}
		}
		
		
	if ($_POST['submit'] == 'Return'){
	$Date_Returned = $_POST['Date_Returned'];
	$return_insert_query = "UPDATE Hiring 
	                        Set Date_Returned = '$Date_Returned'
	                        WHERE Hiring.Borrow_ID = ".$_POST['Hiring'];
	                       	
	$return_insert_result = mysqli_query ($dbcon, $return_insert_query);
		
			if ($return_insert_result = 0) {
				echo "Error";
			}

			else {
				echo "Book Returned";
				}
	$Hiring = $_POST['Hiring'];
	$return_query = "UPDATE Books
					SET Hired = '0'  
					WHERE Hiring.Book_ID = Books.Book_ID
								";
	$return_result = mysqli_query($dbcon, $return_query);
	

}
?>