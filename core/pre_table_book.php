<!DOCTYPE html>
<html>
<body>

<?php
include '../server_info.php';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Book (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30),
password VARCHAR(30),
email VARCHAR(30) NOT NULL,
img_url VARCHAR(2086),
state INT,
idkey INT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table UserData created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>