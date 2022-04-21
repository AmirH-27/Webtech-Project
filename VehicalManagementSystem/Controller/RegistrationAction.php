  <?php
  require_once '../Model/model.php';
  $email = $userName = "";
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $email = $_POST['email'];
      $userName = $_POST['usrName'];
    }
  $isValid = false;
?>

 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registration Form</title>
<script src="../View/JS/validation.js"></script>
<link rel="stylesheet" href="../view/css/Registration.css">
</head>
<body>
  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign Up </h2>
<form name = "Registration" action="../Controller/RegistrationAction.php" method="POST" onsubmit="return isValidReg(this);">
  <fieldset>

    <legend>Basic Information:</legend>
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname"><br><br>
    <label for="gender">Gender:</label>
    <input type="radio" id="gender" name="gender" value="male">Male
    <input type="radio" id="gender" name="gender" value="female">Female
    <input type="radio" id="gender" name="gender" value="others">Others<br><br>
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday"><br><br>
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
  </fieldset>

  <fieldset>
    <legend>Account Information:</legend>
    <label for="userName">Username:</label>
    <input type="text" id="usrName" name="usrName"><br><br>
    <label for="password">Password:</label>
    <input type="text" id="password" name="password"><br><br>
    <label for="type">Account Type:</label>
    <select name="type" id="type">
      <option value="Select">Select a type</option>
      <option value="Customer">Customer</option>
      <option value="Dealer">Dealer</option>
    </select><br>

  </fieldset>
  <br><input type="submit" value="Submit">
</form>
</div></div>
  <?php

    $firstname = $lastname = $birthday = $phone = $email = $userName = $password = "";

    $request_method = $_SERVER['REQUEST_METHOD'];

    if(isset($_POST['gender'])){
      $gender = $_POST['gender'];
    }
    else{
      $gender = "";
    }

    if($request_method == "POST"){
      $firstname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $birthday = $_POST['birthday'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $userName = $_POST['usrName'];
      $password = $_POST['password'];
      $type = $_POST['type'];
    }
    if (empty($firstname) or empty($lastname) or empty($gender)
      or empty($birthday) or empty($email)
      or empty($userName) or empty($password) or $type == "Select"){

      $isValid = true;
    }
    else{
      $isNotEmpty = true;
    }

    function sanitize($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($isNotEmpty) {
      $firstname = sanitize($firstname);
      $lastname = sanitize($lastname);
    }

    if ($isValid) {
      
      if(addUser($firstname, $lastname, $gender, $birthday, $phone, $email, $userName, $password, "Admin")){
        header("Location:../View/Login.php");
      }
    }
  else{
    echo "<br>Please Fill the form correctly";
  }
  
  ?>
</body>
</html>
