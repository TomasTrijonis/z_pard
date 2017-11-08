<?php 
include 'core/init.php'; 
include 'includes/overall/header.php'; 

if(empty($_POST) === false) {
	
	$required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
	foreach($_POST as $key=>$value) {
		
	if(empty($value) && in_array($key, $required_fields) === true) {
		
		$errors[] = 'Fields marked with an asterisk are required';
		break 1;
		
	}

	}
	
	if(empty($errors) === true) {
		
	if(user_exists($_POST['username']) === true) {	
		$errors[] = ' Atsiprašome, vartotojas \'' . $_POST['username'] . '\' jau egzistuoja.';
	}
	if(preg_match("/\\s/", $_POST['username']) == true){
		
		$errors[] = 'Vartotojo vardas turi būti be tarpų';
		
	}
		if(strlen($_POST['password']) < 6) {
			$errors[] = 'Jusu slaptazodis turi tureti bent 6 simbolius';
		}
		if ($_POST['password'] !== $_POST['password_again']) {
			$errors[] = 'Jūsų įvesti slaptažodžiai nesutampa';
		}
		
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			
			$errors[] = 'Neteisingai įvestas el. pašto adresas';
			
		}
		if(email_exists($_POST['email']) == true) {
			
			$errors[] = ' Atsiprašome, el. paštaas \'' . $_POST['email'] . '\' jau naudojamas.';
			
		} 
		
	}
	
}

?>


		<h1>Registracija</h1>
		
		<?php
		if(isset($_GET['success']) && empty($_GET['success'])) {
			
			echo 'Jus esate užregistruotas!';
			
		} else {
		
		
		
		if(empty($_POST) === false && empty($errors) === true) {
			
			$register_data=array(
			'username' 			=> $_POST['username'],
			'password' 			=> $_POST['password'],
			'first_name' 		=> $_POST['first_name'],
			'last_name' 		=> $_POST['last_name'],
			'email' 			=> $_POST['email']
			);
			
			register_user($register_data);
			header('Location: register.php?success');
			exit();
			
		} else if(empty($errors) === false){
			
			echo output_errors($errors);
			
		}
		
		?>
		
		
		
		<form action="" method="post">
		
		<ul>
		
		<li>
			Username*:<br>
			<input type="text" name="username">
		</li>
		<li>
			Password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			Password again*:<br>
			<input type="password" name="password_again">
		</li>
		<li>
			Vardas*:<br>
			<input type="text" name="first_name">
		</li>
		<li>
			Pavardė:<br>
			<input type="text" name="last_name">
		</li>
		<li>
			Email adresas*:<br>
			<input type="text" name="email">
		</li>
		
		<li>
			<input type="submit" value="Registruotis">
		</li>
		
		</ul>
		
		
		</form>
		
		
		
		
		
		
<?php 
		}
include 'includes/overall/footer.php'; ?>