<?php

$conn = new mysqli("classroom.cs.unc.edu", "dominno", "fad426", "dominnodb");

// Login table
//$conn->query("DROP TABLE IF EXISTS Login");

//$conn->query("CREATE TABLE Login (id int not null auto_increment, username char(25) unique, password char(25))");


// sql to create table
/*
$sql = "CREATE TABLE Login (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

// Review table    
$conn->query("DROP TABLE IF EXISTS fpReview");

//$conn->query("CREATE TABLE Review ( ")

$sql = "CREATE TABLE fpReview (
postId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
datePosted DATE NOT NULL,
building VARCHAR(30) NOT NULL,
rating INT,
tpRating INT,
helpful INT,
numRatings INT,
details TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>