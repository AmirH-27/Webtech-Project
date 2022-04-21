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
    <h1 style = "text-align: center;">Dealer Inventory</h1>
<table id = "table" class="zui-table" bgcolor="white">
        <thead>
            <tr>
                <th>Vehicle Category</th>
                <th>Name</th>
                <th>Color </th>
                <th>Type</th>
                <th>Model</th>
                <th>Fuel</th>
                <th>Engine Size</th>
                <th>Door Numbers</th>
                <th>Seat Number</th>
                <th>Price</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            $vcat = $vname = $vcolor = $type = $model = $fuel = $engineSize = $doorNo = $seatNo = $price = "";
            $sql = "SELECT * FROM `vehicals`";
            $stmt = $connection->prepare($sql);
            $response = $stmt->execute();
        if ($response) {
            $data = $stmt->get_result();
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>". $row['vcat']."</td>";
                    echo "<td>". $row['vname']."</td>";
                    echo "<td>". $row['vcolor']."</td>";
                    echo "<td>". $row['type']."</td>";
                    echo "<td>". $row['model']."</td>";
                    echo "<td>". $row['fuel']."</td>";
                    echo "<td>". $row['enginesize']."</td>";
                    echo "<td>". $row['doorNo']."</td>";
                    echo "<td>". $row['seatNo']."</td>";
                    echo "<td>". $row['price']."</td>";
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
        <h2 class = "active">Selected Vehicle</h2>
    <fieldset>
    <label for="vcat"> Vehicle Category:</label>
    <input type="text" id = "cat" name="cat"><br><br>
    <label for="vname"> Vehicle Name:</label>
    <input type="text" id = "name" name="vname" value = ""><br><br>
    <label for="color"> Color:</label>
    <input type="text" id = "color" name="color" value = ""><br><br>
    <label for="vtype"> Type: </label>
    <input type="text" id = "vtype" name="vtype" value = ""><br><br>
    <label for="model"> Model: </label>
    <input type="text" id = "model" name="model" value = ""><br><br>
    <label for="fuel"> Fuel Type: </label>
    <input type="text" id = "fuel" name="fuel" value = ""><br><br>
    <label for="engineSize"> Engine Size(CC): </label>
    <input type="text" id = "engineSize" name="engineSize" value = ""><br><br>
    <label for="doorNum"> Door Size: </label>
    <input type="text" id = "doorNum" name="doorNum" value = ""><br><br>
    <label for="seatNum"> Seat Number: </label>
    <input type="text" id = "seatNum" name="seatNum" value = ""><br><br>
    <label for="price"> Price: </label>
    <input type="text" id = "price" name="price" value = ""><br>
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
            document.getElementById("cat").value = this.cells[0].innerHTML;
            document.getElementById("name").value = this.cells[1].innerHTML;
            document.getElementById("color").value = this.cells[2].innerHTML;
            document.getElementById("vtype").value = this.cells[3].innerHTML;
            document.getElementById("model").value = this.cells[4].innerHTML;
            document.getElementById("fuel").value = this.cells[5].innerHTML;
            document.getElementById("engineSize").value = this.cells[6].innerHTML;
            document.getElementById("doorNum").value = this.cells[7].innerHTML;
            document.getElementById("seatNum").value = this.cells[8].innerHTML;
            document.getElementById("price").value = this.cells[9].innerHTML;
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