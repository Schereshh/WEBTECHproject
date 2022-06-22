<!DOCTYPE html>
<html lang="en">
    <?php require APPROOT . '/views/includes/head.php'; ?>
<body>
    <div class="nav-bar">
        <?php require APPROOT . '/views/layouts/navigation.php' ?>
    </div>

    <div class="containerbackup center">
        <h1>
            Update post
        </h1>

        <form action="<?= URLROOT ?>/posts/update/<?= $data['post']->id ?>" method="POST">
            <div class="form-item">
                <input 
                type="text" 
                name="title" 
                value="<?= $data['post']->title ?>">
                <br>
                <span class="invalidFeedback">
                    <?= $data['titleError'] ?>
                </span>
            </div>

            <div class="form-item">
                <textarea name="body" placeholder="Enter your post..."><?= $data['post']->body ?>
                </textarea>

                <span class="invalidFeedback">
                    <?= $data['bodyError'] ?>
                </span>
            </div>

            <button class="btn btn-success" name="submit" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>