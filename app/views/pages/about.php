<!DOCTYPE html>
<html lang="en">
<?php require_once APPROOT . "/views/includes/head.php" ?>

<body>
    <?php require_once APPROOT . "/views/layouts/navigation.php" ?>


    <div class="container-about">
        <h1>Project description</h1>
        <div class="content-wrapper">

            <p>
                This project was made for a college assigment for web technologies
                class. Our task was to make a simple web application with the help of the MVC (model-view-controller) software design pattern.
                I choose to make a simple picture uploading site where users can share their pictures and such.
            </p>
            <hr>
            <p id="github-about">
                If you want to check out the project and see a more detailed documentation, check out the GitHub repo!
            </p>

            <a class="btn btn-primary" style="background-color: #707070;" href="https://github.com/Schereshh/WEBTECHproject" target="_blank" role="button">
                <i class="fab fa-github"></i>
            </a>

        </div>
    </div>

    <?php require APPROOT . "/views/includes/MDB.php" ?>

</body>

</html>