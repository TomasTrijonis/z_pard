      <?php  
	  
	  //bandziau resetting cart ir redirecting i index.php kai baigia checkout....
	  
	  
	  include 'core/init.php'; 
include 'includes/overall/header.php'; 

if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  

						  $games="";
								 foreach($_SESSION["shopping_cart"] as $keys => $values){
									$games .= $values["item_name"] . " " .$values["item_quantity"] ."; ";}
									//čia ciklas nustato kintamaji pagal zaidimus ir ju kiekius, veliau bus isvedama i db
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
							   
                                 
                          

	  		if(empty($_POST) === false && empty($errors) === true) {
			
			$cart_data=array(
			
			'GAMES'			=> $games,
			'PRICE'			=> $total,
			'TEL' 			=> $_POST['telefonas'],
			'AD' 			=> $_POST['AD'],
			'PAYMENT' 		=> $_POST['PAYMENT'],

			);
			

			cart_user($cart_data);

			echo 'Užsakymas sėkmingai pateiktas!';
			exit();
			
		} else if(empty($errors) === false){
			
			echo output_errors($errors);
			

		} else
		{ echo "";}
		


           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  

                     unset($_SESSION["shopping_cart"][$keys]);  
					
                 
           }  
       
  					  ?>
					  <script type="text/javascript">
    window.location = "localhost/z_pard/index.php";
</script>
					  <?php
						  }
         
      



 	  
 

            
							   	include 'includes/overall/footer.php';
							   ?>