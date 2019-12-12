<?php
include('connections/mysqli_connection.php'); 
include('functions.php'); ?>
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
				<li><a id = 'active' href = 'index.php'> Home </a></li>
				<li><a href = 'categories.php'> Topics </a></li>
	
			<?php iflog('home'); ?>
	
		</div>
			<div class="content">
		<?php
				 $sql = "Select p.topic_id, p.post_id, p.title, p.body, p.dateposted, u.username
						 from `post` AS p, `user` AS u
					     where p.user_id = u.user_id
						 ORDER BY dateposted DESC;";
						 
			$select = mysqli_query($con, $sql );

			echo "<div id = 'tableMarginWhileLoop'>";
				while($row = mysqli_fetch_assoc($select)) {
					echo "<table id = 'forum_posts'>
							<tr>
								<th id = 'left'><a href = 'reply.php?post_id=$row[post_id]&topic_id=$row[topic_id]&cP=1'>$row[title]</a></th>
								<th style = 'background:white;'> $row[body]</th>
								<th rowspan = '2'id = 'right'>$row[username] <br>"; echo date("l, M d - h:i a", strtotime($row['dateposted'])) . "</th>
							</tr>
						</table>";
				}
			echo "</div>";
				?>
			</div>
		<footer class="footer">
			<span class = 'SocialMedia'>
				Social Media Icons
			</span>
		</footer>
	</body>
</html>