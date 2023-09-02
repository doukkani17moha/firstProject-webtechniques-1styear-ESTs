<?php
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
  //Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      $postid = intval($_GET['nid']);
      $st1 = '0';
      $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
      if ($query) :
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
        unset($_SESSION['token']);
      else :
        echo "<script>alert('Something went wrong. Please try again.');</script>";

      endif;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>techblog</title>

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

    <section class="section single-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="page-wrapper">


              <?php
              $pid = intval($_GET['nid']);
              $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <div class="blog-title-area text-center">
                  <ol class="breadcrumb hidden-xs-down">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a><?php echo htmlentities($row['category']); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo htmlentities($row['posttitle']); ?></li>
                  </ol>

                  <span class="color-orange"><a title=""><?php echo htmlentities($row['category']); ?></a></span>

                  <h3><?php echo htmlentities($row['posttitle']); ?></h3>

                  <div class="blog-meta big-meta">
                    <small><a title=""><?php echo htmlentities($row['postingdate']); ?></a></small>
                    <small><a title=""><i class="fa fa-eye"></i> 2344</a></small>
                  </div><!-- end meta -->

                  <div class="post-sharing">
                    <ul class="list-inline">
                      <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                      <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                      <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div><!-- end post-sharing -->
                </div><!-- end title -->

                <div class="single-post-media">
                  <img src="../admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="" class="img-fluid">
                </div><!-- end media -->

                <div class="blog-content">
                  <div class="pp">
                    <p><?php
                        $pt = $row['postdetails'];
                        echo (substr($pt, 0)); ?></p>

                  </div><!-- end pp -->
                </div><!-- end content -->

                <div class="blog-title-area">
                  <div class="post-sharing">
                    <ul class="list-inline">
                      <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                      <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                      <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div><!-- end post-sharing -->
                </div><!-- end title -->
              <?php } ?>
              <hr class="invis1">
              <hr class="invis1">
              <hr class="invis1">
              <div class="custombox clearfix">
                <h4 class="small-title">You may also like</h4>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="blog-box">
                      <div class="post-media">
                        <a href="readpost.php?nid=25" title="">
                          <img src="upload/linux2.jpg" alt="" class="img-fluid">
                          <div class="hovereffect">
                            <span class=""></span>
                          </div><!-- end hover -->
                        </a>
                      </div><!-- end media -->
                      <div class="blog-meta">
                        <h4><a href="readpost.php?nid=25" title="">What is Linux operating system?</a></h4>
                        <small><a href="techcategory.php" title="">Tech</a></small>
                        <small><a title="">21 July, 2023</a></small>
                      </div><!-- end meta -->
                    </div><!-- end blog-box -->
                  </div><!-- end col -->

                  <div class="col-lg-6">
                    <div class="blog-box">
                      <div class="post-media">
                        <a href="readpost.php?nid=33" title="">
                          <img src="upload/films1.jpg" alt="" class="img-fluid">
                          <div class="hovereffect">
                            <span class=""></span>
                          </div><!-- end hover -->
                        </a>
                      </div><!-- end media -->
                      <div class="blog-meta">
                        <h4><a href="readpost.php?nid=33" title="">The 5 best films of 2022</a></h4>
                        <small><a href="entairtainementcategory.php" title="">Entairtainement</a></small>
                        <small><a title="">20 July, 2023</a></small>
                      </div><!-- end meta -->
                    </div><!-- end blog-box -->
                  </div><!-- end col -->
                </div><!-- end row -->
              </div><!-- end custom-box -->

              <hr class="invis1">

              <div class="custombox clearfix">
                <h4 class="small-title">Comments</h4>
                <div class="row">
                  <div class="col-lg-12">
                    <?php
                    $sts = 1;
                    $query = mysqli_query($con, "select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                      <div class="comments-list">
                        <div class="media last-child">
                          <a class="media-left" href="#">
                            <img src="upload/iconcomment.png" alt="" class="rounded-circle">
                          </a>
                          <div class="media-body">

                            <h4 class="media-heading user_name"><?php echo htmlentities($row['name']); ?><small><?php echo htmlentities($row['postingDate']); ?> </small></h4>
                            <p><?php echo htmlentities($row['comment']); ?></p>
                          </div>
                        </div>
                      </div>
                    <?php } ?>

                  </div><!-- end col -->
                </div><!-- end row -->
              </div><!-- end custom-box -->


              <hr class="invis1">

              <div class="custombox clearfix">
                <h4 class="small-title">Leave a Reply</h4>
                <div class="row">
                  <div class="col-lg-12">
                    <form class="form-wrapper" name="Comment" method="Post">
                      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                      <input type="text" class="form-control" name="name" placeholder="Your name">
                      <input type="email" class="form-control" name="email" placeholder="Email address">
                      <textarea class="form-control" name="comment" placeholder="Your comment" required></textarea>
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div><!-- end page-wrapper -->
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
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/tether.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>