<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Booook</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="manifest" href="manifest.json"/>
</head>

<body  onload="onloadFunc()">>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-transparent text-left p-5 text-center">
              <img src="images/logo.svg"  alt="img">
              <form class="pt-5">
                <div class="form-group">
                  <h4 for="examplePassword1">A Place To Store Your Reading Book</h4>
                 
                <div class="mt-5">
                  <a class="btn btn-block btn-success btn-lg font-weight-medium" href="pages/system/login.php">Sign In To Continue</a>
                </div>
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
<script>
function onloadFunc() {
  if('serviceWorker' in navigator){
     navigator.serviceWorker
           .register('service-worker.js')
           .then(function(){
               console.log('Service Worker 註冊成功');
           }).catch(function(error) {
               console.log('Service worker 註冊失敗:', error);
           });
  } else {
     avalon.log('瀏覽器不支援 serviceWorker');
  }

  window.addEventListener('beforeinstallprompt', function(e) {
       e.userChoice.then(function(choiceResult) {
           if(choiceResult.outcome == 'dismissed') {
              console.log('user取消安裝至桌面');
           }
           else {
              console.log('user接受安裝至桌面');
           }
       });
  });
}
</script>


</body>

</html>
