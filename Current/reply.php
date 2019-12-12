<?php 
include('connections/mysqli_connection.php');
include('functions.php');
$page = new Page;
$top = $_GET['topic_id'];
$post = $_GET['post_id'];
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
		
				<?php iflog('replies'); ?>
		
			
		</div>
			<div class="content">
			<?php

			
			$select = mysqli_query($con, "Select p.post_id, u.user_id, u.username, p.title, p.body, p.ttl_replies 
										  from `post` AS p, `user` AS u
										  where p.user_id = u.user_id AND topic_id  = ". $_GET['topic_id'] . " AND p.post_id = " .$_GET['post_id']. ";");
			$_SESSION['replyTopic_id'] = $_GET['topic_id'];
			$_SESSION['replyPost_id'] = $_GET['post_id'];
		
			echo "<div id = 'tableMarginWhileLoop'>";
				while($row = mysqli_fetch_assoc($select)) {
					$_SESSION['poster_id'] = $row['user_id'];
					echo "<form>
							<table id = 'forum_posts'>
							<tr>
								<th colspan = '2' style = '	background:#c93d16; text-align:left;'>$row[title]</th>
							</tr>
							<tr>
								<th style = 'background:white; padding-bottom:100px; text-align:left;' colspan = '2'> $row[body]</th>
							</tr>
							
							<tr>
								<th style = 'background:#387ff2;text-align:left;'>$row[username]</th>
								<th style = 'background:#387ff2;text-align:right'> Posted at: </th>
							</tr>
						</table>
						</form>";
				}
				$sql = "Select COUNT(post_id) AS ttl, post_id from reply where post_id = " .$_GET['post_id']." GROUP BY post_id HAVING COUNT(post_id) > 0;";
				$result = mysqli_query($con, $sql);
				
				while($row = mysqli_fetch_assoc($result)){
					$page->setTtlRows($row['ttl']);
				}
				getNewPage($_GET['cP']);
		
			echo "</div>";
				?>
				
				<form action = "replySubmit.php" method = "POST">
					<table style = 'width:60%;'>
						
							<tr>
								<th style = 'text-align:left;' colspan = '2'>
									<textarea name = 'body' placeholder = 'Enter a reply here' style = "width: 100%; height:150px;"></textarea>
									<input style = '  margin:10 auto -5 auto; display:block;' value = 'Reply' type = 'submit'></input>
								</th>
							</tr>
							
							<tr>
								<th style = 'background:#387ff2;text-align:left;'><?php iflogged();?></th>
							</tr>
						
					</table>
					</form>
					
					<table style = 'width:60%;border:none;'>
						<tr>
						
								<th style = 'border:none;'>
									<form method = 'POST' action = 'replyHandler.php?topic_id=<?php echo $top ?>&post_id=<?php echo $post; ?>&page=<?php echo -1; ?>';>
										<input name = 'left' value = '<' type = 'submit' style = 'border:3px solid #c93d16;width:50px;height:25px;border-radius:10px;float:left;'/>
									</form>
									<form method = 'POST' action = 'replyHandler.php?topic_id=<?php echo $top ?>&post_id=<?php echo $post; ?>&page=<?php echo 1; ?>';>
										<input name = 'right' value = '>' type = 'submit' style = 'border:3px solid #c93d16;width:50px;height:25px;border-radius:10px;float:right;'/>
									</form>
								</th>
							</tr>
					</table>
					
				
			
			</div>
		<footer class="footer">
			<span class = 'SocialMedia'>
				Social Media Icons
			</span>
		</footer>
	</body>
</html>