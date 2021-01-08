<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' =>1]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://use.fontawesome.com/1f736332cf.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital@1&family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/style.css">
    

    <title><?php echo $post['title']; ?> | BifrostDaily</title> <!--for seo-->
</head>
<body>
    
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!--Page wrapper-container surrounding website content-->
    <div class="page-wrapper">

        <!--main content for site-->

        <div class="content clearfix">

            <!--main content wrapper-->
            <div class="main-content-wrap">
                <div class="main-content single">
                    <h1 class="post-title"><?php echo $post['title'];?></h1>
                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']); ?>
                    </div>
                </div>
            </div>
            <!--/maincontent-->
            
            <!--Sidebar-->
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Popular</h2>
                    <?php foreach ($posts as $p) { ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
                            <a href="" class="title">
                                <h4><?php echo $p['title']; ?></h4>
                            </a>
                        </div>
                        
                    <?php } ?>

                    
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach ($topics as $topic) { ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?top_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
                        <?php } ?>
                        
                    </ul>
                </div>

            </div>
            <!--/sidebar-->

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