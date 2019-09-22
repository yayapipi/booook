<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Booook</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/popup.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</head>
<body>
		 <?php
		if(isset($_GET['search'])){
			$command = "python search.py ".$_GET['search'];
			exec($command,$ret,$data);
			$myfile = fopen("search-result.txt", "r") or die("Unable to open file!");
			//echo fgets($myfile);
			$data = fgets($myfile);

			//Extract Title
			$title_word = $data;
			$count = 0;
			while(strstr($title_word,"#Title:")){
				$title_word = strstr($title_word,"#Title:");
				$title_end = strstr($title_word,"#End");
				$title_len = strlen($title_word)-strlen($title_end);
				$title[$count] = substr($title_word, strlen("#Title:"),$title_len-7);
				$title_word = substr($title_word, strlen("#Title:"));
				$count++;
		//		echo $title[$count-1];
		//		echo "<br>";
			}

			//Extract Url
			$url_word = $data;
			$count = 0;
			while(strstr($url_word,"#Url:")){
				$url_word = strstr($url_word,"#Url:");
				$url_end = strstr($url_word,"#End");
				$url_len = strlen($url_word)-strlen($url_end);
				$url[$count] = substr($url_word, strlen("#Url:"),$url_len-strlen("#End")-1);
				$url_word = substr($url_word, strlen("#Url:"));
				$count++;
		//		echo $url[$count-1];
		//		echo "<br>";
			}

			//Extract Image
			$img_word = $data;
			$count = 0;
			while(strstr($img_word,"#Image:")){
				$img_word = strstr($img_word,"#Image:");
				$img_end = strstr($img_word,"#End");
				$img_len = strlen($img_word)-strlen($img_end);
				$images[$count] = substr($img_word, strlen("#Image:"),$img_len-strlen("#End")-3);
				$img_word = substr($img_word, strlen("#Image:"));
				$count++;
		//		echo $images[$count-1];
		//		echo "<br>";
			}

			fclose($myfile);

		}
		

	?>




<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Image
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                            Add
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php
                      		$i = 0;
                      		while($i<$count){
                      		echo '<tr><td class="py-1">';
                      		echo '<img style="text-align: center; width: 100px; height: 100px; border-radius: 15%;" src="';
                      		echo $images[$i];
                      		echo '" />';
                      		echo '</td><td>';
                      		echo $title[$i];
                      		echo '</td><td>';
                      		echo '<a class="btn btn-success" href=read_engine.php?url="';
                      		echo $url[$i];
                      		echo '" target="_top">
									+
									</a>
								 ';
							echo '</td></tr>';
							$i++;
						}

                      	?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>





</body>


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


</html>