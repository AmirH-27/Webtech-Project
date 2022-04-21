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
<body>
<body><div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>

<form action= "../Controller/LoginAction.php" method="POST" onsubmit="return isValidLogin(this);">
		<fieldset>
			<legend>Login:</legend><br>
			<label for="userName">Username:</label>
    		<input type="text" name="usrName" value = "<?php echo $usrname ?>"><br><br>
    		<label for="password">Password:</label>
    		<input type="password" name="password" value = "<?php echo $password ?>"><br><br>
    		<input type="checkbox" id="rememberMe" name="RememberMe">
  			<label for="rememberMe">Remember Me</label><br><br>
    		<input type="submit" name ="login" value="Login"><br><br>
    		<a href="../Controller/LoginAction.php">Forgot Password?</a><br><br>
    		Don't have an account? <a href="../View/RegistrationForm.php">sign-up</a>
		</fieldset>
</form>
	<?php
    	$usrName = $password = "";
    	$request_method = $_SERVER['REQUEST_METHOD'];
    	if($request_method === 'POST'){
      		$usrName = $_POST['usrName'];
      		$password = $_POST['password'];
    	}

		if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST) > 0){
			$flag = false;
			$userNameInDb = search($usrName);

			if($userNameInDb == "empty"){
				$flag = false;
			}
			elseif($userNameInDb == ""){
				$flag = false;
			}
			elseif($_POST['usrName'] === $userNameInDb['usrName'] and $_POST['password'] === $userNameInDb['password']){
				$flag = true;
			}
		
		
			if($flag){
				session_start();
				$_SESSION['usrName'] = $usrName;

				if(isset($_COOKIE['Username'])){
					$usrname = $_COOKIE['Username'];
				}
				if(!empty($_POST['RememberMe'])){
					setcookie("Username", $_POST['usrName'],time()+ (86400 * 10), "/");
				}
				for($k=0; $k<count($userNameInDb); $k++){
					if($usrName == $userNameInDb['usrName']){
						if($userNameInDb['accountType'] == "Admin"){
							header("Location:../View/WelcomeAdmin.php");
						}
						$_SESSION['type'] = $userNameInDb['accountType'];
					}
				}
			}
			else{
				echo "<br>Login Failed";
			}
		}
	?>
</body>
</html>