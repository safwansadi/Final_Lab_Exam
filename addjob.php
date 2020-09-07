<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<br></br>
</head>
<body>
    <h1>Add A New Job</h1>
    <form method="POST">
        <input type="text" value="Company Name" name="Company_Name">
        <input type="text" value="Job Title" name="JOB_TITLE">
        <input type="text" value="Job Location" name="JOB_Location">
        <input type="number" value="Job Salary" name="JOB_Salary">
        <input type="submit" value="Insert" name="submit">
    </form>
    <?php 
        if(isset($_POST['submit'])){
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'employee');

            $cmp_name =  $_POST['Company_Name'];
            $job_title = $_POST['JOB_TITLE'];
            $job_salary = $_POST['JOB_Salary'];
            $job_loc = $_POST['JOB_Location'];
            $name = $_SESSION['Name'];
            $sql = "INSERT INTO job_table(CompanyName, Title, Location, Salary, Name) VALUES ('$cmp_name','$job_title','$job_loc','$job_salary', '$name')";
            if($connection->query($sql)) {
                echo "Job Inserted!";
            } else {
                echo "Please Try Again";
            }

        }




    ?>
</body>