<?php
include 'core/init.php';



if (empty($_POST)===false) {
	
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
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
			
			$cookie_name = "user_id";
$cookie_value = "username";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
			
			header('Location: index.php');
			exit();
		}
		
		
	}

}


include 'includes/overall/header.php';
output_errors($errors);
include 'includes/overall/footer.php';
?>