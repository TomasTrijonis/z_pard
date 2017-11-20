<?php 
include 'core/init.php'; 
include 'includes/overall/header.php'; 
?>

		


		
		
							<div id="game-container">

<?php $filename=pathinfo(__FILE__, PATHINFO_FILENAME);

//$join= $con->query;
			if($result = $con->query("SELECT c.* , p.* FROM zaidimai c, kategorijos p WHERE c.genre_id=p.genre_id AND c.genre_id='$filename'")) {

			if($result->num_rows) {
				
				
				
				while($row = $result->fetch_assoc()) {
					
					?>

										    
   
                <div class="col-sm-4" style="padding:10px;">  
                     <form method="post" action="index.php?action=add&gameid=<?php echo $row["gameid"]; ?>">  
                          <div style="border:0px solid #333; background-color:#f1f1f1; border-radius:5px; padding:8px; height: 430px;" align="center">  
                               <img src="<?php echo $row["IMAGE"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["PAV"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["PRICE"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" onkeypress="return isNumberKey(event)"  value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["PAV"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["PRICE"]; ?>" />  
                      
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
		

	