<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "review-travel");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    // echo "Connected successfully";
