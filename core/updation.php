<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Booook Insertion Status</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
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

session_start();
?>
   <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="#"><img src="../images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">
                <?php
                echo $_SESSION['login_user'];
                ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <!--Side Bar-->
    <!-- partial -->
    <br>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../pages/main/booklist.php">
              <i class="mdi mdi-book-open menu-icon"></i>
              <span class="menu-title">Booklist</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../pages/forms/bookinsert.php"  >
              <i class="mdi mdi-book-plus menu-icon"></i>
              <span class="menu-title">Add New Book</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Data Analysis</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-border-color menu-icon"></i>
              <span class="menu-title">Suggestion</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-information menu-icon"></i>
              <span class="menu-title">Credit</span>
            </a>
          </li>
        </ul>
      </nav>

  <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">


            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Update Status</h4>
                  <p class="card-description">
                  </p>




<?php 

if(isset($_SESSION['valid'])){
	if($_SESSION['valid'] == true){
    
   // echo '<button type="button" class="btn btn-inverse-danger btn-fw">Sorry, there was an error uploading your file.</button>';
  //  echo '<button type="button" class="btn btn-inverse-success btn-fw">Success</button>';



if($_FILES["fileToUpload"]["name"]!=null){
echo '<b><p class="text-danger " >Image Upload Status :</p> ';
if (!file_exists('../images/BookImages/'.$_SESSION['login_user'])) {
    mkdir('../images/BookImages/'.$_SESSION['login_user'], 0755, true);
}

  $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
  $target_dir = '../images/BookImages/'.$_SESSION['login_user'].'/';
  $target_name = $_POST['id'] . '_' . $_POST['name'] . '.' . $imageFileType; //rand(1,1000) . '_' . basename($_FILES["fileToUpload"]["name"]) ;
  $target_file = $target_dir . $target_name ;
  $uploadOk = 1;

// Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo '<button type="button" class="btn btn-inverse-success btn-fw">';
          echo "File is an image - " . $check["mime"] . ".";
          echo '</button><br>';
          $uploadOk = 1;
        } else {
          echo '<button type="button" class="btn btn-inverse-danger btn-fw">File Is Not An Images !</button><br>';
        $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      unlink($target_file);
      $uploadOk = 1;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000000) {
     echo '<button type="button" class="btn btn-inverse-danger btn-fw">Sorry, your file is too large.</button><br>';
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo '<button type="button" class="btn btn-inverse-danger btn-fw">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</button><br>';
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo '<button type="button" class="btn btn-inverse-danger btn-fw">Sorry, your file was not uploaded.</button><br>';
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo '<button type="button" class="btn btn-inverse-success btn-fw">Success Upload Image File</button><br>';
      } else {
          echo '<button type="button" class="btn btn-inverse-danger btn-fw">Sorry, there was an error uploading your file.</button><br>';
      }
  }
}else{
  $uploadOk =0;
}
  

if ($uploadOk ==1){
  $sql_update = "UPDATE booklist_".$_SESSION['login_user']." SET " .
                "isbn = '" . $_POST['isbn']. "'," .
                "name = '" . $_POST['name']. "'," .
                "authors = '" . $_POST['author']. "'," .
                "type = '" . $_POST['type']. "'," .
                "page = '" . $_POST['page']. "'," .
                "description = '" . $_POST['description']. "'," .
                "publish_date = '" . $_POST['publish_date']. "'," .
                "publisher = '" . $_POST['publisher']. "'," .
                "remark = '" . $_POST['remarks']. "'," .
                "review = '" . $_POST['idea']. "'," .
                "status = '" . $_POST['status']. "'," .
                "rate = '" . $_POST['rate']. "'," .
                "bookmark = '" . $_POST['bookmarks']. "'," .
                "readtime = '" . $_POST['read_time']. "'," .
                "readpage = '" . $_POST['read_page']. "'," .
                "finishdate = '" . $_POST['finish_date']. "'," .
                "bookimage = '" . $target_name. "'".

   "WHERE id = " . $_POST['id'];
 }else{
    $sql_update = "UPDATE booklist_".$_SESSION['login_user']." SET " .
                "isbn = '" . $_POST['isbn']. "'," .
                "name = '" . $_POST['name']. "'," .
                "authors = '" . $_POST['author']. "'," .
                "type = '" . $_POST['type']. "'," .
                "page = '" . $_POST['page']. "'," .
                "description = '" . $_POST['description']. "'," .
                "publish_date = '" . $_POST['publish_date']. "'," .
                "publisher = '" . $_POST['publisher']. "'," .
                "remark = '" . $_POST['remarks']. "'," .
                "review = '" . $_POST['idea']. "'," .
                "status = '" . $_POST['status']. "'," .
                "rate = '" . $_POST['rate']. "'," .
                "bookmark = '" . $_POST['bookmarks']. "'," .
                "readtime = '" . $_POST['read_time']. "'," .
                "readpage = '" . $_POST['read_page']. "'," .
                "finishdate = '" . $_POST['finish_date'] . 

   "' WHERE id = " . $_POST['id'];
 }

 
  $conn->query($sql_update);
  echo '<br ><b><p class="text-success " >Book Information Status :</p> ';
  echo '<button type="button" class="btn btn-inverse-success btn-fw">Success Updated Book</button>';
  echo "<hr>";

  echo '<a href="../pages/main/booklist.php" ><button type="button" class="btn btn-secondary btn-rounded btn-fw">Booklist Page</button></a><br><br>';

} 
}

?>
 

       </div>
     </div>
   </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->



  <!-- plugins:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</body>
</html>