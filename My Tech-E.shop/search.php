<?php
$page_title = 'Our Searched Products';
include ('Includes/Main-Follow.html');
include ('Includes/SearchBar.html');
?>


<?php
    $dbc=mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysqli_connect_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysqli_select_db($dbc,"eshop") or die(mysqli_connect_error());
    /* tutorial_search is the name of database we've created */
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" />
</head>
    <style>
        
        #ok{
            border="0"
            width="67%" 
            cellspacing="34" ;
            cellpadding="8" ;
            align="center";
            style="transform: translate(-50%, -50%);
            color: black; 
            position: absolute;
            top: 58%; 
            left:51.5%;     

        }
        
    </style>
<body>
<?php
    $query = $_GET['search']; 
    // gets value sent over search form
     
    $min_length = 0;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
       
        $raw_results = mysqli_query($dbc,"SELECT * FROM products
            WHERE (`Product_Name` LIKE '%".$query."%') OR (`Brand` LIKE '%".$query."%') OR (`Type` LIKE '%".$query."%') ") or die("Errorrrrr".mysqli_connect_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
            
            
            
          echo '<table border="0" width="67%" cellspacing="34" cellpadding="8" align="center" style="transform: translate(-50%, -50%); color: black; position: absolute; top: 51%; left:51.5%;" >
	<tr>
		<td align="left" width="20%"><b>Products</b></td>
		<td align="left" width="20%"><b>Brand</b></td>
		<td align="left" width="40%"><b>Type</b></td>
		<td align="right" width="20%"><b>Price</b></td>
	</tr>';
            
       
            while($results = mysqli_fetch_array($raw_results, MYSQLI_ASSOC)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             

                echo "\t<tr>
		<td align=\"left\">{$results['Product_Name']}</td>
		<td align=\"left\">{$results['Brand']}</td>
		<td align=\"left\">{$results['Type']}</td>
		<td align=\"right\">\${$results['Price']}</td>
	</tr>\n";

} // End of while loop.

echo '</table>';
            
            
            
            
            
          
               
                // posts results gotten from database(title and text) you can also show id ($results['id'])
                
              
 
            }
             
        }
        else{ // if there is no matching rows do following
            echo "<p align='center'> <font color=red  size='9px'>No Results</font> </p>";
        }
         

?>
</body>
</html>