<!DOCTYPE html>
<meta charset="UTF-8">
<title>User List</title>
<link rel="stylesheet" href="../View/css/Block.css">
<body>
    <?php 
        require('../inc/Header.php');
        require_once ('../Model/model.php');

    ?>
 <h1 style = "text-align: center;">Users</h1>
<form  action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
<table id = "table" class="zui-table" bgcolor="white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Type</th>
            </tr>
        </thead>

        <tbody>
        <?php 
        $fName = $lName = $gender = $dob = $phone = $email = $usrName = $password = $type = "";
            $connection = db_conn();
            $sql = "SELECT * FROM `users`";
            $stmt = $connection->prepare($sql);
            $response = $stmt->execute();
            if ($response) {
                $data = $stmt->get_result();
                if ($data->num_rows > 0) {
                    while ($fromDb = $data->fetch_assoc()) {
                        if($fromDb['accountType'] == "Admin"){

                        }
                        else{
                            echo "<td>". $fromDb['usrId']."</td>";
                            echo "<td>". $fromDb['fName']."</td>";
                            echo "<td>". $fromDb['lName']."</a>"."</td>";
                            echo "<td>". $fromDb['gender']."</td>";
                            echo "<td>". $fromDb['dob']."</td>";
                            echo "<td>". $fromDb['phone']."</td>";
                            echo "<td>". $fromDb['email']."</td>";
                            echo "<td>". $fromDb['usrName']."</td>";
                            echo "<td>". $fromDb['password']."</td>";
                            echo "<td>". $fromDb['accountType']."</td>";
                            echo "</tr>";
                        }
                    }
                }
      
            }
        ?>
        </tbody>
    </table>
    <div class="wrapper fadeInDown">
<div id="formContent">
  <fieldset>
    <label for="uId">User Id:</label>
    <input type="text" id="uId" name="uId" value = ""><br><br>

    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname" value = ""><br><br>

    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname" value = ""><br><br>

    <label for="gender">Gender:</label>
    <input type="text" id="gender" name="gender" value = ""><br><br>
    
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" value = ""><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value = ""><br><br>
    <legend>Account Information:</legend>
    <label for="userName">Username:</label>
    <input type="text" id="usrName" name="usrName" value = ""><br><br>
    <label for="userName">Password:</label>
    <input type="text" id="password" name="password" value = ""><br><br>
    <label for="type">Account Type:</label>
    <input type="text" id="accType" name="accType" value = "">
  </fieldset>
  <br>
  <button type="button" name="block" class = "button" onclick="sendData();">Block</button>
  <p id = "message"></p>
</form>
</div></div>
<script>
    var rIndex,
      table = document.getElementById("table");
    function selectedRow(){
      for(var i = 1; i< table.rows.length; i++){
        table.rows[i].onclick = function(){
            rIndex = this.rowIndex;
            console.log(rIndex);
            document.getElementById("uId").value = this.cells[0].innerHTML;
            document.getElementById("fname").value = this.cells[1].innerHTML;
            document.getElementById("lname").value = this.cells[2].innerHTML;
            document.getElementById("gender").value = this.cells[3].innerHTML;
            document.getElementById("phone").value = this.cells[5].innerHTML;
            document.getElementById("email").value = this.cells[6].innerHTML;
            document.getElementById("usrName").value = this.cells[7].innerHTML;
            document.getElementById("password").value = this.cells[8].innerHTML;
            document.getElementById("accType").value = this.cells[9].innerHTML;
        };
      }
    }
    selectedRow();
    function sendData() {
            table.deleteRow(rIndex);

            const xhttp = new XMLHttpRequest();
            var temp = "";
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(temp = this.responseText);
                }
            }
            if(temp == "Account BLocked"){
                document.getElementById("message").value=this.responseText;
            }
            
            xhttp.open("POST", "../Controller/BlockAction.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            const myData = {
                "usrId" : document.getElementById("uId").value,
                "email" : document.getElementById("email").value
            }
            xhttp.send("obj="+JSON.stringify(myData));
            document.getElementById("uId").value = "";
            document.getElementById("fname").value = "";
            document.getElementById("lname").value = "";
            document.getElementById("gender").checked = "";
            document.getElementById("phone").value = "";
            document.getElementById("email").value = "";
            document.getElementById("usrName").value = "";
            document.getElementById("type").value = "";
        }

</script>
<?php include('../inc/Footer.php');
    include('../inc/menu.html');?>
     <br>
</body>
</html>