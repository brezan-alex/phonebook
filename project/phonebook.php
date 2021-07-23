<?php
	require "header.php";
?>
<main>
	
	<div class="main">
		<?php 
			require "php/dbh.php";
			
			if(isset($_GET['sort'])){
				$sort=$_GET['sort'];
			}else{
				$sort='ASC';
			}
			
			if(isset($_GET['order'])){
				$order = $_GET['order'];
				if(strlen($order)>1)
					$result = $conn->query("SELECT * FROM phonebook ORDER BY $order $sort");
				else
					$result = $conn->query("SELECT * FROM phonebook WHERE fname LIKE \"$order%\"");
			}else{
				$order='fname';
				$result = $conn->query("SELECT * FROM phonebook ORDER BY $order $sort");
			}
			if(isset($_GET['youarenot'])){
				echo "<h2>You can't delete users</h2>";
			}
			if(isset($_GET['delete']) and isset($_GET['fn'])){
				if($_GET['delete']=='success')
					echo "<h2>You succefully deleted ".ucfirst($_GET['fn']).".</h2>";
				else if($_GET['delete']=='failed')
					echo "<h2>The delete failed </h2>";
				else echo "<h2>Something went wrong.</h2>";
			}
			$character = range('A', 'Z');
			echo '<ul class="charpage">';
			foreach($character as $alphabet){
				echo '<li><a href="phonebook.php?order='.$alphabet.'">'.$alphabet.'</a><li>
				';}			
			function th($dbName,$thName,$Sort,$Order){
				if($dbName==$Order){
					$Sort=='DESC' ? $Sort='ASC' : $Sort='DESC';
					echo "<th><a href='?order=$dbName&&sort=$Sort'>$thName<img src='img/arrow.png' alt='order'></a></th>
					";}	
				else{echo "<th><a href='?order=$dbName&&sort=$Sort'>$thName<img src='img/arrow.png' alt='order'></a></th>
				";}
			}
			echo '</ul>';
		echo "<table class='phonebook'>
			<tr>";
				th('fname','First Name',$sort,$order);
				th('lname','Last Name',$sort,$order);
				th('phone','Phone Number',$sort,$order);
				th('addres','Address',$sort,$order);
				th('city','City',$sort,$order);
				th('email','E-mail',$sort,$order);
		echo "<th>Edit/Remove</th></tr>";
				if(mysqli_num_rows($result)>0){
					while($rows=$result->fetch_assoc()){
							$fname=$rows['fname'];
							$lname=$rows['lname'];
							$phone=$rows['phone'];
							$addres=$rows['addres'];
							$city=$rows['city'];
							$email=$rows['email'];
							echo"<tr>
									<td>".ucfirst($fname)."</td>
									<td>".ucfirst($lname)."</td>
									<td>$phone</td>
									<td>".ucfirst($addres)."</td>
									<td>".ucfirst($city)."</td>
									<td>$email</td>
									<td><a href=\"edit.php?phone=$phone\"><img src='img/edit.png' alt='edit'/></a>
										<a href=\"php/phondelete.php?phone=$phone&fn=$fname\"><img src='img/delete.png' alt='delete'/></a></td>
								</tr>";
					}
					
				}else{echo "<tr><td colspan=\"6\">No phone numbers in database</td></tr>";}
			?>
		</table>
	</div>
</main>

<?php
	require "footer.php";
?>