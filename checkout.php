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
						  $games="";
								 foreach($_SESSION["shopping_cart"] as $keys => $values){
									$games .= $values["item_name"] . " " .$values["item_quantity"] ."; ";}
									//čia ciklas nustato kintamaji pagal zaidimus ir ju kiekius, veliau bus isvedama i db
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
									
                               }  
                          ?>  
                          <tr>  
                               <td colspan="2" align="right" style="font-weight: bold; font-size: 1.8em;">Viso mokėti</td>  
                               <td align="right" style="font-weight: bold; font-size: 1.8em;">€<?php echo number_format($total, 2);?></td>  
                        
							  </tr>  
							  
				
								<?php
                          }  
                          ?>  
                     </table> 

	<?php //if(isset($_GET['success']) && empty($_GET['success'])) {
			
			//echo 'Užsakymas sėkmingai pateiktas!';
			
		//} else {
		
				$username=$_COOKIE['user_id'];

		if(empty($_POST) === false && empty($errors) === true) {
			
			$cart_data=array(
			
			'GAMES'			=> $games,
			'PRICE'			=> $total,
			'TEL' 			=> $_POST['telefonas'],
			'AD' 			=> $_POST['AD'],
			'PAYMENT' 		=> $_POST['PAYMENT'],
			'USER' 			=> $username,
			);
			

			cart_user($cart_data);

			echo 'Užsakymas sėkmingai pateiktas!';
			exit();
			
		} else if(empty($errors) === false){
			
			echo output_errors($errors);
			
	//	}
		}?>
		

		<form action="" method="post">
		
		<ul>
		
		<li>

			<br>
			<input type="number" name="telefonas" placeholder="Telefono numeris" value="<?php
$sql="SELECT TEL FROM mokejimai where USER='$username' ORDER BY order_id DESC LIMIT 1";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
$string=$row['TEL'];
$string = preg_replace('/\s+/', '', $string);
echo $string;
}?>">
		</li >
		<li>

			<br>
			<input type="text" name="AD" placeholder="Adresas" value="<?php
$sql="SELECT AD FROM mokejimai where USER='$username' ORDER BY order_id DESC LIMIT 1";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result)) {
$string=$row['AD'];
$string = preg_replace('/\s+/', '', $string);
echo $string;
}?>">
		</li>
			<br>

		<li>
		Mokėjimo būdas
		<select name="PAYMENT">
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
