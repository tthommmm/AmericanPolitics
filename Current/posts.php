<?php 
include('connections/mysqli_connection.php');
include('functions.php');
if(session_id() == ''){
		session_start();
	
	}
$_SESSION['currentPage'] = 1;

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
		
				<?php
					iflog('posts');
				?>
		</div>
			<div class="content">
			<?php
		
			$select = mysqli_query($con, "Select p.post_ID, u.username, p.title, p.body, p.ttl_replies 
										  from `post` AS p, `user` AS u
										  where p.user_ID = u.user_ID AND topic_ID  = ". $_GET['topic_id'] . ";");
			echo "<div id = 'tableMarginWhileLoop'>";
				while($row = mysqli_fetch_assoc($select)) {
					echo "<table id = 'forum_posts'>
							<tr>
								<th id = 'left'><a href = 'reply.php?topic_id=".$_GET['topic_id']."&post_id=$row[post_ID]&cP=$_SESSION[currentPage]'>$row[title]</a></th>
								<th id = 'right'>$row[username]</th>
							</tr>
						</table>";
				}
			echo "</div>";
				$_SESSION['topic_id'] = $_GET['topic_id'];
				ifpost($_GET['cat_id'],$_GET['topic_id']);
				?>
			</div>
		<footer class="footer">
			<span class = 'SocialMedia'>
				Social Media Icons
			</span>
		</footer>
	</body>
</html>