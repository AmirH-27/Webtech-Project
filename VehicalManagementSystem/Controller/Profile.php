<?php
  session_start();
  require_once '../Model/model.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $_SESSION['usrName'] ?></title>
  <link rel="stylesheet" href="../View/css/profile.css">
</head>
<body>
  <?php
  include('../inc/menu.html');
      $usrName = $_SESSION['usrName'];
      $fromDb = search($usrName);
      $fName = $lName = $gender = $dob = $phone = $email = $password = $type = "";
      
        if($usrName === $fromDb['usrName']){
            $fName = $fromDb['fName'];
            $lName = $fromDb['lName'];
            $gender = $fromDb['gender'];
            $dob = $fromDb['dob'];
            $phone = $fromDb['phone'];
            $email = $fromDb['email'];
            $password = $fromDb['password'];
            $type = $fromDb['accountType'];
        }
      
  ?>
  <div class="wrapper fadeInDown">
  <div id="formContent">

<form action = "../Controller/updateAction.php" method="POST">
  <h1>Profile</h1>
  <fieldset>
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" value = "<?php echo $fName ?>"><br><br>
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname" value = "<?php echo $lName ?>"><br><br>
    <label for="gender">Gender:</label>
    <input type="radio" name="gender"
            <?php if (isset($gender) and $gender=="male") echo "checked";?>
            value="male">Male
    <input type="radio" name="gender"
            <?php if (isset($gender) and $gender=="female") echo "checked";?>
            value="female">Female
    <input type="radio" name="gender"
            <?php if (isset($gender) and $gender=="others") echo "checked";?>
            value="others">Others<br><br>
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday" value = "<?php echo $dob ?>"><br><br>
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" value = "<?php echo $phone ?>"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value = "<?php echo $email ?>"><br>
  </fieldset>
  <br><input type="submit" value="Update">
  Do you want to <a href="../Controller/DeleteAction.php">Delete</a> your account?
</form>
</div></div>

</body>
</html>