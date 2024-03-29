<!DOCTYPE html>
<html lang="en">
    <?php require APPROOT . '/views/includes/head.php'; ?>
<body>
    <div class="nav-bar">
        <?php require APPROOT . '/views/layouts/navigation.php' ?>
    </div>

    <div class="containerbackup center">
        <h1>
            Create new post 
        </h1>

        <form action="<?= URLROOT ?>/posts/create" method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <input type="text" name="title" placeholder="Title">
                <br>
                <span class="invalidFeedback">
                    <?= $data['titleError'] ?>
                </span>
            </div>

            <div class="form-item">
                <textarea name="body" placeholder="Enter your post..."></textarea>
                <br>
                <span class="invalidFeedback">
                    <?= $data['bodyError'] ?>
                </span>
            </div>

            <div class="form-item">
                <input type="file" name="file" id="file">
                <br>
                <span class="invalidFeedback">
                    <?= $data['fileError'] ?>
                </span>
            </div>

            <button class="btn-lg btn-primary col-4" name="submit" type="submit">UPLOAD</button>
        </form>
    </div>
</body>
</html>