<?php
  session_start();
   require_once '../Model/model.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Delete Action</title>
</head>
<body>

  <h1>Delete Action</h1>

 <?php
    $usrName = $_SESSION['usrName'];
    if(deleteUser($usrName)){
      header("Location:../View/Login.php");
    }
  ?>

</body>
</html>