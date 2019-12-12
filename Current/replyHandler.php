<?php 
if(session_id() == ''){
	session_start();
}

function replyHandler(){
	$top = $_GET['topic_id'];
	$post = $_GET['post_id'];
	$addend = $_GET['page'];
	$_SESSION['cP'] += $addend;
	echo $_SESSION['currentPage'];
}
replyHandler();
header("Location: reply.php?topic_id=".$_GET['topic_id']."&post_id=".$_GET['post_id']."&cP=$_SESSION[cP]");

?>