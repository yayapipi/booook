<!DOCTYPE html>
<html>
<head>
    <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php
include '../server_info.php';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  $hashed = hash('sha512',$_POST['password']);

      $sql = "SELECT username FROM userdata ";
      $result = $conn->query($sql);

      if($result){
        if($result->num_rows >0){
          $i = 0;
          while($row = $result->fetch_assoc()) {
            $db_username[$i] = $row["username"];
            $i++;
          }
        }else{
         $i =0;
        }
      }else{
       $i=-1;
      }

    $username_scan =0;
    $username_valid = 1;
    while($username_scan<$i){
      if($db_username[$username_scan] == $_POST['username'] ){
        echo "<hr>";
         echo '<button type="button" class="btn btn-inverse-danger btn-fw">Sorry, Username Is Already Exist! Please Try Another Username.</button><br>';
        echo "<hr>";
        echo '<a href="../pages/system/register.php" class="btn btn-info" role="button">Back To Register Page</a>';
        echo "      &nbsp";
        echo '<a href="../pages/system/login.php" class="btn btn-info" role="button">Login Page</a>';
        $username_valid = -1;
        break;
      }
      $username_scan = $username_scan+1;
    }


if($username_valid ==1){
  $sql1 = "INSERT INTO userdata(username,password,email,state) 
           VALUES('"
           .$_POST['username']. "','"
           .$hashed. "','"
           .$_POST['email']. "','"
           ."0". "'"
           .")";
  $conn->query($sql1);

  $sql_createTable = "CREATE TABLE Booklist_".$_POST['username'].
                      "(id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        isbn INT(100),
                        name VARCHAR(255) NOT NULL,
                        authors VARCHAR(255),
                        type VARCHAR(255),
                        page INT(100),
                        description VARCHAR(1000),
                        publish_date DATE,
                        publisher VARCHAR(255),
                        remark LONGTEXT,
                        review LONGTEXT,
                        status INT(1),
                        rate INT(1),
                        bookmark INT(10),
                        readtime time,
                        readpage INT(10),
                        finishdate Date,
                        bookimage VARCHAR(255)
                      )";
  $conn->query($sql_createTable);

$conn->close();


//Create User Image Folder
if (!file_exists('../images/UserImages/'.$_POST['username'])) {
    mkdir('../images/UserImages/'.$_POST['username'], 0755, true);
}
$default_img = "../images/UserImages/Profile.png";
$target_url = '../images/UserImages/'.$_POST['username'].'/Profile.png';
if (!copy($default_img, $target_url)) {
    echo "Error : failed to copy image profile ...\n";
}else{ }




echo "<hr>";
 echo '<button type="button" class="btn btn-inverse-success btn-fw">Register Success</button><br>';
echo "<hr>";
 echo '<a href="../pages/system/login.php" class="btn btn-info" role="button">Login Page</a>';

}

?>


</body>
</html>