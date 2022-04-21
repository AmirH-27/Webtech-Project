<?php
  session_start();
  require_once '../Model/model.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registration Action</title>
</head>
<body>

  <h1>Registration Action</h1>

 <?php

    $usrId = $fName = $lName = $gender = $dob = $phone = $email = $type = "";
      $request_method = $_SERVER['REQUEST_METHOD'];
      if($request_method === 'POST'){
          $firstName = $_POST['fname'];
          $lastName = $_POST['lname'];
          $gender = $_POST['gender'];
          $dob = $_POST['birthday'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
      }

    $fromDb = search($_SESSION['usrName']);
    $usrId = $fromDb['usrId'];
    $password = $fromDb['password'];
    $type = $fromDb['accountType'];
    if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST) > 0){
      if(updateUser($usrId, $firstName, $lastName, $gender, $dob, $phone, $email, $_SESSION['usrName'], $password, $type, $_SESSION['usrName'])){
          header("Location:../Controller/Profile.php");
      }
      else{
        echo "<br>Login Failed";
      }
    }
  ?>

</body>
</html>