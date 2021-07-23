<?php
	require "header.php";
?>
<main>
	<div class="main">
	<?php
		if($_SESSION['userUid']=='admin'){
			function errorCheck($Error,$Statement){
				if($_GET['error']==$Error){
					echo '<p class="error">'.$Statement.'</p>'; exit();}}
			if(isset($_GET['error'])){
					errorCheck('emptyfields','Please fill in the fields!');
					errorCheck('invalid4','Invalid first name, last name, phone and e-mail!');
					errorCheck('invalidmail','Invalid e-mail!');
					errorCheck('fname','Invalid first name!');
					errorCheck('lname','Your last name!');
					errorCHeck('phoneis','Phone is too short or is already in database!');
					errorCHeck('emailis','E-mail already in database!');
					errorCheck('sqlerror','Could not connect to database!');}
			if(isset($_GET['phone'])){
				require "php/dbh.php";
				$phone=$_GET['phone'];
				echo "<h2>Here you can modify information.</h2><br/>";
				$sql="SELECT * FROM phonebook WHERE phone=$phone";
				$res = $conn->query($sql);
				$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						header("Location: edit.php?error=sqlerror");
						exit();
					}else{
						$show = $res->fetch_assoc();
							function input($name,$value,$Show){
								echo "<input type='text' name='$value' placeholder='$name' value='$Show'>";}
				echo "<form class='upload' action='php/editor.php' method='post'>";
				input('First Name','fname',$show['fname']);
				input('Last Name','lname',$show['lname']);
				input('Phone Number','phone',$show['phone']);
				input('Street Address','addres',$show['addres']);
				input('City','city',$show['city']);
				input('E-mail','email',$show['email']);
				echo "<br/><br/> <button type='submit' name='editinfo'>Edit information</button> </form>";
				}
			}else {if(isset($_GET['edit']) && $_GET['edit']=='success')
						echo "<h2>You succefully edited entry.</h2><br/>";
							else echo "<h2>The edit failed.</h2><br/>";}
		}
		else{echo "<h2>You are not allowed to edit the phonebook.</h2>";}
	?>
	</div>
</main>
<?php
	require "footer.php";
?>