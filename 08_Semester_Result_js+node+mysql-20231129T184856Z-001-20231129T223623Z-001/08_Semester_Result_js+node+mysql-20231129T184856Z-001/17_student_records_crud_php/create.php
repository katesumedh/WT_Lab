<?php 
include "config.php";
  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];    
    $gender = $_POST['gender'];
    $sql = "INSERT INTO `users`(`id`,`firstname`, `lastname`, `email`, `gender`) VALUES ('$id','$first_name','$last_name','$email','$gender')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "New record created successfully.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
    $conn->close(); 
  }
?>
<!DOCTYPE html>
<html>
<body>
<form action="" method="POST">
  <fieldset>
    <legend>Student Details:</legend>
    Id:<br>
    <input type="number" name="id">
    <br>
    First name:<br>
    <input type="text" name="firstname">
    <br>
    Last name:<br>
    <input type="text" name="lastname">
    <br>
    Email:<br>
    <input type="email" name="email">
    <br>
   Gender:<br>
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
</body>
</html>