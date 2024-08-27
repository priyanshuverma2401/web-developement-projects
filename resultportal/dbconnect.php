<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "session2125";

  $conn = mysqli_connect($servername, $username, $password, $database);
  if(!$conn){
    die("Sorry! We're facing some issue right now.[server Error]");
  }
?>