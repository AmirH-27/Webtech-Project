<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $_SESSION['usrName'] ?></title>
  
  <link rel="stylesheet" type="text/css" href="css/welcome.css">
</head>
<body>
<?php include('../inc/menu.html');?>
  <br><br><br><br><br>
  <?php require('../inc/Header.php') ?>
  <h1>Welcome, <?php echo $_SESSION['usrName']?></h1>
<div class="wrapper fadeInDown">
  <div id="formContent">
 <?php include('../inc/Menu.php') ?>
</div></div>
 <?php include('../inc/Footer.php') ?>
 

</body>
</html>
