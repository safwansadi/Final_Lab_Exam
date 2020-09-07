<?php
    require_once('db.php');
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'employee_info'); 
    if($connection-> connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    function getAllEmployeeRequests(){
		$con = dbConnection();
		$sql = "select * from employee_request";
		$result = mysqli_query($con, $sql);
		$users =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		};
		return $users;
	}

    $employeerequests = getAllEmployeeRequests();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee REQUESTS</title>
</head>
<body>
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
			<?php for($i=0; $i != count($employeerequests); $i++ ){ ?>
				
				<tr>
					<td><?=  $employeerequests[$i]['Name'] ?></td>
				
					<td><?=  $employeerequests[$i]['Email'] ?></td>
					<td><?=  $employeerequests[$i]['Gender'] ?> </td>
					<td><?=  $employeerequests[$i]['Birth_Date'] ?> </td>
					
					<td><?=  $employeerequests[$i]['Location'] ?> </td>
					<td><?=  $employeerequests[$i]['Password'] ?> </td>
					
					<td>
						<input type="submit" value="Accepted" name="employee_acc">
							|
						<input type="submit" value="Rejected" name="employee_rej">
					</td>


					<script>
					
					</script>
				</tr>
			</form>
		<?php 
		
		if(isset($_POST['employee_acc'])){
			$connection = dbConnection();
			$employee_name =   $employeerequests[$i]['Name'];
			$employee_address =  $employeerequests[$i]['Location'];
			$employee_email =  $employeerequests[$i]['Email'];
			$employee_gender =  $employeerequests[$i]['Gender'];
			$employee_birthday =  $employeerequests[$i]['Birth_Date'];
			$employee_password =  $employeerequests[$i]['Password'];
			$sql = "INSERT INTO mainemployee_table(Name, Location, Gender,Birth_Date, Email , Password) VALUES ('$employee_name','$employee_address','$employee_gender','$employee_birthday','$employee_email','$employee_password')";
			if($connection->query($sql)) {
				echo "Employee Accepted!";
			$sql2 = "Delete From employee_request where Email='$employee_email'";
			$connection->query($sql2);
			$connection->close();
			} else {
				echo "Please Try Again";
			} 

		} else if(isset($_POST['employee_rej'])){
			$connection = dbConnection();
			$doc_email =  $employeerequests[$i]['Email'];
			$sql2 = "Delete From employee_request where Email='$pat_email'";
			$connection->query($sql2);
			$connection->close();
		}
	}
		?>
	</table>
	
</body>
</html>