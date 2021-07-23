<?php
	require "header.php";
?>

<main>
	<div class="main">
		<section class="signup">
			
			<?php
				function errorCheck($Error,$Statement){
					if($_GET['error']==$Error){
						echo '<p class="error">'.$Statement.'</p>'; }}
				if(isset($_GET['error'])){
						errorCheck('emptyfields','Please fill in the fields!');
						errorCheck('invalidmailuserid','Invalid username and e-mail!');
						errorCheck('invalidmail','Invalid e-mail!');
						errorCheck('invaliduserid','Invalid username!');
						errorCheck('passcheck','Your passwords don\'t match!');
						errorCHeck('usertaken','Username already taken!');
						errorCheck('sqlerror','Could not connect to database!');
				}
				else if(isset($_GET['signup']) and $_GET['signup']=='success')
					echo '<h2>You have successfully registered</h2>';
					else echo "<h3>Fill in all the details to sign up.</h3>";
				function val($x){
					if(isset($_GET[$x]))
						echo "value=\"".$_GET[$x]."\"";
				}
			?>
			<form class="signup" action="php/signupp.php" method="post">
				<input type="text" name="userid" placeholder="Username" <?php val('userid')?>>
				<input type="text" name="mail" placeholder="E-mail" <?php val('mail')?>>
				<input type="password" name="passw" placeholder="Password">
				<input type="password" name="passw-r" placeholder="Repeat password"><br/>
				<button type="submit" name="signup-submit">Sign Up</button>
			</form>
		</section>
	</div>
</main>

<?php
	require "footer.php";
?>