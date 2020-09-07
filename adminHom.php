
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
</head>
<body>
    <div>

    <h1>Welcome <?php 
        if(isset($_SESSION['Name'])){
            echo $_SESSION['Name'];
        } 
    ?> 
    </h1>    
    </div>

    <div>
        <h1>What Do You Want To Do ? <h1>
    </div>

    <div class="activity_section">
        <form action="?" method="POST">
            <table>  
                <tr>
                    <td><input type="submit" name="show_employee_req" value="Employee REQUESTS"></td>
                </tr>

                <tr>
                    <td><input type="submit" name="logout" value="LOGOUT"></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        if(isset($_POST['logout'])) {
            header("Location: ./AdminLogin.php");
            session_destroy();

        }

        if(isset($_POST['show_employee_req'])) {
            header("Location: ./Employee_Requests/Employee_req.php");
        }

    ?>

</body>
</html>