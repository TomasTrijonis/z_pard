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


