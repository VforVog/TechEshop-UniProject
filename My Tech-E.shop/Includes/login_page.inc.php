<?php 

if (!empty($errors)) {
	echo '<h1 style="position: relative; top:190px; color:blue;">Error!</h1>
	<p class="error" style="position: relative; top:190px;">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p style="position: relative; top:190px;">Please try again.</p>';
}


?>
  
        <form action="LogIn.php" method="post" class="input-group" id="LogIn">
            <input type="email" class="input-field" placeholder="Email Adress" name="Email" size="20" maxlength="80">
            <input type="password" class="input-field" placeholder="Password"  name="Password" size="20" maxlength="20"><br><br>
            <button type="submit" class="sumbit-btn" name="submit" value="Login">Log In</button>
            <input type="hidden" name="submitted" value="TRUE">
        </form>


