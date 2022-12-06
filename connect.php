<?php
$conn= new mysqli("localhost","root","","nlcs");

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
$conn -> set_charset("utf8");


?>

