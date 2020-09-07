<?php
    require_once('db.php');
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'patient_info'); 
    if($connection-> connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    function getAllPatientRequests(){
		$con = dbConnection();
		$sql = "select * from patient_request";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

    $patientrequests = getAllPatientRequests();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient REQUESTS</title>
</head>
<body>
    <h1>Here are the requests of new registered Patient.</h1>
    <p>You can either Accept or Reject their Requests</p>
	<form method="POST">
		<table border=1> 
			<tr> 
				<td>NAME</td>
				<td>ADDRESS</td> 
				<td>EMAIL</td>
				<td>GENDER</td>
				<td>Birth date</td>
				
				<td>LOCATION</td>
				<td>Password</td>
				
			</tr>
			<?php for($i=0; $i != count($patientrequests); $i++ ){ ?>
				
				<tr>
					<td><?=  $patientrequests[$i]['Name'] ?></td>
				
					<td><?=  $patientrequests[$i]['Email'] ?></td>
					<td><?=  $patientrequests[$i]['Gender'] ?> </td>
					<td><?=  $patientrequests[$i]['Birth_Date'] ?> </td>
					
					<td><?=  $patientrequests[$i]['Location'] ?> </td>
					<td><?=  $patientrequests[$i]['Password'] ?> </td>
					
					<td>
						<input type="submit" value="Accepted" name="doc_acc">
							|
						<input type="submit" value="Rejected" name="doc_rej">
					</td>


					<script>
					
					</script>
				</tr>
			</form>
		<?php 
		
		if(isset($_POST['doc_acc'])){
			$connection = dbConnection();
			$pat_name =   $patientrequests[$i]['Name'];
			$pat_address =  $patientrequests[$i]['Location'];
			$pat_email =  $patientrequests[$i]['Email'];
			$pat_gender =  $patientrequests[$i]['Gender'];
			$pat_birthday =  $patientrequests[$i]['Birth_Date'];
			$pat_password =  $patientrequests[$i]['Password'];
			$sql = "INSERT INTO mainpatient_table(Name, Location, Gender,Birth_Date, Email , Password) VALUES ('$pat_name','$pat_address','$pat_gender','$pat_birthday','$pat_email','$pat_password')";
			if($connection->query($sql)) {
				echo "Doctor Accepted!";
			$sql2 = "Delete From patient_request where Email='$pat_email'";
			$connection->query($sql2);
			$connection->close();
			} else {
				echo "Please Try Again";
			} 

		} else if(isset($_POST['doc_rej'])){
			$connection = dbConnection();
			$doc_email =  $patientrequests[$i]['Email'];
			$sql2 = "Delete From patient_request where Email='$pat_email'";
			$connection->query($sql2);
			$connection->close();
		}
	}
		?>
	</table>
	
</body>
</html>