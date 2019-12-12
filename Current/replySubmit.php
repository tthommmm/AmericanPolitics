<?php 
include("connections/mysqli_connection.php");
	if(session_id() == ''){
		session_start();
	}
	if($_SESSION['currentPage'] == NULL){
		$_SESSION['currentPage'] = 1;
		
	}
//information needed
//topic id, post_id
//Poster username
//session username
echo "POST: ";
echo var_dump($_POST);
echo "<br>SESSION: ";
echo var_dump($_SESSION);
echo var_dump($_SESSION['currentPage']);
$sqlTtlReplies = "Select ttl_replies from reply where user_id = " .$_SESSION['user_id']. ";";
$sql = "Insert into reply (post_ID, user_ID, body) 
		VALUES ($_SESSION[replyPost_id], $_SESSION[user_id], '$_POST[body]');";
		
$resultTtl = mysqli_query($con, $sqlTtlReplies);
$result = mysqli_query($con, $sql);	

	printf("<br>Affected rows (INSERT): %d\n", mysqli_affected_rows($con));


header("Location: reply.php?topic_id=".$_SESSION['replyTopic_id']."&post_id=" .$_SESSION['replyPost_id']."&cP=".$_SESSION['currentPage']."");

#take information from spot and query it into the database, then show the original reply page.

?>