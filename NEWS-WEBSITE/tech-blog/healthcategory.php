<?php
session_start();
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>techblog | Health News</title>
<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="assets/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="assets/css/colors.css" rel="stylesheet">
<!-- Search bar -->
<link href="assets/css/search.css" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="assets/css/tech.css" rel="stylesheet">
</head>

<body>

  <div id="wrapper">
    <?php include('includes/header.php'); ?>
    <div class="page-title lb single-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h2><i class="fa fa-gears bg-orange"></i> Health <small class="hidden-xs-down hidden-sm-down">All Health News. </small></h2>
          </div><!-- end col -->
          <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="healthcatecory.php">Health</a></li>
            </ol>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end page-title -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="page-wrapper">
              <div class="blog-top clearfix">
                <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
              </div><!-- end blog-top -->

              <div class="blog-list clearfix">
                <div class="blog-box row">

                </div><!-- end blog-box -->
                <?php
                if (isset($_GET['pageno'])) {
                  $pageno = $_GET['pageno'];
                } else {
                  $pageno = 1;
                }
                $no_of_records_per_page = 4;
                $offset = ($pageno - 1) * $no_of_records_per_page;


                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);


                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 AND tblposts.CategoryId = 6 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <div class="blog-box row">
                    <div class="col-md-4">
                      <div class="post-media">
                        <a href="readpost.php?nid=<?php echo htmlentities($row['pid']) ?>" title="">
                          <img src="../admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="" class="img-fluid">
                          <div class="hovereffect"></div>
                        </a>
                      </div><!-- end media -->
                    </div><!-- end col -->

                    <div class="blog-meta big-meta col-md-8">
                      <h4><a href="readpost.php?nid=<?php echo htmlentities($row['pid']) ?>" title=""><?php echo htmlentities($row['posttitle']); ?></a></h4>
                      <small class="firstsmall"><a class="bg-orange" href="techcatecory.php" title=""><?php echo htmlentities($row['subcategory']); ?></a></small>
                      <small><a href="readpost.php?nid=<?php echo htmlentities($row['pid']) ?>" title=""><?php echo htmlentities($row['postingdate']); ?></a></small>
                      <small><a href="readpost.php?nid=<?php echo htmlentities($row['pid']) ?>" title=""><i class="fa fa-eye"></i> 1114</a></small>
                    </div><!-- end meta -->
                  </div><!-- end blog-box -->
                  <br><br>
                <?php } ?>
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
                <hr class="invis">
              </div><!-- end blog-list -->
            </div><!-- end page-wrapper -->

            <hr class="invis">

            <div class="row">
              <div class="col-md-12">
                <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-start">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
              </div><!-- end col -->
            </div><!-- end row -->
          </div><!-- end col -->

          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="sidebar">
              <div class="widget">
                <h2 class="widget-title">Popular Posts</h2>
                <div class="blog-list-widget">
                  <div class="list-group">
                    <a href="readpost.php?nid=28" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="w-100 justify-content-between">
                        <img src="upload/excercises.jpg" alt="" class="img-fluid float-left">
                        <h5 class="mb-1">The 4 Best Exercises for Weight Loss</h5>
                        <small>12 Juin, 2023</small>
                      </div>
                    </a>

                    <a href="readpost.php?nid=29" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="w-100 justify-ontent-between">
                        <img src="upload/vinicius.jpg" alt="" class="img-fluid float-left">
                        <h5 class="mb-1">Real Madrid Vinicius Jr accuses Spain...</h5>
                        <small>11 Juin, 2023</small>
                      </div>
                    </a>

                    <a href="readpost.php?nid=30" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="w-100 last-item justify-content-between">
                        <img src="upload/jordan.png" alt="" class="img-fluid float-left">
                        <h5 class="mb-1">NBA Fans Crushed Scottie Pippin For...</h5>
                        <small>07 Juin, 2023</small>
                      </div>
                    </a>
                  </div>
                </div><!-- end blog-list -->
              </div><!-- end widget -->
              <div class="widget">
                <h2 class="widget-title">Recent Reviews</h2>
                <div class="blog-list-widget">
                  <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action flex-column align-items-start">
                      <?php
                      $sts = 1;
                      $query = mysqli_query($con, "select name,comment,postingDate from  tblcomments where status='$sts' LIMIT 3");
                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                        <div class="w-100 justify-content-between">
                          <img src="upload/iconcomment.png" alt="" class="img-fluid float-left">
                          <h5 class="mb-1"><?php echo htmlentities($row['comment']); ?></h5>
                          <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </span>
                        </div>
                      <?php } ?>
                    </a>
                  </div>
                </div><!-- end blog-list -->
              </div><!-- end widget -->

              <div class="widget">
                <h2 class="widget-title">Follow Us</h2>

                <div class="row text-center">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button facebook-button">
                      <i class="fa fa-facebook"></i>
                      <p>27k</p>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button twitter-button">
                      <i class="fa fa-twitter"></i>
                      <p>98k</p>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button google-button">
                      <i class="fa fa-google-plus"></i>
                      <p>17k</p>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button youtube-button">
                      <i class="fa fa-youtube"></i>
                      <p>22k</p>
                    </a>
                  </div>
                </div>
              </div><!-- end widget -->
            </div><!-- end sidebar -->
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <?php include('includes/footer.php'); ?>
    <div class="dmtop">Scroll to Top</div>

  </div><!-- end wrapper -->

  <!-- Core JavaScript
    ================================================== -->
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>