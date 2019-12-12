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
				
				<?php iflog(''); ?>
	
			
		</div>
			<div class="content">
			<?php
			$_SESSION['cat_id'] = $_GET['cat_id'];
			$_SESSION['topic_id'] = $_GET['topic_id'];
	
			echo "<div id = 'tableMarginWhileLoop'>";
					echo "<form action ='replyForm.php' method = 'POST'>
							<table id = 'forum_posts'>
							<tr >
								<th colspan = '2' style = '	background:#c93d16; text-align:left;'>
									<input style = 'width:250px;height:40px;' placeholder = 'What is your question?'type = 'text' name = 'title'/> 
									</th>
							</tr>
							<tr>
								<th style = 'text-align:left;' colspan = '2'>
									<textarea name = 'body' placeholder='Describe your question/topic' style = 'width: 100%; height:150px;'></textarea>
								</th>
							</tr>
							
							<tr>
								<th style = 'background:#387ff2;text-align:left;'><label value = '$_SESSION[username]' name = 'username'></label></th>
							</tr>
			
							</table>
						<input style = 'border-radius:15px; width: 100px; height:50px; margin:25 auto; display:block;' type = 'submit' name = 'submit' value = 'Post' />
						</form>";
			
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