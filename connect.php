<?php
$host="localhost";
$user = "root";
$pass = "";
$db = "login";

$conn = new mysql($host,$user,$pass,$db);
if($conn->connect_error){
  echo "failed to connect DB".$conn->connect_error;
}

?>