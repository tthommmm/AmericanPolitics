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
			
				<?php iflog(''); ?>
		
			
		</div>
			<div class="content">
				<?php
				$sql = "Select COUNT(reply_id) AS ttl from reply where user_id = ".$_SESSION['user_id']."";
				$result = mysqli_query($con, $sql);
				while($row = mysqli_fetch_assoc($result)){
					$sql1 = "Select MAX(dateposted), title, post_id, topic_id from post where user_id = ".$_SESSION['user_id']."";
					$result1 =  mysqli_query($con, $sql1);
					while($row1 = mysqli_fetch_assoc($result1)){
					echo "<form action ='logout.php'>
							<table id = 'loginBox' style = 'width: 500px;margin: 5% auto'>
									
								<tr>
									<th style = 'text-align:left;border:none;'>Username:<span style = 'color:red;'>$_SESSION[username]</span></th>
									<th style = 'text-align:left;border:none;'><input action = 'logout.php' type = 'submit' value = 'Logout' /></th>
								</tr>
								
								<tr>
									<th style = 'text-align:left;border:none;'>Password: <span style = 'color:red;'> $_SESSION[password]</span></th>
									<th style = 'text-align:left;border:none;'>Total Replies: $row[ttl]</th>
								</tr>
								
								<tr>
									<th style = 'text-align:left;border:none;'>Total Posts: </th>
								</tr>
								
								<tr>
									<th colspan = '2' style = 'text-align:left;border:none;'> Latest Post: <a href = 'reply.php?topic_id=$row1[topic_id]&post_id=$row1[post_id]&cP=1'><span style = 'color:red;'>$row1[title]  </span></a> </th>
								</tr>
								
								
							
							</table>
							</form>
						";
				}
				}
				?>
		
			</div>
		<footer class="footer">
			<span class = 'SocialMedia'>
				Social Media Icons
			</span>
		</footer>
	</body>
</html>