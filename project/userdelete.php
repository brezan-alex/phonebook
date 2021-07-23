<?php
	require "header.php";
?>

<main>
	<div class="main">
		<?php 
		if($_SESSION['userUid']=='admin'){
			require "php/dbh.php";
			
			if(isset($_GET['order'])){
				$order = $_GET['order'];
			}else{
				$order='idUsers';
			}
			
			if(isset($_GET['sort'])){
				$sort=$_GET['sort'];
			}else{
				$sort='ASC';
			}
			if(isset($_GET['delete'])){
				$del=$_GET['delete'];
				if($del=='success') echo "<h2>You succefully removed a user</h2>";
				else if($del=='failure') echo "<h2>The removal failed</h2>";
				else if($del=='admin') echo "<h2>You can't delete the admin</h2>";
				else echo "???";
			}
			else echo "<h2>Here you can see registered users and delete them.</h2>";
			$result = $conn->query("SELECT * FROM users ORDER BY $order $sort");
			
			function th($dbName,$thName,$Sort,$Order){
				if($dbName==$Order){
					$Sort=='DESC' ? $Sort='ASC' : $Sort='DESC';
					echo "<th><a href='?order=$dbName&&sort=$Sort'>$thName<img src='img/arrow.png' alt='order'></a></th>";}
					else {echo "<th><a href='?order=$dbName&&sort=$Sort'>$thName<img src='img/arrow.png' alt='order'></a></th>";}
			}
		echo "<table class='deleteusers'>
			<tr>";
				th('idUsers','Id',$sort,$order);
				th('uidUsers','Username',$sort,$order);
				th('emailUsers','Email',$sort,$order);
		echo "<th>Remove user</th></tr>";
				if($result->num_rows>0){
					$sort=='DESC' ? $sort = 'ASC' : $sort='DESC';
					while($rows=$result->fetch_assoc()){
							$id=$rows['idUsers'];
							$uid=$rows['uidUsers'];
							$eid=$rows['emailUsers'];
							echo"<tr>
									<td>$id</td>
									<td>$uid</td>
									<td>$eid</td>
									<td><a href=\"php/delett.php?id=$id\">Delete</a></td>
								</tr>";
					}
				}else{echo "<tr><td colspan=\"6\">No users in database (highly doubt).</td></tr>";}
		}
		else{
			header("Location: index.php");
			exit();
		}
			?>
		</table>
	</div>
</main>

<?php
	require "footer.php";
?>