<?php 
include('connections/mysqli_connection.php');
include('functions.php');
?>
<html style = "background-image:url('img/purpleImage.jpg');background-repeat: no-repeat; background-size:cover;">
	<head>
		<link rel = "stylesheet" href = "css/myStyle.css" type = "text/css"/>
	</head>
	<body >
		<header class = "header">
			<p  class = 'Logo'> 
				American Politics
			</p>
		</header>
		<div id = "centerul">
			
				<li><a href = 'index.php'> Home </a></li>
				<li><a href = 'categories.php'> Topics </a></li>
			
				<?php iflog('login'); ?>
			
		</div>
			<div class="content">
			<?php
		echo "<form id = 'loginBox' action = 'login.php' method = 'POST'>
					<table style = 'border:none;margin: 10% auto'>
						<tr>
							<th style = 'border:none;'>Username</th>
							<th style = 'border:none;'> <input style = 'border:none;border-radius: 5px;'type = 'text' name = 'username'  size='15' maxlength='25'/>
								<td id = 'userTaken'></td>
							</th>
						</tr>
						
						<tr>
							<th style = 'border:none;'>Password</th>
							<th style = 'border:none;'> <input style = 'border:none;border-radius: 5px;' type = 'password' name = 'password' size='15' maxlength='50'/>
								<td id = 'IncorrectPassword'></td>
							</th>
						</tr>
						<tr>
							<th colspan = '2' style = 'border:none;'>
								<input style = 'width:100px; height:25px;border-radius: 5px;'  name = 'submit' type = 'submit' value = 'Login'/>
							</th>
						</tr>
					</table>
				</form>";
				login();
				?>
			</div>
		
		<footer class="footer">
			<span class = 'SocialMedia'>
				Social Media Icons
			</span>
		</footer>
	</body>
</html>