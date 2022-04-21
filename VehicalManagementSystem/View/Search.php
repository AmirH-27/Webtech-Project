<!DOCTYPE html>
<meta charset="UTF-8">
<title>Search</title>
<script src="../View/JS/validation.js"></script>
<body>
   <?php require('../View/View.php') ?> 
<form name = "Search" action="../View/View.php" method="POST" onsubmit="return isValidReg(this);">
    <h1>User Info</h1>

    <?php require('../inc/Header.php') ?>

    <?php require('../inc/Home-Panel.php') ?>
  
Enter the Username you want to search: 
    <input type="search" name="usrName">
    <input type="submit" name="search" value="search">
    <br>
    <br>
</body>
</html>