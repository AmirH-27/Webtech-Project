<?php
  session_start();
  $fromUser = $_SESSION['usrName'];
 require_once '../Model/db_connect.php';
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $decode = json_decode($_POST["msg"], false);

    $toUser = $decode->toUser;
    $message = $decode->message;
    if (empty($message)) {
      echo "Please fill up the form properly";
    }
    else {
      $connection = db_conn();
      $sql = "INSERT INTO `chat` (`id`, `fromUser`, `toUser`, `message`) VALUES (NULL, '$fromUser', '$toUser', '$message')";
      $data = $connection->query($sql);
    } 
    $connection->close();
  }
    echo $message;

?>
  
