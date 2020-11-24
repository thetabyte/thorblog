<?php 
include('path.php'); 
include(ROOT_PATH . "/app/database/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://use.fontawesome.com/1f736332cf.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital@1&family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/style.css">
    

    <title>BifrostDaily</title>
</head>
<body>
    
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/msg.php"); ?>



    <!--Page wrapper-container surrounding website content-->

    <div class="page-wrapper">

        <!--carousel/post-slider-->
        <div class="post-slider">
            <h1 class="slider-title">Trending</h1>
            <i class="fa fa-chevron-left prev"></i>
            <i class="fa fa-chevron-right next"></i>
            
            <div class="post-wrapper">
                <div class="post">
                    <img src="assets/images/bdblog.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Always keep moving forward</a></h4>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar">Sep 12, 2014</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/bdblog.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Always keep moving forward</a></h4>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar">Sep 12, 2014</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/bdblog.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Always keep moving forward</a></h4>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar">Sep 12, 2014</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/bdblog.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Always keep moving forward</a></h4>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar">Sep 12, 2014</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/images/bdblog.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Always keep moving forward</a></h4>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar">Sep 12, 2014</i>
                    </div>
                </div>

            </div>
        </div>


        <!--/carousel-->

        <!--main content for site-->

        <div class="content clearfix">

            <!--main content-->

            <div class="main-content">
                <h1 class="recent-post-title">Recent Posts</h1>
                <div class="post clearfix">
                    <img src="assets/images/bdblog.jpg" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="single.html">Any given Monday</a></h2>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar"> Jan 22, 2017</i>
                        <p class="preview-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Voluptas, dolores consectetur nemo eaque commodi alias.
                        </p>
                        <a href="single.html" class="btn read-more">Read More</a>
                    </div>
                </div>
                <div class="post clearfix">
                    <img src="assets/images/bdblog2.jpg" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="single.html">Coffee-Commuting kinda morning</a></h2>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar"> Jan 22, 2017</i>
                        <p class="preview-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Voluptas, dolores consectetur nemo eaque commodi alias.
                        </p>
                        <a href="single.html" class="btn read-more">Read More</a>
                    </div>
                </div>
                <div class="post clearfix">
                    <img src="assets/images/bdblog3.jpg" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="single.html">All work and more work</a></h2>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar"> Jan 22, 2017</i>
                        <p class="preview-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Voluptas, dolores consectetur nemo eaque commodi alias.
                        </p>
                        <a href="single.html" class="btn read-more">Read More</a>
                    </div>
                </div>
                <div class="post clearfix">
                    <img src="assets/images/bdragnarok.jpg" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="single.html">The mystic of Ragnarok</a></h2>
                        <i class="fa fa-user"> Ilsa Faust</i>
                        &nbsp;
                        <i class="fa fa-calendar"> Jan 22, 2017</i>
                        <p class="preview-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Voluptas, dolores consectetur nemo eaque commodi alias.
                        </p>
                        <a href="single.html" class="btn read-more">Read More</a>
                    </div>
                </div>
            </div>

            <!--/maincontent-->

            <div class="sidebar">

                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="blog.html" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search...">
                    </form>
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <li><a href="#">Poems</a></li>
                        <li><a href="#">Quotes</a></li>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Biography</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Life Lessons</a></li>
                    </ul>
                </div>

            </div>

        </div>

        <!--/content-->


    </div>

    <!--/container-->

    <!--Footer-->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

    <!--JQUERY-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!--script-->
    <script src="assets/js/script.js"></script>

</body>
</html>