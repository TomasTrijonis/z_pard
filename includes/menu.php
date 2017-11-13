        <nav class="navbar navbar-inverse">
			  <div class="container-fluid">
            <ul class="nav navbar-nav">
		
		<?php	if($showGenre = $con->query("SELECT * FROM kategorijos")) {

			if($showGenre->num_rows) {
				
				
				
				while($zanras = $showGenre->fetch_assoc()) {
					
					?><li class="active">
					<a href='<?php echo $zanras['genre_id']; ?>.php'><?php
					echo $zanras['zanras'];
					?></a><li>					

					
					<?php
					

				

				}
				
				
			}
			} ?>

            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Registracija</a></li>
				<li><a href="includes/widgets/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
			
	<?php 
	/*if(logged_in()) {
		include 'includes/widgets/loggedin.php';
		?>
		<a href="logout.php">Atsijungti</a>
		<?php 
	} else {
		include 'includes/widgets/login.php';
	}*/
	?>
			
        </nav>
		
		
		<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>-->