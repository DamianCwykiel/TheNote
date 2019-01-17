<?

	session_start();
	
	if(array_key_exists("id", $_COOKIE) && $_COOKIE['id']){
		$_SESSION['id'] = $_COOKIE['id'];
	}
	
	if(array_key_exists("id", $_SESSION)){
		
		include("connection.php");
		
		$query = "SELECT `` FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
 
      $userContent = $row['notebook'];
		
	}else{
		header("Location: index.php");
	}
	
	include("header.php");
?>
<nav class="navbar navbar-light bg-light navbar-fixed-top">
  <a class="navbar-brand"><span id ="logo">TheNote</span></a>
  <div class="form-inline">
   <a href='index.php?logout=1'>
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
	</a>
  </div>
</nav>

	<div class="container-fluid" id="containerLogInPage">
		<textarea id="notebook" class="form-control"><?php echo $userContent; ?></textarea>
	</div>

<?php

	include("footer.php");

?>