<html>
<head>
	<title>Welcome to chatroom</title>
	<link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<body>
	<div class="bgimg">  
				<img src="img/bg.jpg" alt=" ">
	</div>
	<div id="singup div">
		<form id="form2" method ="post" action="Insert User.php">
			<img src="img/1.png" class="img">
			<table>
				<input type="text" name="UserName" placeholder="Username" required>
				<input type="email" name="UserEmail" placeholder="Email" required>
				<input type="password" name="UserPassword" placeholder="Password" required>
				<input type="password" name="cpassword" placeholder="Confirm Password" required>
				<input type="submit" value="Singup">
				<?php
					if(isset($_GET['success'])){
				?>
				<tr>
					<td></td><td><span style="color: green;">UserInserted</span></td>
				</tr>
				<?php
					}
				?>
			</table>
		</form>
	</div>

</body>
</html>