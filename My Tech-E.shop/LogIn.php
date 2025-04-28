<?php   
       $page_title = 'Login ';
       include ('Includes/Main-Follow-Bg.html');
include ('Includes/SearchBar.html');
      ?>


    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            
            <button type="button" class="toggle-btn" >Login Page</button>

 
        </div>
     

        
  <?php 

if (isset($_POST['submitted'])) {

	require_once ('Includes/login_functions.inc.php');
	require_once ('mysqli_connect.php');
	list ($check, $data) = check_login($dbc, $_POST['Email'], $_POST['Password']);
	
	if ($check) { 
			
		
		session_start();
		$_SESSION['User_Id'] = $data['User_Id'];
		$_SESSION['First_name'] = $data['First_name'];
		$_SESSION['Email'] = $_POST['Email'];
		$_SESSION['Password'] = $_POST['Password'];
		
		// Redirect:
		$url = absolute_url ('loggedin.php');
		header("Location: $url");
		exit();
			
	} else { // Unsuccessful!
		$errors = $data;
	}
		
	mysqli_close($dbc);

} // End of the main submit conditional.

include ('Includes/login_page.inc.php');
?>
    
       
</div>



</body>
</html>