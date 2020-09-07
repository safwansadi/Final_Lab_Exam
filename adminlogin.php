<?php
    require_once('db.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Assets/AdminFacade.css" media="screen"/>
    <title>Admin Facade</title>
</head>
<body>
    <div class="login-box">
        <div class="container">
            <form action="?" method="POST">
                    <h2 style="color:#85929E">HELLO ADMIN</h2>
                    <div class="user-box1">
                        <input type="email" name="uemail" placeholder="Type Email" required style="font-size:16pt;">
                        <br>
                        <br>
                        <input type="password" name="upassword" placeholder="Type Password" required  style="font-size:16pt;">             
                    </div>
                    <div class="container_2">
                        <input type="submit" name="submit" value="LOGIN">
                    </div>
                        
                    <?php 
                        if(isset($_POST['submit'])){
                            $ad_email = $_POST['uemail'];
                            $ad_password = $_POST['upassword'];
                            

                            $con = dbConnection();
                            $sql = "select * from admin_table where Email='{$ad_email}' and Password='{$ad_password}'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);
                            if($row) {
                                $_SESSION['Name'] = $row['Name'];
                                $_SESSION['Email'] = $row['Email'];
                                header("Location: ./AdminHomepage.php");
                            } else {
                                echo "Please Enter Correct Password and Email.";
                            }
                        }
                    ?>
            </form>
        </div>
    </div>
</body>
</html>