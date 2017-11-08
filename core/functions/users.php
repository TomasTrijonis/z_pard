<?php
// function mysqli_result($res,$row=0,$col=0){ 
    // $numrows = mysqli_num_rows($res); 
    // if ($numrows && $row <= ($numrows-1) && $row >=0){
        // mysqli_data_seek($res,$row);
        // $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        // if (isset($resrow[$col])){
            // return $resrow[$col];
        // }
    // }
    // return false;
// }

function register_user($register_data) {
	include ('core/database/connect.php');
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	
	
	mysqli_query($con, "INSERT INTO users ($fields) VALUES ($data)");
	
}

function user_data($user_id) {
	$data=array();
	$user_id=(int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if($func_num_args>1){
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		include ('core/database/connect.php');
		$data=mysqli_fetch_assoc(mysqli_query($con,"SELECT $fields FROM users WHERE user_id = $user_id"));

		return $data;
		
	}
	
}


function logged_in() {
	return(isset($_SESSION['user_id'])) ? true : false;
}

function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field];
} 

function user_exists($username){

	$username=sanitize($username);
	include ('core/database/connect.php');
	$query = mysqli_query($con,"SELECT user_id FROM users WHERE username = '$username'");
	return (mysqli_num_rows($query) == 1) ? true : false;
}

function email_exists($email){
	
	$email=sanitize($email);
	include ('core/database/connect.php');
	$query = mysqli_query($con,"SELECT user_id FROM users WHERE email = '$email'");
	return (mysqli_num_rows($query) == 1) ? true : false;
}

function user_id_from_username($username) {
	$username = sanitize($username);
	include ('core/database/connect.php');
	$query = mysqli_query($con,"SELECT user_id FROM users WHERE username = '$username'");
	return mysqli_result($query, 0, 'user_id');
	
}

function login($username, $password){
	$user_id=user_id_from_username($username);
	include ('core/database/connect.php');
	$username=sanitize($username);
	$query = mysqli_query($con,"SELECT COUNT(user_id) FROM users WHERE username = '$username' AND password = '$password'");
 
 return (mysqli_result($query,0)==1) ? $user_id : false;
}
?>


