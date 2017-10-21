
<aside>
	<?php 
	if(logged_in()) {
		include 'includes/widgets/loggedin.php';
		?>
		<a href="logout.php">Atsijungti</a>
		<?php 
	} else {
		include 'includes/widgets/login.php';
	}
	?>
</aside>
