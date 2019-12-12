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
				<li><a id = 'active' href = 'categories.php'> Topics </a></li>
		
				<?php iflog('topics'); ?>
	
			
		</div>
			<div class="content">
			<?php
			echo "<div id = 'tableMarginWhileLoop'>";
			$select = mysqli_query($con, "Select cat_id, topic_id, title, body, ttl_posts from `topic` where cat_id = " . $_GET['cat_id'] . ";");
			while($row = mysqli_fetch_assoc($select)) {
			echo "<table id = 'forum_posts'>
					<tr>
						<th id = 'left'><a href = \"posts.php?cat_id=".$_GET['cat_id'] ."&topic_id=$row[topic_id]\">$row[title]</a></th>
						<th style = 'background:white;'>$row[body]</th>
						<th id = 'right'>Posts: $row[ttl_posts]</th>
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