<!DOCTYPE html>
<html lang="en">
<?php require APPROOT . '/views/includes/head.php' ?>

<body>
    <div class="nav-bar">
        <?php require APPROOT . '/views/layouts/navigation.php' ?>
    </div>
    <div class="container">
        <?php if (isLoggedIn()) : ?>
            <a href="<?= URLROOT ?>/posts/create" class="btn green">
                Create
            </a>
        <?php endif; ?>

        <?php foreach ($data['posts'] as $post) : ?>
            <div class="container-item">
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id) :  ?>
                    <a href="<?= URLROOT . '/posts/update/' . $post->id ?>" class="btn orange">
                        Update
                    </a>

                    <a 
                    href="<?= URLROOT . '/posts/delete/' . $post->id ?>"
                    class="btn red"
                    >
                        Delete
                    </a>
                <?php endif; ?>
                <h2>
                    <?= $post->title ?>
                </h2>

                <h3>
                    <?= 'Created on: ' . date('F j h:m', strtotime($post->created_at)) ?>
                </h3>

                <p>
                    <?= $post->body ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>