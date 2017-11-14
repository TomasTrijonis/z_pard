        
		
		<nav class="navbar navbar-default" style="border: none; width: 100%;" > <!--class="navbar navbar-inverse"-->
		
		<div class="container-fluid"> <!--class="container-fluid"-->
			  
			   <div class="navbar-header">
				<a class="navbar-brand" href="index.php">Žaidimų parduotuvė</a>
				</div>
			  
            <ul class="nav navbar-nav"> <!--class="nav navbar-nav"-->
		
		<?php	if($showGenre = $con->query("SELECT * FROM kategorijos")) {
			if($showGenre->num_rows) {

				while($zanras = $showGenre->fetch_assoc()) {
					
					?><li>
					<a href='<?php echo $zanras['genre_id']; ?>.php'><?php
					echo $zanras['zanras'];
					?></a><li>					
					<?php

				}

			}
			} ?>
			
			<?php include 'includes/aside.php';?>
			
			<!--<form action="login.php" method="post" id="signin" class="navbar-form navbar-right" role="form">
						<ul id='login'>
						<div class="input-group">
					
							<li>
								<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" class="form-control" type="text" name="username" placeholder="Vartotojo vardas">			
							</li>
							</div>
							<li>
								<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password" class="form-control" type="password" name="password" placeholder="Password">	
							</li>
							</div>
							
								<button type="submit" name="Prisijungti" class="btn btn-primary "> Prisijungti </button>
							
							
								<a href="../../register.php">Registracija</a>
							
							
						</ul>
						
				   </form>-->

            </ul>
			<!--<ul class="nav navbar-nav navbar-right">
				<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
				<li><a href="includes/widgets/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>-->
			
	<?php 
	
	?>
			</div>
			
			
			
        </nav>
		
		
		
