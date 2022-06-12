<!DOCTYPE html>
<html lang="en">
    <?php require_once APPROOT . "/views/includes/head.php" ?>
<body>
    <div class="nav-bar">
        <?php require_once APPROOT . '/views/layouts/navigation.php' ?>
    </div>
    <div class="conatiner-login">
        <div class="wrapper-login">
            <h2>
                Sign in 
            </h2>
            <form action="<?= URLROOT ?>/users/login" method="POST">
                <input type="text" placeholder="Username *" name="username">
                <span class="invalidFeedback">
                    <?= $data['usernameError'] ?>
                </span>

                <input type="password" placeholder="Password *" name="password">
                <span class="invalidFeedback">
                    <?= $data['passwordError'] ?>
                </span>

                <button type="submit" id="submit" value="submit">Submit</button>

                <p class="options">
                    Not registered yet? 
                    <a href="<?= URLROOT ?>/users/register">Create an account!</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>