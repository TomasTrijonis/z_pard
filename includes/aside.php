
<aside id="Just_A_Random_ID">
<?php 
if(logged_in()) {
	 ?>
<a href="logout.php">Atsijungti</a>
	<?php 
} else {
include 'includes/widgets/login.php';
}
 ?>
</aside>
