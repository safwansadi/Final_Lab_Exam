<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form action="EmployeeRegistration.php" method = 'POST'>
 <fieldset>
  <legend>Personalia:</legend>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday"><br><br>
  <label for="gender">Gender:</label>
  <select id="gender" name="gender">
    <option value="male">male</option>
    <option value="female">female</option>
    <option value="other">others</option>
  </select><br><br>
  <div class="location">
                    <label>Location : </label>
                    <textarea id="location" name="location" rows="1" cols="50" required> Location </textarea>
                </div>
  
  <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <label for="confirmpassword"><b>Repeat Password</b></label>
   
    <input type="confirmpassword" placeholder="confirmpassword" name="confirmpassword" id="confirmpassword" required>
    <input type="submit" name ="submit_Employee" value="Submit">
    <?php
                  if (isset($_POST['password'])){
                    $password = $_POST['password'];
                    $cpassword = $_POST['confirmpassword'];
                    if($password != $cpassword){
                      $msg = "passwords doesn't match";
                 }
                      }
                  ?>
                    
 </fieldset>
</form>

</body>
</html>
<?php
                        if(isset($_POST['submit_Employee'])){

                          echo "ok";  
                            $userName = $_POST['name'];
                            $userEmail = $_POST['email']; 
                            $userPassword = $_POST['password'];
                            $BirthDate = $_POST['birthday'];
                            $Gender = $_POST['gender'];
                            $Location = $_POST['location'];

                            $connection = mysqli_connect('127.0.0.1', 'root', '', 'employee_info'); 
                            if($connection-> connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 
                            $sql = "INSERT INTO employee_request(NAME,EMAIL,Birth_Date,Gender,Location,Password) VALUES ('".$userName."','".$userEmail."', '".$BirthDate ."', '".$Gender."', '".$Location."','".$userPassword."')";
                            if($connection->query($sql) === TRUE) {
                                echo "Registration Completed!";
                            } else {
                                echo "ERROR: " . $sql . "<br>" . $conn->error;
                            }
                          }
                    ?>