<?php

$connect = new mysqli('localhost','root', '','crudop');

if(!$connect)
{
   die(mysqli_error($connect));
}

?>