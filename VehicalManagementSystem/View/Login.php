<?php
  require_once '../Model/model.php';
	if(isset($_COOKIE['Username'])){
		$usrname = $_COOKIE['Username'];
		$userNameInDb = search($usrname);
		for($k=0; $k<count($userNameInDb); $k++){
			if($usrname == $userNameInDb['usrName']){
				$password = $userNameInDb['password'];
			}
		}

	}
	else{
		$usrname = "";
		$password = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="../view/css/Login.css">
<script src="../View/JS/validation.js"></script>
</head>
<body><div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>

<form action= "../Controller/LoginAction.php" method="POST" onsubmit="return isValidLogin(this);">
		<fieldset>
			<label for="userName">Username:</label>
    		<input type="text" name="usrName" value = "<?php echo $usrname ?>"><br><br>
    		<label for="password">Password:</label>
    		<input type="password" name="password" value = "<?php echo $password ?>"><br><br>
    		<input type="checkbox" id="rememberMe" name="RememberMe">
  			<label for="rememberMe">Remember Me</label><br><br>
    		<input type="submit" name ="login" value="Login"><br>
    		<a href="../Controller/LoginAction.php">Forgot Password?</a><br>
    		Don't have an account? <a href="../View/RegistrationForm.php">sign-up</a>
		</fieldset>
		<br>
</form>
</div></div>
</body>
</html>