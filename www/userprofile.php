<?php
	require_once('header.php');
	?>
		<nav class="navtop">
		</nav>
		<div class="content">
			<center><h2>Profile Page</h2></center>
			<br>
			<div>	
				<center><table>
					<tr>
						<td>Username: </td>
						<td>
							<?php
						if(isset($_SESSION["username"])) {
							$username = $_SESSION["username"];
							echo "$username";
						}
						?>
						</td>
					</tr>
					<tr>
						<td>Name:</td>
						<td>
							<?php
						if(isset($_SESSION["name"])) {
							$name = $_SESSION["name"];
							echo "$name";
						}
						?>
						</td>
					</tr>
                    <tr>
						<td>Address:</td>
						<td>
							<?php
						if(isset($_SESSION["address"])) {
							$address = $_SESSION["address"];
							echo "$address";
						}
						?>
						</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td>
							<?php
						if(isset($_SESSION["password"])) {
							$address = $_SESSION["password"];
							echo "$address";
						}
						?>
						</td>
					</tr>
					<tr>
						<td>Profile Picture:</td>
						<td>
							<?php
						if(isset($_SESSION["file"])) {
							$address = $_SESSION["profilepic"];
							echo "$address";
						}
						?>
						</td>
					</tr>
				</table></center>
			</div>
		</div>	
	</body>
	<br>
	</br>
	<?php
	require_once('footer.php');
	?>
</html>