<?php
	session_start();
	$error = "";
		//logout//
	if(array_key_exists("logout", $_GET)){
		unset($_SESSION);
		setcookie("id","", time() -60*60);
		$_COOKIE["id"] = "";
	} else if ((array_key_exists("id", $_SESSION) AND $_SESSION ['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])){
        header("Location: loginpage.php");
	}

if(array_key_exists("submit", $_POST)){
	$link = mysqli_connect("xxxxxx","xxxxx","xxxxxx","xxxxxxxx");
	if (mysqli_connect_error()){
		die("Connection Error to Database");
	}
	if (!$_POST['email']){
		$error .= "Fill in the e-mail address field.<br/>";
	}
	if (!$_POST['password']){
		$error .= "Fill in the password field.<br/>";
	}
	if ($error != ""){
		$error = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span></button>
				  <p>We saw some error(s) in Your form. Please, check it out and try again.</p>'.$error;
	}
	else{
		if($_POST['signUp'] == 1){
			$query = "SELECT id FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
			$result = mysqli_query($link,$query);
			if(mysqli_num_rows($result) > 0 ){
				$error = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						  <p>That email address has already been taken.</p>';
			}else{
				$query = "INSERT INTO `users`(`email`,`password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
				if (!mysqli_query($link, $query)){
						$error = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
								  <p>Signing you up was impossible - please try again.</p>';
				}else{
					$query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";
					mysqli_query($link, $query);
					$_SESSION['id'] = mysqli_insert_id($link);
					if($_POST['stayLoggedIn'] == '1'){
							setcookie("id", mysqli_insert_id($link), time() + 60*60*24*65);
					}else {
						$error = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
								  <p>Tick the checkbox!.</p>';
					}
				header("Location: loginpage.php");
				}
			}
		}else{
			//echo "logging in...";
			//print_r($_POST);
			$query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
			$result = mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if(isset($row)){
				$hashedpassword = md5(md5($row['id']).$_POST['password']);
				if ($hashedpassword == $row['password']){
					$_SESSION['id'] = $row['id'];
					if($_POST['stayLoggedIn'] == '1'){
						setcookie("id", $row['id'], time() + 60*60*24*65);
					}
					header("Location: loginpage.php");
				}else{
				$error = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						  <p>Sorry, that email and/or password could not be found at this moment.</p>';
				}
			}else {
				$error = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						  <p>Sorry, that email and/or password could not be found at this moment.</p>';
			}
		}
	}	
}
?>

<?php include("header.php");?>
  <div class="container" id="homePageContainer">
			<h1>TheNote</h1>
			<p id = "intro">Keep your thoughts in one safe place!</b></p>
		<form method="POST" id="SignUpForm">
			<p id ="aboutIt">Check it for free using Sign up button!</p>
			<div id="error"><?php if ($error!="") {
			echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
	} ?> </div>
			<div class="form-group">
				<input class="form-control" type="email" name="email" placeholder="Your Email">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="password" placeholder="Password">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" name="stayLoggedIn" value=1>
				<label class="form-check-label" type="checkbox" name="stayLoggedIn" value=1>
					<p id="login">Stay logged in</p>
				</label>
			</div>
			<div class="form-group">
				<input type="hidden" name="signUp" value=1>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Sign up!">
			</div>
			<p id ="aboutIt"><a class="toggleForm" id="forms">Log in</a></p>
		</form>
		
		<form method="POST" id="LogInForm">
			<p id ="aboutIt">Log in using your own username and password!</p>
			<div class="form-group">
				<input class="form-control" type="email" name="email" placeholder="Your Email">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="password" placeholder="Password">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" name="stayLoggedIn" value=1>
				<label class="form-check-label" type="checkbox" name="stayLoggedIn" value=1>
					<p id="login">Stay logged in</p>
				</label>
			</div>
			<div class="form-group">
				<input type="hidden" name="signUp" value=0>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="submit" value="Log in!">
			</div>
			<p><a class="toggleForm" id="forms">Sign up</a></p>
		</form>
  </div>
<?php include("footer.php");?>