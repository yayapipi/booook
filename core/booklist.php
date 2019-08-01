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
		echo $_SESSION['login_user'];


if(isset($_SESSION['login_user'])){

  $sql = "SELECT * FROM booklist_" .$_SESSION['login_user'];
  $result = $conn->query($sql);

  if($result){
    if($result->num_rows >0){
      $i = 0;
      while($row = $result->fetch_assoc()) {
        $isbn[$i] = $row["isbn"];
        $name[$i] = $row["name"];
        $author[$i] = $row["authors"];
        $type[$i] = $row["type"];
        $page[$i] = $row["page"];
        $description[$i] = $row["description"];
        $publish_date[$i] = $row["publish_date"];
        $publisher[$i] = $row["publisher"];
        $remark[$i] = $row["remark"];
        $review[$i] = $row["review"];
        $status[$i] = $row["status"];
        $rate[$i] = $row["rate"];
        $bookmark[$i] = $row["bookmark"];
        $readtime[$i] = $row["readtime"];
        $readpage[$i] = $row["readpage"];
        $finishdate[$i] = $row["finishdate"];

        $i++;
      }
    }else{
     $i =0;
    }
  }else{
   $i=-1;
  }
}

}

?>

<!-- Display BookList Information -->
<table >
    <thead>
      <tr>
        <th>Number</th>
        <th>Book Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
<?php
  $count = 1;
  if(isset($i)){
    while($count<=$i){
      echo "<tr><td>".
           $count . "</td><td>" .
           $name[$count-1] . "</td><td>" .
           $description[$count-1] . "</td></tr>";
      $count++;
    }
  }else{
    echo "Please Log In";
    header("location: login.php");
  }

?>
    </tbody>
</table>
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