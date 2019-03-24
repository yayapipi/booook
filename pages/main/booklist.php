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
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>

 <!--BOOKLIST PHP -->
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
          <a class="navbar-brand brand-logo" href="../../index.html"><img src="../../images/logo.svg" alt="logo"/></a>
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
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">Yayapipi Goh</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
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
            <a class="nav-link" href="../../index.html">
              <i class="mdi mdi-book-open menu-icon"></i>
              <span class="menu-title">Booklist</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-book-plus menu-icon"></i>
              <span class="menu-title">Add New Book</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/charts/chartjs.html">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Data Analysis</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/basic-table.html">
              <i class="mdi mdi-border-color menu-icon"></i>
              <span class="menu-title">Suggestion</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/icons/mdi.html">
              <i class="mdi mdi-information menu-icon"></i>
              <span class="menu-title">Credit</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h4 class="card-title" style="text-align: center;">Booook List</h4>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Book Name
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Type
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Edit
                          </th>
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
						           $description[$count-1] ."</td><td>" .
						           $type[$count-1] . "</td><td>" .
						           $status[$count-1] . "</td><td>" .
						           '<i class="mdi mdi-border-color menu-icon" style="color: #71c016;"></i>' .
						           "</td></tr>";
						      $count++;
						    }
						  }else{
						    echo "Please Log In";
						    header("location: /booook/login.php");
						  }

						?>

                        
                      </tbody>
                    </table>
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
  <!-- End custom js for this page-->
</body>

</html>
