        
		   
		   <div>
                <!--<h4>Prisijungimas</h4>-->
                <div>
				
				<?php
				//function logged_in() {
					//return(isset($_SESSION['user_id'])) ? true : false;
					//}
				
				if(logged_in() === false) { ?>
				
                  <form action="login.php" method="post" id="signin" class="navbar-form navbar-right" role="form">
						<ul id='login'>
						<div class="input-group">
					
							<li>
								<div class="input-group" style = "padding-bottom: 5px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" class="form-control" type="text" name="username" placeholder="Vartotojo vardas">			
							</li>
							</div>
							<li>
								<div class="input-group" style = >
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password" class="form-control" type="password" name="password" placeholder="Password">	
							</li>
							
							</div>
								<input type="submit" name="Prisijungti" class="btn btn-primary" style="margin-top: 5px;" value="Prisijungti">
								<a class="btn btn-primary" style="margin-top: 5px; color: white;" href="register.php">Registracija </a>
						</ul>
						
				   </form>

				   
				<?php } else 
					header ("Location: ../../index.php");
				
				
				?>
			   
                </div>
            </div>
			</div>
			

