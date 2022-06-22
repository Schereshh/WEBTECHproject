<!DOCTYPE html>
<html lang="en">
<?php require APPROOT . '/views/includes/head.php' ?>

<body>
    <div class="nav-bar">
        <?php require APPROOT . '/views/layouts/navigation.php' ?>
    </div>
    <div class="container">

        <?php foreach ($data['posts'] as $post) : ?>

            <div class="post-container rounded">

                <img src="<?= FILE_LOCATION ?>/<?= $post->file_name ?>" class="gallery_item" alt="<?= $post->title ?>">

                <div class="info-block">
                    
                    <div class="post-item-title">

                        <div class="title">
                            <?= $post->title ?>
                        </div>
                        

                        <div id="upload-date">
                            <?= $post->created_at ?>
                        </div>

                        <div id="created_by">
                            <?= $post->body ?>
                        </div>

                    </div>

                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id) :  ?>

                        <div class="options-icon">
                            <a href="<?= URLROOT . '/posts/update/' . $post->id ?>" class="btn orange">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= URLROOT . '/posts/delete/' . $post->id ?>" class="btn red">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>

                    <?php endif; ?>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <?php require APPROOT . "/views/includes/MDB.php" ?>

</body>

</html>