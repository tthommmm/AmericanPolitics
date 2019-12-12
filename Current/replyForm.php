<?php 
	function reply(){
		include("connections/mysqli_connection.php");
		if(session_id() == ''){
		session_start();
	}
		//take title, body, session username and insert topic into database then header to questions in posts
		$title = $_POST['title'];
		$body = $_POST['body'];
		$top = $_SESSION['topic_id'];
		
		echo var_dump($_POST);
	
		$userIDsql = "Select user_id from user where username = '". $_SESSION['username']."';";
		$userQuery = mysqli_query($con, $userIDsql);
			while($row = mysqli_fetch_assoc($userQuery)) {
				echo "topic_id: $top";
				echo "user id: $row[user_id]";
				echo "$title";
				echo "$body";
				$sql = "Insert into post (user_id, topic_id, title, body, dateposted) VALUES 
				($row[user_id], $top, '$title', '$body', NOW());";
				$query = mysqli_query($con, $sql);
				//mysqli_affected_rows($query);
			}		
	}
	echo "reply()";
	reply();
		header('Location: posts.php?cat_id='.$_SESSION['cat_id'].'&topic_id='.$_SESSION['topic_id'].'');
	
?>