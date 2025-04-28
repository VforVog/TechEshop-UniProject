<?php # Script 11.11 - logout.php #2
// This page lets the user logout.

// Access the existing session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['User_Id'])) {

	require_once ('Includes/login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit();

} else { // Cancel the session.

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include ('Includes/Main-Follow-Bg.html');

// Print a customized message:
echo "<h1>Logged Out!</h1>
<p>You are now logged out!</p>";


?>
