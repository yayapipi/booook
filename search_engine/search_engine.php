<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Booook</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/popup.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
		 <?php
		if(isset($_GET['search'])){
			$command = "python search.py ".$_GET['search'];
			exec($command,$ret,$data);
			$myfile = fopen("search-result.txt", "r") or die("Unable to open file!");
			echo fgets($myfile);
			fclose($myfile);
		}
		

	?>

</body>


</html>