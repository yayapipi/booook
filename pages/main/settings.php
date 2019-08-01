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
  <link rel="stylesheet" href="../../css/popup.css"
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
</head>

<body>

 <!--BOOKLIST PHP -->
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



  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="#"><img src="../../images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
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
              <form id="formsearch" name="formsearch" action="search.php" method="get" enctype="multipart/form-data">
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
              <a class="dropdown-item" href="]settings.php" >
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
            <a class="nav-link" href="booklist.php">
              <i class="mdi mdi-book-open menu-icon"></i>
              <span class="menu-title">Booklist</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../forms/bookinsert.php"  >
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
            <a class="nav-link" href="../forms/suggestion.php">
              <i class="mdi mdi-border-color menu-icon"></i>
              <span class="menu-title">Suggestion</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="credit.php">
              <i class="mdi mdi-information menu-icon"></i>
              <span class="menu-title">Credit</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h4 class="card-title" style="text-align: center;">Setting Page</h4>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <p class="card-description">
                  </p>
            
            <form  action="/core/user_updation.php" method="post" enctype="multipart/form-data">
                  
                      <div style="text-align: center;">
                        <img src="../../images/UserImages/<?php echo($_SESSION['login_user']); ?>/Profile.png" alt="profile" width="72px" height="72px" />
                        <h5 style="padding-top: 10px;"><?php
                                echo $_SESSION['login_user'];
                             ?>
                        </h5>
                      </div>
                        <div class="form-group">
                        <br>
                      <input type="file" name="fileToUpload" id="fileToUpload" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload User Image with 72*72 px">
                        <span class="input-group-append">
                          <button name="book_img" class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div style="text-align: center;">
                      <b>Change Your Email:</b>
                
                       <hr>
                      <div class="form-group">
                         <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                      </div>
                <div class="form-group">

                <b>Change Your Password:</b>

                <hr>
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Original Password" name="o_password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="New Password" name="n_password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Retype New Password" name="n2_password">
                </div>
                 <hr>
                    </div>

                </div>



              <div class="card">
                <div class="card-body">
                   <button  type="submit" class="btn btn-primary btn-lg btn-block">Update Information</button>
                </div>
              </div>
            </form>

              <div class="card">
                <div class="card-body">
                   <button  type="submit" class="btn btn-danger btn-lg btn-block">Delete Account</button>
                </div>
              </div>

              </div>


            </div>




           
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
          	<!--
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
        -->
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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
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
