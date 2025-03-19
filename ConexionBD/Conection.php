<?php
// Conection.php
$conex = mysqli_connect("localhost", "root", "", "bdutp");

// Check connection
if (!$conex) {
    die("Connection failed: " . mysqli_connect_error());
}
?>