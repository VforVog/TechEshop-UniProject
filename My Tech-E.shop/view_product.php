<?php # Script 17.6 - view_print.php
// This page displays the details for a particular print.
session_start();
$row = FALSE; // Assume nothing!

if (isset($_GET['pid']) && is_numeric($_GET['pid']) ) { // Make sure there's a print ID!

	$pid = (int) $_GET['pid'];
	
	// Get the print info:
	require_once ('mysqli_connect.php'); 
	$q = "SELECT Product_Name, Price, Brand, Price, Type, Image_Name FROM products WHERE Product_Id = $pid";
	$r = mysqli_query ($dbc, $q);
	if (mysqli_num_rows($r) == 1) { // Good to go!
	
		// Fetch the information:
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
		
		// Start the HTML page:
		$page_title = $row['Product_Name'];
	include ('Includes/Main-Follow.html');


	
		// Display a header:
		echo "<div align=\"center\" >
	<b style='position: absolute; top: 16%; left:45%;'>{$row['Product_Name']}</b>";
	

		echo "<br /><p style='position: absolute; top: 19%; left: 47%;'> \${$row['Price']} </p>
	<a style='position: absolute;color:red; top: 19%;   text-decoration-line: underline;
' href=\"add_cart.php?pid=$pid\">Add to Cart</a>
	</div><br />";
	
		// Get the image information and display the image:
		if ($image = @getimagesize ("uploads/$pid")) {
			echo "<div align=\"center\"><img style='position:absolute; top:267px; right:27%; height: 491px;width: 787px;' src=\"show_image.php?image=$pid&name=" . urlencode($row['Image_Name']) . "\" $image[3] alt=\"{$row['Product_Name']}\" /></div>\n";	
		} else {
			echo "<div align=\"center\">No image available.</div>\n"; 
		}
		
		// Add the description or a default message:
		echo '<p style="position: absolute; bottom: 14%; left:50%;">' . ((is_null($row['Type'])) ? '(No description available)' : $row['Type']) . '</p>';
	
	} // End of the mysqli_num_rows() IF.
	
	mysqli_close($dbc);

}

if (!$row) { // Show an error message.
	$page_title = 'Error';
include ('Includes/Main-Follow.html');

	echo '<div align="center">This page has been accessed in error!</div>';
}


?>
