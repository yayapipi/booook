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
<body onload="document.form1.submit();">
		 <?php
		if(isset($_GET['url'])){
			$command = "python read.py ".$_GET['url'];
			exec($command,$ret,$data);
			$myfile = fopen("read-result.txt", "r") or die("Unable to open file!");
			//echo fgets($myfile);
			$data = fgets($myfile);
      list($title,$isbn,$page,$publisher,$author,$types,$publish_date,$image,$content) = explode("#",$data);
    //  echo $title;

		}
		

	?>

  <form  name="form1" action="../pages/forms/bookinsert.php" method="post" enctype="multipart/form-data">
    <input name="title" value="<?php echo($title); ?>">
    <input name="isbn" value="<?php echo($isbn); ?>">
    <input name="page" value="<?php echo($page); ?>">
    <input name="publisher" value="<?php echo($publisher); ?>">
    <input name="author" value="<?php echo($author); ?>">
    <input name="types" value="<?php echo($types); ?>">
    <input name="publish_date" value="<?php echo($publish_date); ?>">
    <input name="image" value="<?php echo($image); ?>">
    <input name="content" value="<?php echo($content); ?>">
  </form>


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