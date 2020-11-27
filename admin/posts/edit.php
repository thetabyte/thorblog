<?php include('../../path.php'); ?>
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
        

        <title>Admin-BifrostDaily | Edit Post</title>
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

                    <h2 class="page-title">Edit Posts</h2>

                    <form action="create.html" method="post">
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" class="text-input">
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="body" id="body"></textarea>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Topic</label>
                            <select name="topic" class="text-input">
                                <option value="Life Lessons">Life Lessons</option>
                                <option value="Memories">Memories</option>
                                <option value="Poetry">Poetry</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-big">Update</button>
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