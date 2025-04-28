<?php   
       $page_title = 'Sign Up';
       include ('Includes/Main-Follow-Bg.html');
include ('Includes/SearchBar.html');



if (isset($_POST['submitted'])) {

	require_once ('mysqli_connect.php'); 
		
	$errors = array(); 
	
	
	if (empty($_POST['First_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['First_name']));
	}
	
	
	if (empty($_POST['Last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['Last_name']));
	}
	
	
	if (empty($_POST['Email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['Email']));
	}
	
	
	if (!empty($_POST['Password1'])) {
		if ($_POST['Password1'] != $_POST['Password2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['Password1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) { 
	
		
		
		
		$q = "INSERT INTO users (First_name, Last_name, Email, Password) VALUES ('$fn', '$ln', '$e', SHA1('$p') )";		
		$r = @mysqli_query ($dbc, $q); 
		if ($r) { 
		
			
			echo '<h1>Thank you!</h1>
		<p>You are now registered. You are now able to log in!</p><p><br /></p>';	
		
		} else { 
			
		
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} 
		
		mysqli_close($dbc); 

	
		exit();
		
	} else { 
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} 
	
	mysqli_close($dbc); 

} 
      ?>


  <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>

            <button type="button" class="toggle-btn" >Register Page</button>
 
        </div>
        
       
        <form action="SignUp.php" method="post"  id="Register">
            <input type="text" class="input-field" placeholder="First Name" name="First_name" size="15" maxlength="20" required value="<?php if (isset($_POST['First_name'])) echo $_POST['First_name']; ?>" />
            <input type="text" class="input-field" placeholder="Last Name" name="Last_name" size="15" maxlength="40" required value="<?php if (isset($_POST['Last_name'])) echo $_POST['Last_name']; ?>" />
            <input type="email" class="input-field" placeholder="Email Adress" name="Email" size="20" maxlength="80" required value="<?php if (isset($_POST['Email'])) echo $_POST['Email']; ?>"  />
            <input type="password" class="input-field" placeholder="Password" name="Password1" size="10" maxlength="20" required >
            <input type="password" class="input-field" placeholder="Confirm Password" name="Password2" size="10" maxlength="20" required>
            <input type="checkbox" class="check-box" required>I agree to the terms & conditions 
            <button type="submit" class="sumbit-btn" name="submit" value="Register">Register</button>
            <input type="hidden" name="submitted" value="TRUE">
        </form>
        
      </div>
   


</body>
</html>

