<?php
$conn = new mysqli("localhost","root","","todolist");

if($conn->connect_error){
  echo "Connection database failed : ".$conn->connect_error;
}
?>
