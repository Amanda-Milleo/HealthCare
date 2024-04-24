<?php
   $servername = "localhost:3306";
   $username = "amanda"; 
   $password = 'amanda';
   $dbname = 'projeto';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha: ". $conn->connect_error);
  }
?>