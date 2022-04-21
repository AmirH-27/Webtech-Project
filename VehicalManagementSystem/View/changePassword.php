<?php
  session_start();
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
    <label for="password">Current Password:</label>
    <input type="text" id="password" name="password"><br><br>
    <label for="New-password">New Password:</label>
    <input type="text" id="newPassword" name="newPassword"><br><br>
    <label for="New-password">Confirm New Password:</label>
    <input type="text" id="cNewPassword" name="cNewPassword"><br>
  </fieldset>
  <br><input type="submit" value="Change Password">
</form>
</div></div>
<script>
    function isValidChangePass(CngPass) {
    const current = CngPass.password.value;
    const newPassword = CngPass.newPassword.value;
    const conNewPassword = CngPass.cNewPassword.value;

    if (current == "" || newPassword == "" || conNewPassword == "") {
        alert("Please fill up the form properly");
        return false;
    }
    return true;
}

</script>
</body>
</html>