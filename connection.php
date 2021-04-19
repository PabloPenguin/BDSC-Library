<?php 
 
$dbcon = mysqli_connect('localhost', 'root', '', 'bdsc_library_store'); 
 
if(!$dbcon) { 
 
echo "<h3>Error: connection unsuccessful</h3>"; 
exit(); 
 
}
?> 