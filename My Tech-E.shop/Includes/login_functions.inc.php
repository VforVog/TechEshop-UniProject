<?php 

function absolute_url ($page = 'MyTech-Eshop.php') {


	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	

	$url = rtrim($url, '/\\');
	

	$url .= '/' . $page;
	
	
	return $url;

} 
function check_login($dbc, $Email = '', $Password = '') {

	$errors = array(); 
    
	if (empty($Email)) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($Email));
	}
	
	
	if (empty($Password)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($Password));
	}

	if (empty($errors)) { 

	
		$q = "SELECT User_Id, First_name FROM users WHERE Email='$e' AND Password=SHA1('$p')";		
		$r = @mysqli_query ($dbc, $q); 
		
	
		if (mysqli_num_rows($r) == 1) {
		
		
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
			
		
			return array(true, $row);
			
		} else { 
			$errors[] = 'The email address and password entered do not match those on file.';
		}
		
	} 
	
	
	return array(false, $errors);

} 

?>