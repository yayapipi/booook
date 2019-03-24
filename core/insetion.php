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

session_start();
if(isset($_SESSION['valid'])){
	if($_SESSION['valid'] == true){
		echo $_SESSION['login_user'];
  
  $sql_insert = "INSERT INTO booklist_". $_SESSION['login_user'] ."(isbn,name,authors,type,page,description,publish_date,publisher,remark,review,status,rate,bookmark,readtime,readpage,finishdate) 
           VALUES('"
           .$_POST['isbn']. "','"
           .$_POST['name']. "','"
           .$_POST['author']. "','"
           .$_POST['type']. "','"
           .$_POST['page']. "','"
           .$_POST['description']. "','"
           .$_POST['publish_date']. "','"
           .$_POST['publisher']. "','"
           .$_POST['remarks']. "','"
           .$_POST['idea']. "','"
           .$_POST['status']. "','"
           .$_POST['rate']. "','"
           .$_POST['bookmarks']. "','"
           .$_POST['read_time']. "','"
           .$_POST['read_page']. "','"
           .$_POST['finish_date']. "'"
           .")";
  $conn->query($sql_insert);
  echo $sql_insert;
} 
}

?>

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