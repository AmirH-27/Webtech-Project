<?php
    session_start();
    require_once '../Model/db_connect.php';
    $decode = json_decode($_POST["count"], false);
    $count = $decode->count;
    $connection = db_conn();
    $name = $_SESSION['usrName'];
    $sql = "SELECT message FROM chat where sentTo = '$name'";
    $stmt = $connection->prepare($sql);
    $response = $stmt->execute();

    if ($response) {
      $data = $stmt->get_result();

      if ($data->num_rows > $count){
        $c = 0;
        while ($row = $data->fetch_assoc()) {
          $c++;
          if($c>$count){   
            $message = $row['message'];
            array_push($array, $message);
          }
        }
        $temp = json_encode(array('messages'=>$array));
        echo $temp;
      }
      
    }

?>
