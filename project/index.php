<?php
	require "header.php";
?>

<main>
	<div class="main">
		<section class="default">
			<h1>Welcome to the phonebook project site</h1>
			<?php 
				if(isset($_SESSION['userId'])){
					echo '<h2>You are logged in as '.$_SESSION['userUid'].' !</h2>';
				}else{
					echo '<h2>You are logged out!</h2>';
				}
			?>
		</section>
	</div>
</main>

<?php
if(isset($_SESSION['userId'])){
	if($_SESSION['userUid']=='admin'){
		echo '<img src="img/admin.png" alt="cat"/>';}}

	require "footer.php";
?>