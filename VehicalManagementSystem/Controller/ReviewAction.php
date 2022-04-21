<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer</title>
    <?php require_once '../Model/db_connect.php'; ?>
    <link rel="stylesheet" href="../View/css/inventory.css">
</head>
<body>
    <div>
    <?php require('../inc/Header.php') ?>
    <?php 
        $connection = db_conn();
    ?>
    <h1 style = "text-align: center;">Reviews</h1>
<table id = "table" class="zui-table" bgcolor="white">
        <thead>
            <tr>
                <th>Review Id</th>
                <th>Customer Name</th>
                <th>Dealer Name</th>
                <th>message</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $sql = "SELECT * FROM `review`";
            $stmt = $connection->prepare($sql);
            $response = $stmt->execute();
            if ($response) {
                $data = $stmt->get_result();
                if ($data->num_rows > 0) {
                    while($row = $data->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>". $row['id']."</td>";
                        echo "<td>". $row['cusName']."</td>";
                        echo "<td>". $row['dealerName']."</td>";
                        echo "<td>". $row['message']."</td>";
                        echo "</tr>";
                    }     
                }     
            }
        ?>
        </tbody>
    </table>

<div class="wrapper fadeInDown">
  <div id="formContent">
      <form name="Upload" action="../controller/uploadAction.php" method="POST" onsubmit ="return isValidUpload(this);">
        <h2 class = "active">Selected Review</h2>
    <fieldset>
    <label for="vcat">Review ID:</label>
    <input type="text" id = "id" name="id"><br><br>
    <label for="vname">Customer Name:</label>
    <input type="text" id = "cusName" name="cusName" value = ""><br><br>
    <label for="color">Dealer Name:</label>
    <input type="text" id = "dealName" name="dealName" value = ""><br><br>
    <label for="vtype">Review: </label>
    <input type="text" id = "review" name="review" value = ""><br><br>
    </fieldset><br>
</form>
</div></div></div>
    <script>
    function selectedRow(){
        var rIndex, table = document.getElementById("table");
        for(var i = 1; i< table.rows.length; i++){
            table.rows[i].onclick = function(){
            rIndex = this.rowIndex;
            console.log(rIndex);
            document.getElementById("id").value = this.cells[0].innerHTML;
            document.getElementById("cusName").value = this.cells[1].innerHTML;
            document.getElementById("dealName").value = this.cells[2].innerHTML;
            document.getElementById("review").value = this.cells[3].innerHTML;
        };
      } 
    }
    selectedRow();
    </script>

     <?php include('../inc/Footer.php')?>
     <?php include('../inc/menu.html');?>
     <br>

</body>
</html>