<?php
function sanitize($data) {
	include ('core/database/connect.php');
	return mysqli_real_escape_string($con,$data);
}


function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		echo $error, ', ';
	}	
}

function admin_protect(){
	global $user_data;
	if($user_data['username']!='admin'){
		header('Location: index.php');
		exit();
		
	}
}
?>