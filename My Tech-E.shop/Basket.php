<?php   
       $page_title = 'Basket';
    session_start(); 
include ('Includes/Main-Follow.html');


// Check if the form has been submitted (to update the cart):
if (isset($_POST['submitted'])) {

	// Change any quantities:
	foreach ($_POST['qty'] as $k => $v) {

		// Must be integers!
		$pid = (int) $k;
		$qty = (int) $v;
		
		if ( $qty == 0 ) { // Delete.
			unset ($_SESSION['cart'][$pid]);
		} elseif ( $qty > 0 ) { // Change quantity.
			$_SESSION['cart'][$pid]['quantity'] = $qty;
		}
		
	} // End of FOREACH.
} // End of SUBMITTED IF.

// Display the cart if it's not empty...
if (!empty($_SESSION['cart'])) {

	// Retrieve all of the information for the prints in the cart:
	require_once ('mysqli_connect.php');
	$q = "SELECT Product_Id, Product_Name,Type FROM products WHERE  products.Product_Id IN (";
	foreach ($_SESSION['cart'] as $pid => $value) {
		$q .= $pid . ',';
	}
	$q = substr($q, 0, -1) . ') ORDER BY products.Product_Name ASC';
	$r = mysqli_query ($dbc, $q);
	
	// Create a form and a table:
	echo '<form action="Basket.php" method="post">
<table border="0" width="75%" cellspacing="3" cellpadding="3" align="center" style="transform: translate(-50%, -50%); color: black; position: absolute; top: 38%; left:50.5%;">
	<tr>
		<td align="left" width="30%"><b>Product</b></td>
		<td align="left" width="30%"><b>Type</b></td>
		<td align="right" width="10%"><b>Price</b></td>
		<td align="center" width="10%"><b>Qty</b></td>
		<td align="right" width="10%"><b>Total Price</b></td>
	</tr>
';

	// Print each item...
	$total = 0; // Total cost of the order.
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
		
		// Calculate the total and sub-totals.
		$subtotal = $_SESSION['cart'][$row['Product_Id']]['quantity'] * $_SESSION['cart'][$row['Product_Id']]['Price'];
		$total += $subtotal;
		
		// Print the row.
		echo "\t<tr>
		<td align=\"left\">{$row['Product_Name']}</td>
		<td align=\"left\">{$row['Type']}</td>
		<td align=\"right\">\${$_SESSION['cart'][$row['Product_Id']]['Price']}</td>
		<td align=\"center\"><input type=\"text\" size=\"3\" name=\"qty[{$row['Product_Id']}]\" value=\"{$_SESSION['cart'][$row['Product_Id']]['quantity']}\" /></td>
		<td align=\"right\">$" . number_format ($subtotal, 2) . "</td>
	</tr>\n";
	
	} // End of the WHILE loop.
	
	mysqli_close($dbc); // Close the database connection.

	// Print the footer, close the table, and the form.
	echo '<tr>
		<td colspan="4" align="right"><b>Total:</b></td>
		<td align="right">$' . number_format ($total, 2) . '</td>
	</tr>
	</table>
	<div align="center" style="color: black; position: absolute; top: 63%; left:45.5%;"> <input type="submit" name="submit" value="Update My Cart" /></div>
	<input type="hidden" name="submitted" value="TRUE" />
	</form><p align="center" style="color: black; position: absolute; top: 66%; left:41.5%;">Enter a quantity of 0 to remove an item.
	<br /><br /><a style="  text-decoration-line: underline; color: red; position: absolute; top: 85%; left:37.5%;" href="checkout.php">Checkout</a></p>';

} else {
	echo '<p>Your cart is currently empty.</p>';
}


?>

    
    
    </body>
</html>