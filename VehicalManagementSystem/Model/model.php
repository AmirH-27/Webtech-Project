<?php
	require_once '../Model/db_connect.php';

	function addUser($fName, $lName, $gender, $dob, $phone, $email, $usrName, $password, $accountType){
		$connection = db_conn();
		$sql = "INSERT INTO `users` (`usrId`, `fName`, `lName`, `gender`, `dob`, `phone`, `email`, `usrName`, `password`, `accountType`) VALUES (NULL, '$fName', '$lName', '$gender', '$dob', '$phone', '$email', '$usrName', '$password', '$accountType')";
		$data = $connection->query($sql);

		if($data){
			return true;
		}
		else{
			echo "Error Storing in data base";
			return false;
		}

		$connection->close();	
	}
	function blockUser($uId, $email){
		$connection = db_conn();
		$sql = "INSERT INTO `blockedaccounts` (`usrId`, `email`) VALUES ('$uId', '$email')";
		$data = $connection->query($sql);

		if($data){
			return true;
		}
		else{
			echo "Error Storing in data base";
			return false;
		}
		$connection->close();
	}
	function deleteUserWithId($uId){
		$connection = db_conn();
		$sql = "DELETE FROM `users` WHERE usrId = '$uId'";
		$data = $connection->query($sql);

		if($data){
			return true;
		}
		else{
			echo "Error Deleting in data base";
			return false;
		}
		$connection->close();	
	}
	
	function search($search){
		$connection = db_conn();
		$sql = "SELECT `usrId`, `fName`, `lName`, `gender`, `dob`, `phone`, `email`, `usrName`, `password`, `accountType` FROM `users` WHERE usrName = '$search'";
		$stmt = $connection->prepare($sql);
    	$response = $stmt->execute();
		if ($response) {
      		$data = $stmt->get_result();
      		$output = "";
      
      		if ($data->num_rows > 0) {
      			$row = $data->fetch_assoc();
                return $row;
            }
      		else {
        		return "empty";
      		} 
      
   		 }
	}

	function updateUser($usrId, $fName, $lName, $gender, $dob, $phone, $email, $usrName, $password, $accountType, $search){
		$connection = db_conn();
		$sql = "UPDATE `users` SET `usrId`='$usrId',`fName`='$fName',`lName`='$lName',`gender`='$gender',`dob`='$dob',`phone`='$phone',`email`='$email',`usrName`='$usrName',`password`='$password',`accountType`='$accountType' WHERE usrName = '$search'";
		$data = $connection->query($sql);

		if($data){
			echo "Profile Updated";
			return true;
		}
		else{
			echo "Error Updating in data base";
			return false;
		}

		$connection->close();	
	}
	function deleteUser($search){
		$connection = db_conn();
		$sql = "DELETE FROM `users` WHERE usrName = '$search'";
		$data = $connection->query($sql);

		if($data){
			return true;
		}
		else{
			echo "Error Deleting in data base";
			return false;
		}

		$connection->close();	
	}
	
	function sendMessage($fromUser, $toUser, $message){
		$connection = db_conn();
		$sql = "INSERT INTO `chat` (`id`, `fromUser`, `toUser`, `message`) VALUES (NULL, '$fromUser', '$toUser', '$message')";
		$data = $connection->query($sql);

		if($data){
			return true;
		}
		else{
			echo "Error Storing in data base";
			return false;
		}

		$connection->close();	
	}
?>