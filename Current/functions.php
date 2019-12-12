<?php 

class Page {
	private $ttlRows;
	private $currentPage = 1;
	
	function getTtlRows(){
		return $this->ttlRows;
	}
	function setTtlRows($ttlRows) {
		$this->ttlRows = ceil($ttlRows);
	}
	
	function getCurrentPage(){
		return $this->currentPage;
	}
	function setCurrentPage($currentPage) {
		$this->currentPage = $currentPage;
	}
}
	
function iflog($title){
	if(session_id() == ''){
		session_start();
	
	}
		
	if(!isset($_SESSION['username'])){//not set
		if($title == 'topics' || $title == 'home' || $title == 'posts' || $title == 'replies'){
				echo "
				<li style = 'float:right;'><a href = 'register.php'> Register </a></li>
				<li style = 'float:right;'><a href = 'login.php'> Login </a></li>
				";
		}
		if($title == 'login'){
			
			echo "
				<li style = 'float:right;'><a href = 'register.php'> Register </a></li>
				<li style = 'float:right;'><a id = 'active' href = 'login.php'> Login </a></li>
				";
		}
			if($title == 'register'){
			
			echo "
				<li style = 'float:right;'><a id = 'active'href = 'register.php'> Register </a></li>
				<li style = 'float:right;'><a href = 'login.php'> Login </a></li>
				";
		}
	}
	if(isset($_SESSION['username'])){
			echo "	<div style = 'float:right;'>
					<li style = 'padding-right:5px;'>
						$_SESSION[username]
					</li>
					<li style = 'padding:0;float:right'>
						<a style = 'padding:0;'href = 'profile.php'>
						<img style = 'margin-bottom:-15px;margin-right:-15px;margin-top:-15px;float:left;'height = '80' width = '80' src = 'img/profPic.png'></img>
						</a>
					</li>
					</div>";
	}
}

function ifpost($cat, $topic){	
		if(isset($_SESSION['username'])){
			echo "<form action ='newPost.php?cat_id=$cat&topic_id=$topic' method = 'POST'>
					<input style = 'margin:50 auto; display:block;'type = 'submit' value = 'Add a new post'>
				</form>";
			
		}
}

function iflogged(){
	if(isset($_SESSION['username'])){
		echo $_SESSION['username'];
	}else{
		echo "Guest";
	}
}

function getNewPage($cP){
			include ("connections/mysqli_connection.php");
			if(session_id() == ''){
		session_start();
	}
			$maxsql = "Select MIN(reply_ID) AS min, MAX(reply_id) AS max from reply;";
			$resultMax = mysqli_query($con, $maxsql);
			
			while($rowMax = mysqli_fetch_assoc($resultMax)){
			$page = $_GET['cP'];
			$rpp = 5;
			$start = ($page-1) * $rpp;
			
			$sql = "Select reply_id, post_id, user_id, body from reply where post_id = ".$_GET['post_id']."  ORDER BY reply_id ASC LIMIT $start, ".$rpp;
			
			$result = mysqli_query($con, $sql);

			while($row = mysqli_fetch_assoc($result)){
				$sql = "Select username from user where user_id = '$row[user_id]'";
				$result1 = mysqli_query($con, $sql);
								
				while($rowN = mysqli_fetch_assoc($result1)){
					getPage($row['body'],$rowN['username']);
				 }
			}	
		}
	}

function getPage($body, $username){
			echo "<table style = 'width:60%; margin-top:25px;'>
					<tr>
						<th style = 'background:white;text-align:left;' colspan = '2'> $body </th>
					</tr>
											
					<tr>
						<th style = 'background:#387ff2;text-align:left;'> $username </th>
					</tr>
				  </table>";
}

function register(){
	
include('connections/mysqli_connection.php');
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$handle = [];
		if(empty($_POST['username'])) {
			$handle[] = "Error 1: Blank Username";
		}else{
			$username = mysqli_real_escape_string($con, trim($_POST['username']));
		}
		
		if(!empty($_POST['password']) && !empty($_POST['Cpassword'])){
			if($_POST['password'] != $_POST['Cpassword']){
				$handle[] = "Error 2: Mismatched Password";
			}else{
				$password = mysqli_real_escape_string($con, trim($_POST['Cpassword']));
			}
		}else {
			$handle[] = "Error 3: Blank Password";
		}			
		
		if(isset($_POST['username'])){
			$sql = "SELECT username FROM user WHERE 1;";
			$checkuser = mysqli_query($con, $sql);
			
				while($row = mysqli_fetch_assoc($checkuser)){
					if($_POST['username'] == $row['username']){
						$handle[] = "Error 4: User is taken";
					}
				}
		}
		if(empty($handle)){
			$sql = "INSERT INTO user (username, password) VALUES('$username', '$password');";
			$register = mysqli_query($con, $sql);
		
		}else{
			foreach($handle as $error){
				echo "<span style = 'color: red; margin-left: 50px;'>$error<br></span>";
			}
		}
	}
}

function login(){
	if(session_id() == ''){
		session_start();
	}
	if(isset($_POST['username'])){//if the username field is filled
		include('connections/mysqli_connection.php');
		$select = mysqli_query($con, "SELECT user_id, username, password FROM user WHERE 
									  username = '" . $_POST['username']. "' AND 
									  password = '" . $_POST['password']. "';");

			if(mysqli_num_rows($select) != 0) {//if its found(if the total rows is above 0)
				$_SESSION['username'] = $_POST['username'];
			    $_SESSION['password'] = $_POST['password'];
				
				while($row = mysqli_fetch_assoc($select)){
					$_SESSION['user_id'] = $row['user_id'];
				}
						header("Location: index.php");
					}
			if(mysqli_num_rows($select) == 0){
					echo "<p style = 'color:red; margin-top:-50px;margin-left: 50px;padding-bottom: 100px;' > Incorrect username or password </p>";
				}			
		}			
}



?>