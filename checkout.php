   <?php 
include 'core/init.php'; 
include 'includes/overall/header.php'; 


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
 
                               
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="2" align="right" style="font-weight: bold; font-size: 1.8em;">Viso mokėti</td>  
                               <td align="right" style="font-weight: bold; font-size: 1.8em;">€ <?php echo number_format($total, 2); ?></td>  
                        
							  </tr>  
							  
				
								<?php
                          }  
                          ?>  
                     </table> 


		<form action="" method="post">
		
		<ul>
		
		<li>

			<br>
			<input type="number" name="tel" placeholder="Telefono numeris" >
		</li >
		<li>

			<br>
			<input type="text" name="address" placeholder="Adresas">
		</li>
			<br>

		<li>
		Mokėjimo būdas
		<select>
		<option>PayPal</option>
		<option>SwedBank</option>
		<option>DNB</option>
		<option>Danske</option>
		</select>
		
		<li >
			<input type="submit" value="Mokėti" class="btn btn-success">
		</li>
		
		</ul>
		
		
		</form>
		




    <?php 
	include 'includes/overall/footer.php';
?>
