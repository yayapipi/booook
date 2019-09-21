	 <?php
		include '../../server_info.php';


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


		if(isset($_SESSION['login_user'])){

		 if(isset($_GET['query'])){
		  $sql = "SELECT * FROM booklist_" .$_SESSION['login_user']." WHERE isbn LIKE '%".$_GET['query']."%'" ." or name LIKE '%".$_GET['query']."%'"
               ." or authors LIKE '%".$_GET['query']."%'" ." or description LIKE '%".$_GET['query']."%'" ." or publisher LIKE '%".$_GET['query']."%'"
                ." or remark LIKE '%".$_GET['query']."%'" ." or review LIKE '%".$_GET['query']."%'" ." or type LIKE '%".$_GET['query']."%'";
	      }else{
	        $sql = "SELECT * FROM booklist_" .$_SESSION['login_user'];
	      }
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
		        $bookimage[$i] = $row["bookimage"];

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



if(isset($_GET['book_uid'])){
	$uid = $_GET['book_uid']-1;
	
	//Pre-process Book-status
		$status_word;
		if($status[$uid]==0){
			$status_word = "Unread";
		}else if($status[$uid]==1){
			$status_word = "Read";
		}else if($status[$uid]==2){
			$status_word = "Reading";
		}else if($status[$uid]==3){
			$status_word = "Wishlist";
		}


	//Result Generate
	echo $isbn[$uid] . ',' .
		 $name[$uid] . ',' .
		 $author[$uid] . ',' .
		 $type[$uid] . ',' .
		 $page[$uid] . ',' .
		 $description[$uid] . ',' .
		 $publish_date[$uid] . ',' .
		 $publisher[$uid] . ',' .
		 $remark[$uid] . ',' .
		 $review[$uid] . ',' .
		 $status_word . ',' .
		 $rate[$uid] . ',' .
		 $bookmark[$uid] . ',' .
		 $readtime[$uid] . ',' .
		 $readpage[$uid] . ',' .
		 $finishdate[$uid] . ',' .
		 $bookimage[$uid] . ',' .
		 $_SESSION['login_user'] .',';
}


	?>