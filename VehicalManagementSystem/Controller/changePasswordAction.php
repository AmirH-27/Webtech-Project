<?php
  session_start();
  require_once '../Model/model.php';
  require_once '../Model/db_connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $_SESSION['usrName'] ?></title>
  <script src="../View/JS/validation.js"></script>
  <link rel="stylesheet" href="../view/css/profile.css">
</head>
<body>
  <?php include('../inc/menu.html');?>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <h1>Change Password</h1>
<form action = "../Controller/changePasswordAction.php" method="POST" onsubmit="return isValidChangePass(this);">
  <fieldset>
    <legend>Account Information:</legend><br>
    <label for="password">Current Password:</label>
    <input type="text" id="password" name="password"><br><br>
    <label for="New-password">New Password:</label>
    <input type="text" id="newPassword" name="newPassword"><br><br>
    <label for="New-password">Confirm New Password:</label>
    <input type="text" id="cNewPassword" name="cNewPassword"><br>
    <p id = "dNM"></p>
  </fieldset>
  <br><input type="submit" name = "Change" value="Change-Password"></input>
</form>
</div></div>
  <?php
  $flag = false;
    if(empty($_POST['password']) or empty($_POST['newPassword']) or empty($_POST['cNewPassword'])){
      echo "Please fill the form correctly";
    }

    else{

      if($_POST['newPassword'] === $_POST['cNewPassword']){
        
        $usrName = $_SESSION['usrName'];
        $fName = $lName = $gender = $dob = $phone = $email = $password = "";
        $fromDb = search($usrName);
  
        $oldPassword = $fromDb['password'];
  
        if($_POST['password']===$oldPassword){
          $password = "";
          $request_method = $_SERVER['REQUEST_METHOD'];
          if($request_method === 'POST'){
            $password = $_POST['newPassword'];
          }

          
          if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST) > 0){
            $flag = false;
            $connection = db_conn();
            $sql = "UPDATE `users` SET `password`='$password'WHERE usrName = '$usrName'";
            $data = $connection->query($sql);

            if($data){
              echo "Password Updated";
              return true;
            }
            else{
              echo "Error Updating in data base";
              return false;
            }

            $connection->close(); 

          } 
          
        }
      }
      else{
        echo '<script>alert("Passowrd Do Not Match")</script>';
      }
    }
    
  ?>

</body>
</html>