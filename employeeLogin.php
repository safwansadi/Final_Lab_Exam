<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
</head>
<body>
    <div class="login-box">
        
        <form action="?" method="POST">
            <fieldset>
                
                <div class="user-box">
                    <label>Email: </label>
                    <input type="email" name="uemail" required >
                </div>
                <div class="user-box">
                    <label>Password: </label>
                    <input type="password" name="upassword" required >
                </div>
                <input type="submit" value="Login" name="patient_login">
                <a href="./employeeLogin.php" class="back_login_Submit">Back To Login Info Page</a>
                <a href="./EmployeeRegistration.php" class="patient_register">Register</a>
                <?php 
                    if(isset($_POST['patient_login'])){
                        $connection = mysqli_connect('127.0.0.1', 'root', '', 'Employee_info');
                            $result = mysqli_query($connection, 'select * from mainemployee');
                                $flag=0;
                                while($data = mysqli_fetch_assoc($result)) {
                                    
                                    if($data['Email'] === $_POST['uemail'] && $data['Password'] === $_POST['upassword']) {
                                        $_SESSION['Email']=$data['Email'];
                                        $_SESSION['Name']=$data['Name'];
                                        $_SESSION['Location'] = $data['Location'];
                                        header("Location: PatientHomepage.php");
                                        
                                        $flag=1;
                                        break;
                                    }
                                }
                                if($flag==0) {
                                    echo "Try again with correct password and id ";
                                }
                    } 
                ?>
            </fieldset>
        </form>
    </div>
</body>
</html>