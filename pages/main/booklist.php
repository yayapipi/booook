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
              <a class="dropdown-item" href="settings.php" >
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
                          <th style="table-layout:fixed; width:25px;">
                            No.
                          </th>
                          <th nowrap="nowrap" style="table-layout:fixed; width:150px;">
                            Book Name
                          </th>
                          <th class="list-table-data-description">
                            Description
                          </th>
                          <th class="list-table-data-status-type">
                            Type
                          </th>
                          <th class="list-table-data-status-type">
                            Status
                          </th>
                          <th style="table-layout:fixed; width:25px;">
                            Edit
                          </th>
                        </tr>
                      </thead>
                      <tbody>

                      	<?php
						  $count = 1;
						  if(isset($i)){
						    while($count<=$i){
                  //Pre-process Book Status
                    $status_word;
                    if($status[$count-1]==0){
                      $status_word = "Unread";
                    }else if($status[$count-1]==1){
                      $status_word = "Read";
                    }else if($status[$count-1]==2){
                      $status_word = "Reading";
                    }else if($status[$count-1]==3){
                      $status_word = "Wishlist";
                    }
                  //Generate Result
						      echo "<tr class='clickable-row' data-href='".$count."' >  <td>".
						           $count . "</td><td>" .
						           $name[$count-1] . "</td><td class='list-table-data-description'>" .
						           $description[$count-1] ."</td><td class='list-table-data-status-type'>" .
						           $type[$count-1] . "</td><td class='list-table-data-status-type'>" .
						           $status_word . "</td><td>" .
						           '<a class="btn btn-default" href="../forms/bookedit.php?id=' . $count . '"><i class="mdi mdi-border-color menu-icon" style="color: #71c016;"></i></a>' .
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

<?php 

if(isset($_GET['book_uid'])){
return "Hi";
}

?>

    <!-- User Setting Box -->
    <button id="userBtn" style="display:none;">Open Modal</button>
    <div id="userModal" class="user-modal">
     <div class="user-modal-content">
            <div class="user-body">
                  <span class="userclose">&times;</span>
                    <img src="../../images/faces/face5.jpg" alt="profile"/>
                    <?php
                echo $_SESSION['login_user'];
                ?>

              
            </div>
     </div>
    </div>


          <!-- Book-Model-Box -->


        <button id="myBtn" style="display: none;">Open Modal</button>
        <!-- The Modal -->
        <div id="myModal" class="book-modal">

          <!-- Modal content -->
          <div class="book-modal-content">
            <div class="modal-body">
                  <span class="close">&times;</span>


                     <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <img id="book_image" style="border-radius: 16px; border: 1px solid #888;" height="95%" width="95%" alt="Bootstrap Image Preview" src="https://bci.kinokuniya.com/jsp/images/book-img/97895/97895713/9789571341712.JPG" class="rounded" />
                
              </div>
              <div class="col-md-8">
                <br>

                <h3><b id='book_name'>No Book Title</b></h3>
                <hr >
                <div class="row">
                 <div class="col-md-12">
                  <p id='book_description'>There Are Not Book Descripsion Here ...
                  </p>
                 </div>
                 </div>
                 <hr >
                <div class="row">
                  <div class="col-md-6">
                    <b>Isbn:</b> <b id='book_isbn'></b>
                    <br /> <b>Type:</b> <b id='book_type'></b>
                    <br /> <b>Page:</b> <b id='book_page'></b>
                    <br /> <b>Publish Date:</b> <b id='book_publishdate'></b>
                    <br /> <b>Publisher:</b> <b id='book_publisher'></b>
                  </div>
                  <div class="col-md-6">
                    <b>Status:</b> <b id='book_status'></b>
                    <br /> <b>Read Time:</b> <b id='book_readtime'></b>
                    <br /> <b>Read Page:</b> <b id='book_readpage'></b>
                    <br /> <b>Finish Date:</b> <b id='book_finishdate'></b>
                    <br /> <b>Rating:</b> 
                    <i id="book_rate1" class="mdi mdi-star" style="color: #cedb1e; display:inline;"></i>
                    <i id="book_rate2" class="mdi mdi-star" style="color: #cedb1e; display:inline;"></i>
                    <i id="book_rate3" class="mdi mdi-star" style="color: #cedb1e; display:inline;"></i>
                    <i id="book_rate4" class="mdi mdi-star" style="color: #cedb1e; display:inline;"></i>
                    <i id="book_rate5" class="mdi mdi-star" style="color: #cedb1e; display:inline;"></i>
                  </div>
                </div>
                <hr>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">


                <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <b style="color: black;">Review</b>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <p id="book_review">
        No Review Currently.
       </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <b style="color: black;">Remark</b>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <p id="book_remark">
        No Remark Currently.
        </p>

      </div>
    </div>
  </div>

</div>

              </div>
            </div>
          </div>
            </div>

          </div>

        </div>

        <script>

        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                 $.ajax(
                  {

                        type:'GET',
                        url:'bookcatch.php',
                        data:"book_uid="+$(this).data("href"), 
                        success: function(data){
                          //alert(data);
                          var resultData = data;
                          resultData = resultData.substring(1,resultData.length-1);
                          var result = resultData.split(',');
                          $("#book_isbn").html(result[0]);
                          $("#book_name").html(result[1]);
                          $("#book_author").html(result[2]);
                          $("#book_type").html(result[3]);
                          $("#book_page").html(result[4]);
                          $("#book_description").html(result[5]);
                          $("#book_publishdate").html(result[6]);
                          $("#book_publisher").html(result[7]);
                          $("#book_remark").html(result[8]);
                          $("#book_review").html(result[9]);
                          $("#book_status").html(result[10]);
                          $("#book_bookmark").html(result[12]);
                          $("#book_readtime").html(result[13]);
                          $("#book_readpage").html(result[14]);
                          $("#book_finishdate").html(result[15]);
                          $("#book_image").attr('src',"../../images/BookImages/"+result[17]+"/"+result[16]);
                          //Book Ranking System
                          if(result[11]==1){
                            $("#book_rate1").css('display','inline');
                            $("#book_rate2").css('display','none');
                            $("#book_rate3").css('display','none');
                            $("#book_rate4").css('display','none');
                            $("#book_rate5").css('display','none');
                          }else if(result[11]==2){
                            $("#book_rate1").css('display','inline');
                            $("#book_rate2").css('display','inline');
                            $("#book_rate3").css('display','none');
                            $("#book_rate4").css('display','none');
                            $("#book_rate5").css('display','none');
                          }else if(result[11]==3){
                            $("#book_rate1").css('display','inline');
                            $("#book_rate2").css('display','inline');
                            $("#book_rate3").css('display','inline');
                            $("#book_rate4").css('display','none');
                            $("#book_rate5").css('display','none');
                          }else if(result[11]==4){
                            $("#book_rate1").css('display','inline');
                            $("#book_rate2").css('display','inline');
                            $("#book_rate3").css('display','inline');
                            $("#book_rate4").css('display','inline');
                            $("#book_rate5").css('display','none');
                          }else if(result[11]==5){
                            $("#book_rate1").css('display','inline');
                            $("#book_rate2").css('display','inline');
                            $("#book_rate3").css('display','inline');
                            $("#book_rate4").css('display','inline');
                            $("#book_rate5").css('display','inline');
                          }

                        }
                  });
                 //window.location.reload();
                //$.ajax({ url: 'booklist.php?argument=value&foo=bar' });
                 modal.style.display = "block";
            });
        });



        btn.onclick = function() {

        //  modal.style.display = "block";
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

<script>
    function search_press(e){
        if(e.keyCode === 13){
            alert("Enter was just pressed.");
        }

        return false;
    }
</script>


</body>

</html>
