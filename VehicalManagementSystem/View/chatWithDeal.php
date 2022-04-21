<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chat(Customer)</title>
<?php require_once '../Model/db_connect.php'; ?>
</head>
<body>
<?php include('../inc/Header.php') ?>
 <link rel="stylesheet" href="../View/css/Chat.css">
<table id = "table" class="zui-table" bgcolor="white">
        <thead>
            <tr>
                <th>User Id</th>
                <th>User Name</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            $uName = $mId = "";
            $connection = db_conn();
            $sql = "SELECT * FROM `users` WHERE `accountType` = 'Dealer'";
            $stmt = $connection->prepare($sql);
            $response = $stmt->execute();
        if ($response) {
            $data = $stmt->get_result();
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>". $row['usrId']."</td>";
                    echo "<td>". $row['usrName']."</td>";
                    echo "</tr>";
                }     
            }     
      
         }
        ?>
        </tbody>

    </table>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <div class="allMessages"> 
    </div>
<form action="../Controller/chatBox.php" method="POST">
     <p id = "sentTo"></p>   
     <label for="selectedText">Sent To: </label>
     <input type="text" id="selectedUser" name="selectedUser" value = ""></input> 
    <br>
   <input type="submit" name="Send" value = "Send"></input>

</form>

</div></div> 
<script>
    function selectedRow(){
        var rIndex, table = document.getElementById("table");
        for(var i = 1; i< table.rows.length; i++){
            table.rows[i].onclick = function(){  
                rIndex = this.rowIndex;
                console.log(rIndex);    
                document.getElementById("selectedUser").value = this.cells[1].innerHTML;
            };
      } 
    }
    selectedRow();

</script>
     <?php include('../inc/Footer.php') ?>
     <?php include('../inc/menu.html') ?>
     
</body>
</html>