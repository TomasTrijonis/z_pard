
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
	
	global $user_data;
	if($user_data['username']=='admin'){
	?>
	<br><br>
	<a href="admin.php">Administratoriaus puslapis</a>
	<?php 
	}
	?>
</aside>
