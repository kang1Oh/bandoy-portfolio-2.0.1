<?php
//LOCALHOST
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jrmb_portfolio_db";

//INFINITYFREE HOSTING
// $servername = "sql302.infinityfree.com"; 
// $username = "if0_36554462"; 
// $password = "Kangsdomain19"; 
// $dbname = "if0_36554462_jrmb_portfolio_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>