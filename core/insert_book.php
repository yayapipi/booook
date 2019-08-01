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

session_start();
if(isset($_SESSION['valid'])){
	if($_SESSION['valid'] == true)
	//	echo $_SESSION['login_user'];
}

?>

<form action="/insetion.php" method="post">
  ISBN:<br>
  <input type="number" name="isbn" value="">
  <br>
  Book Name:<br>
  <input type="text" name="name" value="">
  <br>
  Author:<br>
  <input type="text" name="author" value="">
  <br>
  Type:<br>
  <input type="text" name="type" value="">
  <br>
  Page:<br>
  <input type="number" name="page" value="">
  <br>
  Description:<br>
  <input type="text" name="description" value="">
  <br>
  Publish Date:<br>
  <input type="date" name="publish_date" value="">
  <br>
  Publisher:<br>
  <input type="text" name="publisher" value="">
  <br>
  Remarks:<br>
  <input type="text" name="remarks" value="">
  <br>
  Idea:<br>
  <textarea name="idea" value="">
  </textarea>
  <br>
  status:<br>
  <input type="radio" name="status" value="0" checked> Unread<br>
  <input type="radio" name="status" value="1" > Readed<br>
  <input type="radio" name="status" value="2"> Wishlist<br>
  <input type="radio" name="status" value="3"> Reading  
  <br>
  Rating:<br>
  <input type="radio" name="rate" value="1" checked> 1 
  <input type="radio" name="rate" value="2" > 2
  <input type="radio" name="rate" value="3" > 3
  <input type="radio" name="rate" value="4" > 4
  <input type="radio" name="rate" value="5" > 5
  <br>
  Bookmarks:<br>
  <input type="number" name="bookmarks" value="">
  <br>
  Reading Hours Used:<br>
  <input type="time" name="read_time" value="">
  <br>
  Reading Page:<br>
  <input type="number" name="read_page" value="">
  <br>
  finish date<br>
  <input type="date" name="finish_date" value="">
  <br>
  <br>
  <input type="submit" value="Submit">
</form> 

<?php 

if(isset($_SESSION['valid'])){
$string = '
<form action="/logout.php">
	<input type="submit" value="Logout">
</form>
';
echo $string;
}
?>

</body>
</html>