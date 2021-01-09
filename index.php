<?php 
include("path.php"); 
include(ROOT_PATH . "/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if (isset($_GET['top_id'])) {
    $posts = getPostTopicId($_GET['top_id']);
    $postsTitle = "Showing search results for posts under '" . $_GET['name'] . "'";
}else if (isset($_POST['search-term'])) {
    $postsTitle = "Showing search results for '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
} else {
    $posts = getPublishedPosts();//selectAll('posts', ['published' => 1]); || NoteTS: because i published "ie; bool -> 1" only 1 post at creation it only dipslayed that even though i had other posts in the database    
}

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

                    <?php foreach ($posts as $post) { ?>
                        <div class="post">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                            <div class="post-info">
                                <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                                <i class="fa fa-user"> <?php echo $post['username']; ?></i>
                                &nbsp;
                                <i class="fa fa-calendar"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>


            <!--/carousel-->

            <!--main content for site-->

            <div class="content clearfix">

                <!--main content-->

                <div class="main-content">
                    <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

                    <?php foreach ($posts as $post) { ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                            <div class="post-preview">
                                <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                                <i class="fa fa-user"> <?php echo $post['username']; ?></i>
                                &nbsp;
                                <i class="fa fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i></i>
                                <p class="preview-text">
                                    <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                                </p>
                                <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                            </div>
                        </div>
                    <?php } ?>

                </div>

                <!--/maincontent-->

                <div class="sidebar">

                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="index.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search...">
                        </form>
                    </div>

                    <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            <?php foreach ($topics as $key => $topic) { ?>
                                <li><a href="<?php echo BASE_URL . '/index.php?top_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
                            <?php } ?>
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