<?php
//CHANGE VARIABLE NAMES WHEN DEPLOYING TO INFINITYFREE
$servername = "localhost"; //CHANGE THIS
$username = "root"; //CHANGE THIS
$password = ""; //CHANGE THIS
$dbname = "jrmb_portfolio_db"; //CHANGE THIS

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>