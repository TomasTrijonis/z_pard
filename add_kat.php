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

					<figure><?php
					echo \"<img src=\".\$row['IMAGE'].\" />\";
					?>
					<figcaption>
					<?php
					echo \$row['PAV'],',  ';
					echo \$row['PRICE'],'€';
					?><br><?php
					echo \$row['zanras'],',  ';
					?>
					</figcaption>
					</figure>

					<br>
					
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
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='".$maxID.".php'>View Result</a>";
    }
}