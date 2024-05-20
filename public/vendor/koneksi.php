<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "TSHOP";

// Attempt to establish a connection to the database
$koneksi = new mysqli($host, $username, $password, $database);

// Check the connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Connection successful

?>
