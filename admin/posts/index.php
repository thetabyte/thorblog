<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); ?>
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
        

        <title>Admin-BifrostDaily | Manage Posts</title>
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

                    <h2 class="page-title">Manage Posts</h2>
                    <?php include(ROOT_PATH . "/app/includes/msg.php"); ?>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>

                            <?php foreach ($posts as $key => $post) { ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $post['title'] ?></td>
                                    <td>Master Chief</td>
                                    <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                                    <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>

                                    <?php if ($post['published']): ?>                                        
                                        <td><a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">unpublish</a></td>
                                    <?php else: ?>
                                        <td><a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">publish</a></td>
                                    <?php endif; ?>
                                    
                                </tr>
                            <?php } ?>
                        
                        </tbody>
                    </table>
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