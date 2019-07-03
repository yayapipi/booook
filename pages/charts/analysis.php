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

<!-- Analysis Variable Declaration -->
  <?php
    $total_book = $i;
    echo $total_book;

  ?>


  <?php

    //Get Current Year Month Readed Book Data Count
    if(isset($_SESSION['login_user'])){

      $sql = "SELECT EXTRACT(MONTH FROM finishdate) as month ,COUNT(*) as num FROM booklist_" .$_SESSION['login_user'] . " WHERE EXTRACT(YEAR FROM finishdate) = YEAR(CURRENT_TIMESTAMP) GROUP BY EXTRACT(MONTH FROM finishdate)";
      $result = $conn->query($sql);

      if($result){
        if($result->num_rows >0){
          $i = 0;
          while($row = $result->fetch_assoc()) {
            $month_raw[$i] = $row["month"];
            $count[$i] = $row["num"];
            $i++;
          }
        }else{
         $i =0;
        }
      }else{
       $i=-1;
      }

        for($k=0;$k<12;$k++){
          $month_data[$k] =0;
        }

        for($k=0;$k<$i;$k++){
          $month_data[$month_raw[$k]-1] = $count[$k];
        }

    }
  ?>

    <?php

    //Get Current Year -5 total readed book count
    if(isset($_SESSION['login_user'])){

      $sql = "SELECT EXTRACT(YEAR FROM finishdate) as year ,COUNT(*) as num FROM booklist_" .$_SESSION['login_user'] . " GROUP BY EXTRACT(YEAR FROM finishdate)";

      $result = $conn->query($sql);

      if($result){
        if($result->num_rows >0){
          $year_count = 0;
          while($row = $result->fetch_assoc()) {
            $year_raw[$year_count] = $row["year"];
            $count_year[$year_count] = $row["num"];
            $year_count++;
          }
        }else{
         $year_count =0;
        }
      }else{
       $year_count=-1;
      }

        $current_year =  date("Y");

        for($k=0;$k<5;$k++){
          $year_data[$k] = $current_year-4+$k;
          $year_value[$k] =0;
        }

        for($k=0;$k<$year_count;$k++){
          for($k2=0;$k2<5;$k2++){
            if($year_raw[$k]==$year_data[$k2]){
                  $year_value[$k2] =  $count_year[$k];
            }
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
            <a class="nav-link"  href="../forms/bookinsert.php"  >
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
            <a class="nav-link" href="../forms/suggestion.php">
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title">Analysis</h4>
                  Total Read Book : 
                    <?php

                       echo $total_book;
                                                  //echo ($finishdate[7]->format('Y-m-d'));

                    ?>

                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Current Year Month Reading Frequency</h4>
                  <canvas id="lineChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Year Reading Frequency</h4>
                  <canvas id="barChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Status</h4>
                  <canvas id="doughnutChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Book Rating</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Top 10 Authors</h4>
                   <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Book Type
                          </th>

                          <th>
                            Number
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            $ 77.99
                          </td>

                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Top 10 Book Types</h4>
                   <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Author Name
                          </th>

                          <th>
                            Number
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            $ 77.99
                          </td>

                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        

        <?php
          $color = $month_data[5];
        ?>
        
        

<script type="text/javascript">

    var month_data_0 = "<?= $month_data[0] ?>";
    var month_data_1 = "<?= $month_data[1] ?>";
    var month_data_2 = "<?= $month_data[2] ?>";
    var month_data_3 = "<?= $month_data[3] ?>";
    var month_data_4 = "<?= $month_data[4] ?>";
    var month_data_5 = "<?= $month_data[5] ?>";
    var month_data_6 = "<?= $month_data[6] ?>";
    var month_data_7 = "<?= $month_data[7] ?>";
    var month_data_8 = "<?= $month_data[8] ?>";
    var month_data_9 = "<?= $month_data[9] ?>";
    var month_data_10 = "<?= $month_data[10] ?>";
    var month_data_11 = "<?= $month_data[11] ?>";

    var year_data_0 = "<?= $year_data[0] ?>";
    var year_data_1 = "<?= $year_data[1] ?>";
    var year_data_2 = "<?= $year_data[2] ?>";
    var year_data_3 = "<?= $year_data[3] ?>";
    var year_data_4 = "<?= $year_data[4] ?>";

    var year_value_0 = "<?= $year_value[0] ?>";
    var year_value_1 = "<?= $year_value[1] ?>";
    var year_value_2 = "<?= $year_value[2] ?>";
    var year_value_3 = "<?= $year_value[3] ?>";
    var year_value_4 = "<?= $year_value[4] ?>";



  var color= "<?= $color ?>";</script>

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
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/chart.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
