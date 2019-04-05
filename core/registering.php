<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  $sql1 = "INSERT INTO userdata(username,password,email,state) 
           VALUES('"
           .$_POST['username']. "','"
           .$_POST['password']. "','"
           .$_POST['email']. "','"
           ."0". "'"
           .")";
  $conn->query($sql1);
  echo $sql1;

  $sql_createTable = "CREATE TABLE Booklist_".$_POST['username'].
                      "(id INT(1000) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        isbn INT(100),
                        name VARCHAR(255) NOT NULL,
                        authors VARCHAR(255),
                        type VARCHAR(255),
                        page INT(100),
                        description VARCHAR(1000),
                        publish_date DATE,
                        publisher VARCHAR(255),
                        remark VARCHAR(255),
                        review VARCHAR(8000),
                        status INT(1),
                        rate INT(1),
                        bookmark INT(10),
                        readtime time,
                        readpage INT(10),
                        finishdate Date,
                        bookimage VARCHAR(255)
                      )";
  $conn->query($sql_createTable);

  echo $sql_createTable;
$conn->close();

header('location: ../pages/system/login.php');

?>


</body>
</html>