<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['submit'])) {
    $adminid = $_GET['id'];
    $adminname = $_POST['AdminUserName'];
    $adminpass = $_POST['AdminPassword'];
    $options = ['cost' => 12];
    $hashedpass = password_hash($adminpass, PASSWORD_BCRYPT, $options);
    $adminemail = $_POST['AdminEmailId'];
    $status = 1;
    $query = mysqli_query($con, "Update  tbladmin set AdminUserName='$adminname',AdminPassword='$hashedpass',AdminEmailId='$adminemail' where id='$adminid'");
    if ($query) {
      $msg = "Admin Updated successfully ";
    } else {
      $error = "Something went wrong . Please try again.";
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>techblog | Add Admin</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/plugins/switchery/switchery.min.css">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <script src="assets/js/modernizr.min.js"></script>

  </head>


  <body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

      <!-- Top Bar Start -->
      <?php include('includes/topheader.php'); ?>
      <!-- Top Bar End -->


      <!-- ========== Left Sidebar Start ========== -->
      <?php include('includes/leftsidebar.php'); ?>
      <!-- Left Sidebar End -->

      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">


            <div class="row">
              <div class="col-xs-12">
                <div class="page-title-box">
                  <h4 class="page-title">Edit Admin</h4>
                  <ol class="breadcrumb p-0 m-0">
                    <li>
                      <a href="dashboard.php">Dashboard </a>
                    </li>
                    <li class="active">
                      Edit Admin
                    </li>
                  </ol>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <!-- end row -->


            <div class="row">
              <div class="col-sm-12">
                <div class="card-box">
                  <h4 class="m-t-0 header-title"><b>Edit Admin </b></h4>
                  <hr />
                  <div class="row">
                    <div class="col-sm-6">
                      <!---Success Message--->
                      <?php if ($msg) { ?>
                        <div class="alert alert-success" role="alert">
                          <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                        </div>
                      <?php } ?>

                      <!---Error Message--->
                      <?php if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                          <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                        </div>
                      <?php } ?>


                    </div>
                  </div>

                  <?php
                  $adminid = $_GET['id'];
                  $query = mysqli_query($con, "Select id,AdminUserName,AdminPassword,AdminEmailId,CreationDate,UpdationDate from  tbladmin where Is_Active=1 and id='$adminid'");
                  $cnt = 1;
                  while ($row = mysqli_fetch_array($query)) {
                  ?>



                    <div class="row">
                      <div class="col-md-6">
                        <form class="form-horizontal" name="category" method="post">
                          <div class="form-group">
                            <label class="col-md-2 control-label">Admin Username</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo htmlentities($row['AdminUserName']); ?>" name="AdminUserName" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Admin Password</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo htmlentities($row['AdminPassword']); ?>" name="AdminPassword" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Admin Email</label>
                            <div class="col-md-10">
                              <input type="text" class="form-control" value="<?php echo htmlentities($row['AdminEmailId']); ?>" name="AdminEmailId" required>
                            </div>
                          </div>
                        <?php } ?>
                        <div class="form-group">
                          <label class="col-md-2 control-label">&nbsp;</label>
                          <div class="col-md-10">

                            <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                              Update
                            </button>
                          </div>
                        </div>

                        </form>
                      </div>


                    </div>











                </div>
              </div>
            </div>
            <!-- end row -->


          </div> <!-- container -->

        </div> <!-- content -->

        <?php include('includes/footer.php'); ?>

      </div>


    </div>
    <!-- END wrapper -->



    <script>
      var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

  </body>

  </html>
<?php } ?>