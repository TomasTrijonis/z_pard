<?php
//including the database connection file
include_once("core/database/connect.php");
 
if(isset($_POST['Submit'])) {    
    $PAV = $_POST['PAV'];
    $DEV = $_POST['DEV'];
    $genre_id = $_POST['genre_id'];
        
    // checking empty fields
    if(empty($PAV) || empty($DEV) || empty($genre_id)) {                
        if(empty($PAV)) {
            echo "<font color='red'>PAV field is empty.</font><br/>";
        }
        
        if(empty($DEV)) {
            echo "<font color='red'>DEV field is empty.</font><br/>";
        }
        
        if(empty($genre_id)) {
            echo "<font color='red'>Genre field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($con, "INSERT INTO zaidimai(PAV,DEV,genre_id) VALUES('$PAV','$DEV','$genre_id')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='edit1.php'>View Result</a>";
    }
}