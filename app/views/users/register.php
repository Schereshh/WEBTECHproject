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
                Sign up
            </h2>
            <form action="<?= URLROOT ?>/users/register" method="POST">
                <input type="text" placeholder="Username *" name="username">
                <span class="invalidFeedback">
                    <?= $data['usernameError'] ?>
                </span>

                <input type="email" placeholder="Email *" name="email">
                <span class="invalidFeedback">
                    <?= $data['emailError'] ?>
                </span>

                <input type="password" placeholder="Password *" name="password">
                <span class="invalidFeedback">
                    <?= $data['passwordError'] ?>
                </span>

                <input type="password" placeholder="Confirm Password *" name="confirmPassword">
                <span class="invalidFeedback">
                    <?= $data['confirmPasswordError'] ?>
                </span>

                <button type="submit"  value="submit" class="btn btn-primary btn-lg mx-auto col-6">Log in</button>
            </form>
        </div>
    </div>

    <?php require_once APPROOT . "/views/includes/MDB.php" ?>
</body>
</html>