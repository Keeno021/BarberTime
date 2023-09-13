<?php
session_start();
//Localhost connection
$conn = new mysqli('localhost', 'root', '', 'barbertime1');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  echo "Connected successfully";

  $conn -> set_charset("utf8");

  ?>