        
		   
		   <div class="widget">
                <h4>Prisijungimas</h4>
                <div class="inner">
				
				<?php
				//function logged_in() {
					//return(isset($_SESSION['user_id'])) ? true : false;
					//}
				
				if(logged_in() === false) { ?>
				
                   <form action="login.php" method="post">
						<ul id='login'>
							<li>
								Vartotojo vardas:<br>
								<input type="text" name="username">			
							</li>
							<li>
								Slaptažodis:<br>
								<input type="password" name="password">	
							</li>
							<li>
								<input type="submit" name="Prisijungti">
							</li>
							<li>
								<a href="../../register.php">Registracija</a>
							</li>
						</ul>
						
				   </form>
				   
				<?php } else 
					header ("Location: ../../index.php");
				
				
				?>
			   
                </div>
            </div>
			

