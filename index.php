   <?php 
include 'core/init.php'; 
include 'includes/overall/header.php'; 


                               $total = 0; 
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["gameid"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["gameid"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["gameid"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["gameid"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 
 
      <body>  
           <br />  
           <div class="container">  



              <br />  
                <?php  
                $query = "SELECT * FROM zaidimai ORDER BY gameid ASC";  
                $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-sm-2" style="padding:10px;">  
                     <form method="post" action="index.php?action=add&gameid=<?php echo $row["gameid"]; ?>">  
                          <div style="border:0px solid #333; background-color:#f1f1f1; border-radius:5px; padding:8px; height: 430px;" align="center">  
                               <img src="<?php echo $row["IMAGE"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["PAV"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["PRICE"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" onkeypress="return isNumberKey(event)"  value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["PAV"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["PRICE"]; ?>" />  
                       <?php
					   
					   if(logged_in()===true){
?>
	 <input type="submit" name="add_to_cart" style="margin:10px;" class="btn btn-success" value="Pridėti į krepšelį" /> 
<?php

					  }
?>
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br/>  
                <h3>Užsakymo detalės</h3>  
                <div class="table-responsive" >  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Pavadinimas</th>  
                               <th width="10%">Kiekis</th>  
                               <th width="20%">Kaina</th>   
                               <th width="15%">Kiekis x Kaina</th>  
                               <th width="5%">Veiksmas</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>€ <?php echo $values["item_price"]; ?></td>  
                               <td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&gameid=<?php echo $values["item_id"]; ?>"><span class="text-danger">Pašalinti</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Viso mokėti</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>
							  </tr>  
							  
				
								<?php
                          }  
                          ?>  
                     </table> 
			  <?php
								if ($total>0){
							  ?>
							  
							  <form method="get" action="checkout.php">
								 <input type="hidden" name="" value="">
								<input type="submit" a href="checkout.php" class="btn btn-success" role="button" value="Atsiskaityti">

							  			 
                </div>  
								<?php  } ?>
           </div>  
           <br />  
		   							   <script>
							   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 49 || charCode > 57))
        return false;
    return true;
}							</script>
      </body>  

    <?php 

	include 'includes/overall/footer.php';
?>
