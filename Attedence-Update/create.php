<?php

include("database/db_conection.php");


// Check connection
if ($dbcon->connect_error) {
  die("Connection failed: " . $dbcon->connect_error);
}
// Create database
$sql = "CREATE DATABASE attendance_by_day";
if ($dbcon->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $dbcon->error;
}
?>