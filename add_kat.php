<?php
//including the database connection file
include_once("core/database/connect.php");
 
if(isset($_POST['Submit'])) {    
    $zanras = $_POST['zanras'];
   
        
    // checking empty fields
    if(empty($zanras)) {                
        if(empty($zanras)) {
            echo "<font color='red'>PAV field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($con, "INSERT INTO kategorijos(zanras) VALUES('$zanras')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='edit11.php'>View Result</a>";
    }
}