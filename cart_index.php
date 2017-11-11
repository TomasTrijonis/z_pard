 <?php 
include 'core/init.php'; 
include 'includes/overall/header.php'; 

?>

		
		
	

 
 <?php if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]) )  
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
                echo '<script>window.location="cart_index.php"</script>';  
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
                     echo '<script>window.location="cart_index.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 
   

      <body>  
           <br />  
           <div class="gamecont" style="width:750px; ">  
                <h3 align="center">Simple PHP Mysql Shopping Cart</h3><br />  
                <?php  
                $cart_query = "SELECT * FROM zaidimai ORDER BY gameid ASC";  
                $cart_result = mysqli_query($con, $cart_query);  
                if(mysqli_num_rows($cart_result) > 0)  
                {  
                     while($row = mysqli_fetch_array($cart_result))  
                     {  
                ?>  
                <div  class="col-md-4">  
                     <form method="post"  action="cart_index.php?action=add&gameid=<?php echo $row["gameid"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["IMAGE"]; ?>" class="table-responsive"/><br />  
                               <h4 > <?php echo $row["PAV"]; ?></h4>  
                               <h4 >$ <?php echo $row["PRICE"]; ?></h4>  
							   <script>
							   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 49 || charCode > 57))
        return false;
    return true;
}
							   </script>
							   
                                <input type="number" name="quantity" onkeypress="return isNumberKey(event)" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["PAV"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["PRICE"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table  class="table table-bordered">  
                          <tr>  
                               <th width="50%">Item Name</th>   
								<th width="25%">Price</th> 
							    <th width="5%">Quantity</th>  
 
                               <th width="30%">Total</th>  
                               <th width="5%">Action</th>  
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
							    <td> <?php echo $values["item_price"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                              
                               <td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart_index.php?action=delete&gameid=<?php echo $values["item_id"]; ?>"><span style="color: red;">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                     $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
						  
                          <tr>  
                               <td align="left">Total</td>  
                               <td align="left">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
						  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  

 
 <?php 

	include 'includes/overall/footer.php';
?>
