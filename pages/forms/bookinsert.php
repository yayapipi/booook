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
  if($_SESSION['valid'] == true)
    echo $_SESSION['login_user'];
}

  //Auto Fill Variable Detection
  if(isset($_POST['title'])){
    $title = $_POST['title'];
  }else{
    $title = "";
  }

  if(isset($_POST['isbn'])){
    $isbn = $_POST['isbn'];
  }else{
    $isbn = "0";
  }

  if(isset($_POST['page'])){
    $page = $_POST['page'];
  }else{
    $page = "";
  }

  if(isset($_POST['publisher'])){
    $publisher = $_POST['publisher'];
  }else{
    $publisher = "";
  }

  if(isset($_POST['author'])){
    $author = $_POST['author'];
  }else{
    $author = "";
  }

  if(isset($_POST['types'])){
    $types = $_POST['types'];
  }else{
    $types = "";
  }

  if(isset($_POST['publish_date'])){
    $publish_date = $_POST['publish_date'];
  }else{
    $publish_date = "2000-01-01";
  }

  if(isset($_POST['image'])){
    $image = $_POST['image'];
  }else{
    $image = "";
  }

  if(isset($_POST['content'])){
    $content = $_POST['content'];
  }else{
    $content = "";
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
          <li class="nav-item nav-search  d-lg-block w-100">
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
              <a class="dropdown-item" href="../main/settings.php">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
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

            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">BOOK INFORMATION DATA</h4>
                  <p class="card-description">
                  </p>


                  <div class="form-group">
                    <div class="input-group">
                      <input id="search-text" type="text" class="form-control" placeholder="Enter Book ISBN" aria-label="Recipient's username">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" id="search-btn" type="button">Search</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          



            <div class="col-6-r grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <form id="forminsert" name="forminsert" class="forms-sample" action="../../core/insetion.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Book Name</label> <label style="color:red;">*</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Enter Book Name" autofocus required value="<?php echo($title); ?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Book Author</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="author" placeholder="Book Author Name" value="<?php echo($author); ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="description" placeholder="Description Of The Book" value="<?php echo($content); ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Type</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="type" placeholder="Type Or Tags Of The Book" value="<?php echo($types); ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Status</label>
                        <select class="form-control" id="exampleSelectGender" name="status">
                          <option value="1">readed</option>
                          <option value="0">unread</option>
                          <option value="2">reading</option>
                          <option value="3">wishlist</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="exampleSelectGender">Rating</label>
                        <select class="form-control" id="exampleSelectGender" name="rate">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option selected>5</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Reflection</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="15" name="idea"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Remarks</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="remarks" placeholder="Some Remarks Of This Book">
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
                      <input type="file" name="fileToUpload" id="fileToUpload" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" >
                        <span class="input-group-append">
                          <button name="book_img" class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">ISBN</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="isbn" placeholder="ISBN Code" value="<?php echo($isbn); ?>">
                    </div>

                   

                    <div class="form-group">
                      <label for="exampleInputName1">Book Page</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="page" placeholder="Number Of Book Page Has" value="0">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Publisher</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="publisher" placeholder="Publisher Of This Book" value="<?php echo($publisher); ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Publish Date</label>
                      <input type="date" class="form-control" id="exampleInputName1" name="publish_date" placeholder="Publish Date Of This Book" value="<?php echo date("Y-m-d"); ?>">
                    </div>

                     
                     <div class="form-group">
                      <label for="exampleInputName1">Bookmark</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="bookmarks" placeholder="Bookmark for your lastest page" value="0">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Reading Hour</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="read_time" placeholder="How long did you read the book " value="0">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Reading Page</label>
                      <input type="number" class="form-control" id="exampleInputName1" name="read_page" placeholder="How Many Page Did You Read" value="0">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Finish Date</label>
                      <input type="date" class="form-control" id="exampleInputName1" name="finish_date" placeholder="When you finish reading this book" value="<?php echo date("Y-m-d"); ?>">
                    </div>



                </div>
              </div>
            </div>
             <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <button  type="submit" class="btn btn-primary btn-lg btn-block">Insert Book</button>
                </div>
              </div>
            </div>

          </div>
        </form>

                  <!-- Book-Model-Box -->


        <!-- The Modal -->
        <div id="myModal" class="book-modal">

          <!-- Modal content -->
          <div class="book-modal-content">
            <div class="modal-body">
                  <span class="close">&times;</span>

                  <div class="iframe-loading">
                  <iframe  src="" frameborder="0" width="100%"
                    onload="resizeIframe(this)" height="650px" id="search-frame"></iframe>
                  </div>

            </div>



          </div>

        </div>

        <script>

        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("search-btn");

         // Get the iframe id
        var sframe = document.getElementById("search-frame");

        // Get the search text info
        var stxt = document.getElementById("search-text");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];




        btn.onclick = function() {
          var url = "../../search_engine/search_engine.php?search='" +stxt.value+"'";
          sframe.contentWindow.document.location.href=url;
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        
        </script>





            
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
