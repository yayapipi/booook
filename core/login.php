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
} else{
	echo " Connected ";
}


session_start();

?>

<?php
    $msg = '';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM userdata WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['valid'] = true;
         
         echo $_SESSION['login_user'];
         header('location: insert_book.php');
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<form action="/login.php" method="post">
  Username:<br>
  <input type="text" name="username" value="">
  <br>
  Password:<br>
  <input type="password" name="password" value="">
  <br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>