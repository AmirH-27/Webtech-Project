<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<br><br>
	<?php require('../inc/Header.php') ?>
	<title>Contact Us</title>
	<?php require_once '../Model/db_connect.php'; ?>
    <link rel="stylesheet" href="../View/css/welcome.css">
</head>
<body>
<h1>Contact Us</h1>

<?php 
	$contactInfo = "";
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$contactInfo = $_POST['info'];
		$connection = db_conn();
  	$sql = "UPDATE `contactus` SET `info`='$contactInfo'";
  	$data = $connection->query($sql);
  	$connection->close();
  }
	
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
<form action= "../Controller/contactUsAction.php" method="POST">
	<label for="email">Info:</label>
   <textarea id = "info" name="info" rows="4" cols="50"></textarea>
    <input type="submit" name ="update" class = "button" value="update">
</form>
</div></div>
<?php include('../inc/Footer.php')?>
     <?php include('../inc/menu.html');?>
</body>
</html>
