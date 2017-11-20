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
		$newGenreId=mysqli_query($con, "SELECT * FROM kategorijos ORDER BY genre_id DESC LIMIT 1");
		$row = mysqli_fetch_array($newGenreId);
		$maxID=$row['genre_id'];		
		
		
	 $myfile = fopen("".$maxID.".php", "w");		 
	 
	 $txt = "
	 
	 <?php 
include 'core/init.php'; 
include 'includes/overall/header.php'; 
?>

		
		
							<div id=\"game-container\">

<?php \$filename=pathinfo(__FILE__, PATHINFO_FILENAME);


			if(\$result = \$con->query(\"SELECT c.* , p.* FROM zaidimai c, kategorijos p WHERE c.genre_id=p.genre_id AND c.genre_id='\$filename'\")) {

			if(\$result->num_rows) {
				
				
				
				while(\$row = \$result->fetch_assoc()) {
					
					?>

										              <br />  
 
                <div class=\"col-sm-4\" style=\"padding:10px;\">  
                     <form method=\"post\" action=\"index.php?action=add&gameid=<?php echo \$row[\"gameid\"]; ?>\">  
                          <div style=\"border:0px solid #333; background-color:#f1f1f1; border-radius:5px; padding:8px; height: 430px;\" align=\"center\">  
                               <img src=\"<?php echo \$row[\"IMAGE\"]; ?>\" class=\"img-responsive\" /><br />  
                               <h4 class=\"text-info\"><?php echo \$row[\"PAV\"]; ?></h4>  
                               <h4 class=\"text-danger\">\$ <?php echo \$row[\"PRICE\"]; ?></h4>  
                               <input type=\"text\" name=\"quantity\" class=\"form-control\" onkeypress=\"return isNumberKey(event)\"  value=\"1\" />  
                               <input type=\"hidden\" name=\"hidden_name\" value=\"<?php echo \$row[\"PAV\"]; ?>\" />  
                               <input type=\"hidden\" name=\"hidden_price\" value=\"<?php echo \$row[\"PRICE\"]; ?>\" />  
                      
                          </div>  
                     </form>  
                </div>  

					
					<?php
					
				}
				
				
			}
			}
			?>
				</div>
	

		
<?php 

	include 'includes/overall/footer.php';
?>
	 
	 ";
	 
	 
	fwrite($myfile, $txt);

	
	// $txt = "	";




        
        //display success message
        echo "<font color='green'>Kategorija pridėta sėkmingai. Jūsų ID:" ;
		echo $maxID;
        echo "<br/><a href='".$maxID.".php'>View Result</a>";
    }
}