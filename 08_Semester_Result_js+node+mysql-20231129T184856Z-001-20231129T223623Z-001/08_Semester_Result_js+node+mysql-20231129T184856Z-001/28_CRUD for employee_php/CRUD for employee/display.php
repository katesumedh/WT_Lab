<?php

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
  border: 1px solid;
}
    </style>
</head>
<body>
    <div class="button">
        <button type="submit" ><a href="crud.php">Add user</a></button>
    </div>
<thead>
<tr>
        <th>name</th>
        <th>email</th>
        <th>mobile number</th>
        <th>department</th>
        <th>operartion</th>
    </tr>

    
</thead>
<br>
<tbody>
    <?php
    $sql="Select * from `crud`";
    $result=mysqli_query($connect,$sql);

    if($result)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $department = $row['department'];

            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
            <td>'.$department.'</td>
            <td>
            <button><a href="update.php?updateid='.$id.'">update</a></button>
            <button><a href="delete.php?deleteid='.$id.'">delete</a></button>
            </td>
    <br>

        </tr>';
        }
    }
    ?>
</tbody>


    
</body>
</html>