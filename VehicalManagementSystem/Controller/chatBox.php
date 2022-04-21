<?php
  session_start();
  require_once '../Model/db_connect.php';

?>
     <?php include('../inc/menu.html') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Chat</title>
 <link rel="stylesheet" href="../View/css/Chat.css">
<style>
.incoming{
  text-align: left;
}
.outgoing{
  text-align: right;
}

</style>
</head>
<body>
<form name = "jsForm" action="../Controller/insertMessage.php" method="POST">

<?php
     if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $toUser = $_POST['selectedUser'];
        $fromUser = $_SESSION['usrName'];
        $connection = db_conn();
        $sql = "SELECT * FROM chat";
        $stmt = $connection->prepare($sql);
        $response = $stmt->execute();

        if ($response) {
          $data = $stmt->get_result();
          $output = "";
      
          if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
              if($row['fromUser'] === $fromUser){
                $output .= "<p class = "."outgoing>". $row['message'] ."</p>";
              }
              else{
                $output .= "<p class = "."incoming >". $row['message'] ."</p>";
              }
          }
        }
        else {
          echo "No records found.";
        }    
      }
    }
?>

<div id = "chatbox" class="wrapper">
   <div id="formContent">
    <label for="selectedText">Sent To: </label>
  <input type="text" id="selectedUser" name="selectedUser" value = "<?php echo $toUser?>"></input><br><br>

    <div id = "allMessage">
    <?php echo $output ?>
</div>
  <textarea id = "message" name="message" rows="4" cols="50"></textarea>
  <button type="button" name="Send" onclick="sendData();">Send-></button>
</form>
</div></div>
<script>
  function sendData(){
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){

      if(this.readyState === 4 && this.status === 200){
        var node = "<p>"+this.responseText+"</p>";
        var p = document.createElement("p");
        var t = document.createTextNode(this.responseText);
        p.appendChild(t);
        p.className = "outgoing";
        document.getElementById("allMessage").appendChild(p);
      } 
    }
    xhttp.open("POST", "../Controller/insertMessage.php" );
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const myData = {
        "toUser" : document.getElementById("selectedUser").value,
        "message" : document.getElementById("message").value
      }
    xhttp.send("msg="+JSON.stringify(myData));

    document.getElementById("message").value = "";
  }

  function checkIncomingMessage(){
      var x = document.getElementsByClassName("incoming").length;
      const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){

        if(this.readyState === 4 && this.status === 200){
        
          try{
              var temp = JSON.parse(this.responseText);
              var message = temp.messages;
              message.forEach(function newMessage(item, index){
              var node = "<p>"+this.responseText+"</p>";
              var p = document.createElement("p");
              var t = document.createTextNode(item);
              p.appendChild(t);
              p.className = "incoming";
              document.getElementById("allMessage").appendChild(p);
            }); 
          }
          catch(err){

          }
          console.log(message);
        } 
      }
      xhttp.open("POST", "../Controller/RealTimeChat.php" );
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      const myData = {
          "count" : x
      }
      xhttp.send("count="+JSON.stringify(myData));
    }
    var interval = setInterval(checkIncomingMessage, 700);
</script>
<?php include('../inc/Footer.php') ?>
</body>
</html>
