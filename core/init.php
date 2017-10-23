<?php
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

if(logged_in()===true){
	
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id','username','password');
	
}

$errors=array();

// isveda (norimus duomenis is database i ekrana
/*
			if($result = $con->query("SELECT * FROM zaidimai")) {

			if($result->num_rows) {
				
				
				
				while($row = $result->fetch_assoc()) {
					
					echo $row['PAV'], '<br>';
					
				}
				
				
			}
			}
*/
?>