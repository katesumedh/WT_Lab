<?php

include 'connect.php';
$id=$_GET['updateid'];
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    $sql="update `crud` set id =$id, name='$name', email='$email', mobile='$mobile', department='$department'";


    $result=mysqli_query($connect,$sql);
    if($result)
    {
        header('location:display.php');
    }
    else
    {
        echo "data not entered successfully";
        // die(mysqli_error($connect));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD op for employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <form action="" method="post">

    <label for="name">Name </label><br>
    <input type="text" name="name" placeholder="Enter your name" id=""><br>

    <label for="email">Email </label><br>
    <input type="text" name="email" placeholder="Enter your email"><br>

    <label for="mobile">Mobile number </label><br>
    <input type="text" name="mobile" placeholder="Enter your number" id=""><br>
 
    <label for="department">Department </label><br>
    <input type="text" name="department" placeholder="Enter your department"><br>

    <button type="submit" name="submit"> update</button>
    </form>
</div>
</body>
</html>

