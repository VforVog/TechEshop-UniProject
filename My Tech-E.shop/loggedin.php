<?php 


session_start(); 

if (!isset($_SESSION['User_Id'])) {
	require_once ('Includes/login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit();	
}

$page_title = 'Logged In!';
include ('Includes/Main-Follow.html');
include ('Includes/SearchBar.html');


// Print a customized message:
echo "<h1 style= 'position: absolute; color: black; top: 17%; left: 50%; transform: translate(-50%, -50%);'>Logged In!</h1>;
<p style= 'position: absolute; color: black; top: 22%; left: 48%; transform: translate(-50%, -50%); font-size:32px;'>You are now logged in and you can proceed in orders, {$_SESSION['First_name']}!</p>
p><a href=\"LogOut.php\">Logout</a></p>";



require_once ('mysqli_connect.php');
$q = "SELECT Product_Id, Product_Name, Brand, Price, Type FROM products  ORDER BY Brand ASC, Product_Name ASC";



echo '<table border="0" width="67%" cellspacing="34" cellpadding="8" align="center" style="transform: translate(-50%, -50%); color: black; position: absolute; top: 58%; left:51.5%;" >
	<tr>
		<td align="left" width="20%"><b>Products</b></td>
		<td align="left" width="20%"><b>Brand</b></td>
		<td align="left" width="40%"><b>Type</b></td>
		<td align="right" width="20%"><b>Price</b></td>
	</tr>';
    
    
    
// Display all the prints, linked to URLs:
$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {

	// Display each record:
	echo "\t<tr>
		<td align=\"left\"><a style='color: blue; text-decoration-line: underline; font-style: italic;' href=\"view_product.php?pid={$row['Product_Id']}\">{$row['Product_Name']}</a></td>
		<td align=\"left\">{$row['Brand']}</td>
		<td align=\"left\">{$row['Type']}</td>
		<td align=\"right\">\${$row['Price']}</td>
	</tr>\n";

} // End of while loop.

echo '</table>';
mysqli_close($dbc);

?>
 





    