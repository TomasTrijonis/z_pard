<?php
include 'core/init.php';
include 'includes/overall/header.php';

if (user_exists('user')==true)
{
	echo 'exists';
	} 


if (empty($_POST)===false) {
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if (empty($username) || empty($password)) {
				
		$errors[] = 'Privaloma įrašyti vartotojo vardą ir slaptažodį';
		
	} else if (user_exists($username) === false) {
		
		$errors[] = 'Vartotojas neegzistuoja';
	} else {
		
		$login = login($username, $password);
		
		if ($login === false) {
			$errors[] = 'Neteisingas slaptažodis';
		} else {
			//set the user session, redirect to home
			$_SESSION['user_id']=$login;
			header('Location: index.php');
			exit();
		}
		
		
	}
	
	print_r($errors);
}

include 'includes/overall/footer.php';
?>