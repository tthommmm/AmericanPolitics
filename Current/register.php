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
		
				<?php iflog('register'); ?>
			
			
		</div>
			<div class="content">
			<?php
			echo "<form id = 'loginBox' action = 'register.php' method = 'POST'>
					<table style = 'border:none;margin: 5% auto'>
						<tr>
							<th style = 'border:none;'>Username</th>
							<th style = 'border:none;'>
								<input style = 'border:none;border-radius: 5px;'type = 'text' name = 'username'  size='15' maxlength='25'/>
							</th>
						</tr>
						
						<tr>
							<th style = 'border:none;padding:5px;'>Password</th>
							<th style = 'border:none;padding:5px;'>
								<input style = 'border:none; border-radius: 5px;' type = 'password' name = 'password' size='15' maxlength='50'/>
							</th>
						</tr>
						
						<tr>
							<th style = 'border:none;padding:5px;'>Confirm Password</th>
							<th style = 'border:none;'>
								<input style = 'border:none; border-radius: 5px;' type = 'password' name = 'Cpassword' size='15' maxlength='50'/>
							</th>
						</tr>
						
						<tr>
							<th colspan = '2' style = 'border:none;'>
								<input style = 'width:100px; height:25px;border-radius: 5px;'  name = 'submit' type = 'submit' value = 'Register'/>
							</th>
						</tr>
						
						<tr>
							<th colspan = '2' style = 'border:none;'></th>
						</tr>
					</table>
				</form>";
				register();
				?>
			</div>
		<footer class="footer">
			<span class = 'SocialMedia'>
				Social Media Icons
			</span>
		</footer>
	</body>
</html>