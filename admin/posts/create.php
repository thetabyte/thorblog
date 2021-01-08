<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://use.fontawesome.com/1f736332cf.js"></script>
        
        <link href="https://fonts.googleapis.com/css2?family=Karla:ital@1&family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="../../assets/css/style.css">

        <!--Admin CSS-->
        <link rel="stylesheet" href="../../assets/css/admin.css">
        

        <title>Admin-BifrostDaily | Add Post</title>
    </head>
    <body>
        <?php include(ROOT_PATH . '/app/includes/adminHeader.php'); ?>

        <!--Admin page wrapper-->
        <div class="admin-wrapper">

            <?php include(ROOT_PATH . '/app/includes/adminSidebar.php'); ?>

            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Add Post</a>
                    <a href="index.php" class="btn btn-big">Manage Posts</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Add Post</h2>

                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="body" id="body"><?php echo $body ?></textarea>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Topic</label>
                            <select name="topic_id" class="text-input">
                                <option value=""></option>

                                <?php foreach ($topics as $key => $topic) { ?>  <!--obsv: braces stands in for endforeach and semicolon after topic, for some reason, stops code from executing next line to show all topics from DB-->
                                    
                                    <?php if (!empty($topic_id) && $topic_id == $topic['id']): ?> <!--exclamation mark ensures topics persist after validation check-->
                                        <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>                                    
                                    <?php else: ?>
                                        <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>                                        
                                    <?php endif; ?>
                                                       
                                <?php } ?>

                            </select>
                        </div>
                        <div>
                            <?php if (empty($published)): ?>
                                <label >
                                    <input type="checkbox" name="published">
                                    Publish
                                </label>
                                
                            <?php else: ?>
                                <input type="checkbox" name="published" checked>
                                Publish    
                            <?php endif; ?>

                        </div>
                        <div>
                            <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
        <!--/wrapper-->


        <!--JQUERY-->
        <script 
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <!--ckeditor-->
        <script 
            src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>    
        <!--script-->
        <script src="../../assets/js/script.js"></script>



    </body>
</html>