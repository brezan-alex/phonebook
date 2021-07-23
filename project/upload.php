<?php
	require "header.php";
?>

<main>
	<div class="main">
			
			<?php
				function val($x){
					if(isset($_GET[$x]) and !empty($x))
						echo "value=\"".$_GET[$x]."\"";}
				
			if(isset($_SESSION['userId'])){
					echo '<h1>Fill in details to add to database</h1>';
				function errorCheck($Error,$Statement){
					if($_GET['error']==$Error){
						echo '<p class="error">'.$Statement.'</p>'; }}
				if(isset($_GET['error'])){
						errorCheck('emptyfields','Please fill in the fields!');
						errorCheck('invalid4','Invalid first name, last name, phone and e-mail!');
						errorCheck('invalidmail','Invalid e-mail!');
						errorCheck('fname','Invalid first name!');
						errorCheck('lname','Your last name!');
						errorCHeck('phoneis','Phone is too short or is already in database!');
						errorCHeck('emailis','E-mail already in database!');
						errorCheck('sqlerror','Could not connect to database!');
				}
				if(isset($_GET['upload']))if($_GET['upload']=='success')
					echo '<h2>You have successfully added details</h2>';
				
			echo '
			<form class="upload" action="php/dbupload.php" method="post">
			<input type="text" name="fname" placeholder="First Name" ',val('fname'),'>
			<input type="text" name="lname" placeholder="Last Name" ',val('lname'),'>
				<input type="text" name="phone" placeholder="Phone Number" ',val('phone'),'>
			<input type="text" name="addres" placeholder="Addres" ',val('addres'),'>
				<input type="text" name="city" placeholder="City" ',val('city'),'>
				<input type="text" name="email" placeholder="E-mail" ',val('email'),'><br/>
				<button type="submit" name="upload-submit">Upload info</button>
			</form>';
			
			}else echo '<h1>You need to be logged in to add someone.</h1>'; ?>
	</div>
</main>
<?php
	require "footer.php";
?>