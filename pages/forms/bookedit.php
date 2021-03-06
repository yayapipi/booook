<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Booook</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/popup.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
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
  if($_SESSION['valid'] == true){
    echo $_SESSION['login_user'];
  }
}

if(isset($_SESSION['login_user'])){

      $sql = "SELECT * FROM booklist_" .$_SESSION['login_user']  ;
      $result = $conn->query($sql);

      if($result){
        if($result->num_rows >=0){
          $i = 0;
          while($row = $result->fetch_assoc()) {
            $id[$i] = $row["id"];
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

?>

  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="#"><img src="../../images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="../../images/favicon.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify search-icon"></i>
                </span>
              </div>
              <form id="formsearch" name="formsearch" action="../main/search.php" method="get" enctype="multipart/form-data">
              <input name="query" type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </form>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/UserImages/<?php echo($_SESSION['login_user']); ?>/Profile.png" alt="profile"/>
              <span class="nav-profile-name">
                <?php
                echo $_SESSION['login_user'];
                ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../main/settings.php" >
                <i class="mdi mdi-settings text-primary"></i>
                <div id="userBtn" >Settings</div>
              </a>
              <a class="dropdown-item" href="../../core/logout.php">
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
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../main/booklist.php">
              <i class="mdi mdi-book-open menu-icon"></i>
              <span class="menu-title">Booklist</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="bookinsert.php"  >
              <i class="mdi mdi-book-plus menu-icon"></i>
              <span class="menu-title">Add New Book</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../charts/analysis.php">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Data Analysis</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="suggestion.php">
              <i class="mdi mdi-border-color menu-icon"></i>
              <span class="menu-title">Suggestion</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../main/credit.php">
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

<!--
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">BOOK INFORMATION DATA</h4>
                  <p class="card-description">
                  </p>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter Book ISBN" aria-label="Recipient's username">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button">Search</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
-->
            
            
            <div class="col-6-r grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <form id="forminsert" name="forminsert" class="forms-sample" action="../../core/updation.php" method="post" enctype="multipart/form-data">
                    <input name="id" value="<?php echo($id[$_GET['id']-1]); ?>" style="display: none;" >
                    <div class="form-group">
                      <label for="exampleInputName1">Book Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name"  value= "<?php echo($name[$_GET['id']-1]); ?>" placeholder="Enter Book Name"  autofocus >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Book Author</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="author" value= "<?php echo($author[$_GET['id']-1]); ?>" placeholder="Book Author Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="description"  value= "<?php echo($description[$_GET['id']-1]); ?>" placeholder="Description Of The Book" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Type</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="type"  value= "<?php echo($type[$_GET['id']-1]); ?>" placeholder="Type Or Tags Of The Book" >
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Status</label>
                      <?php
                          $selected = $status[$_GET['id']-1];
                          $rated = $rate[$_GET['id']-1];
                      ?>

                        <select class="form-control" id="exampleSelectGender" name="status">
                          <option value="0" <?php if($selected == '0'){echo("selected");}?> >unread</option>
                          <option value="1" <?php if($selected == '1'){echo("selected");}?> >readed</option>
                          <option value="2" <?php if($selected == '2'){echo("selected");}?> >reading</option>
                          <option value="3" <?php if($selected == '3'){echo("selected");}?> >wishlist</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="exampleSelectGender">Rating</label>
                        <select class="form-control" id="exampleSelectGender" name="rate">
                          <option <?php if($rated == '1'){echo("selected");}?> >1</option>
                          <option <?php if($rated == '2'){echo("selected");}?> >2</option>
                          <option <?php if($rated == '3'){echo("selected");}?> >3</option>
                          <option <?php if($rated == '4'){echo("selected");}?> >4</option>
                          <option <?php if($rated == '5'){echo("selected");}?> >5</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Reflection</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="15" name="idea" ><?php echo($review[$_GET['id']-1]); ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Remarks</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="remarks"  value= "<?php echo($remark[$_GET['id']-1]); ?>" placeholder="Some Remarks Of This Book">
                    </div>


 
                  <br>

                   
                </div>
              </div>
            </div>

            <div class="col-6-r grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                    <div class="form-group">

                      <label>Book Image Upload</label>
                      <br>
                      <div class="col-md-4">
                      <img style="border-radius: 16px; border: 1px solid #888;" height="95%" width="95%" alt="Image Preview" src="../../images/BookImages/<?php echo($_SESSION['login_user']); echo('/'); echo($bookimage[$_GET['id']-1]); ?>">
                      </div>

                      <input type="file" name="fileToUpload" id="fileToUpload" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload New Image" >
                        <span class="input-group-append">
                          <button name="book_img" class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">ISBN</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="isbn"  value= "<?php echo($isbn[$_GET['id']-1]); ?>" placeholder="ISBN Code" value="0">
                    </div>

                   

                    <div class="form-group">
                      <label for="exampleInputName1">Book Page</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="page" value= "<?php echo($page[$_GET['id']-1]); ?>" placeholder="Number Of Book Page Has" value="0">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Publisher</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="publisher"  value= "<?php echo($publisher[$_GET['id']-1]); ?>" placeholder="Publisher Of This Book">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Publish Date</label>
                      <input type="date" class="form-control" id="exampleInputName1" name="publish_date" placeholder="Publish Date Of This Book"  value= "<?php echo($publish_date[$_GET['id']-1]); ?>">
                    </div>

                     
                     <div class="form-group">
                      <label for="exampleInputName1">Bookmark</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="bookmarks" placeholder="Bookmark for your lastest page"  value= "<?php echo($bookmark[$_GET['id']-1]); ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Reading Hour</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="read_time" placeholder="How long did you read the book "  value= "<?php echo($readtime[$_GET['id']-1]); ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Reading Page</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="read_page" placeholder="How Many Page Did You Read"  value= "<?php echo($readpage[$_GET['id']-1]); ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Finish Date</label>
                      <input type="date" class="form-control" id="exampleInputName1" name="finish_date" placeholder="When you finish reading this book"  value= "<?php echo($finishdate[$_GET['id']-1]); ?>">
                    </div>



                </div>
              </div>
            </div>
             <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <button  type="submit" class="btn btn-primary btn-lg btn-block">Update Book Information</button>
                </div>
              </div>
            </div>



          </div>
        </form>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <button  onclick="javascript:location.href='../../core/deletebook.php?id=<?php echo($id[$_GET['id']-1]); ?>'"  class="btn btn-danger btn-lg btn-block">Deleted This Book !</button>
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
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
