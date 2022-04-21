<?php
    $message = "";
  require_once '../Model/model.php';
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $decode = json_decode($_POST["obj"], false);

    $uId = $decode->usrId;
    $email = $decode->email;

    if (empty($uId) or empty($email)) {
      $message = "Please fill up the form properly";
    }
    else {
      if(blockUser($uId, $email) && deleteUserWithId($uId)){
        $message = "Account BLocked";
      }
      else{
        $message = "Not found";
      }
    }
  }
  echo $uid. " Blocked";
?>
