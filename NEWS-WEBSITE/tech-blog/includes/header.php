<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="images/tech-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="techcategory.php">Tech</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sportscategory.php">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="entairtainementcategory.php">Entairtainement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="businesscategory.php">Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="healthcategory.php">Health</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="search-wrap">
                <form name="search" action="search.php" method="post">
                    <div class="search">
                        <input type="text" class="searchTerm" name="searchtitle" placeholder="Search">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->