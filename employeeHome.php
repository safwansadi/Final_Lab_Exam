<?php 
 session_start();
?>

<html>
<head>
</head>
<body>
  <h1>wecome to Facade</h1>
  <div>
    <p>hello <?php 
      if(isset($_SESSION['Name'])){
        echo $_SESSION['Name'];
    }
    ?>


  </p>
    <form method="POST">
        <input type="submit" value="Add New Job" name="add_job"> 
        <input type="submit" value="Logout" name="emp_logout">
    </form>

    <?php
      if(isset($_POST['emp_logout'])){
          header("Location: ./EmployeeFacade.php");
          session_destroy();
      }
      if(isset($_POST['add_job'])){
          header('Location: ./AddJob.php')
      }
    ?>
  </div>
</body>
</html>