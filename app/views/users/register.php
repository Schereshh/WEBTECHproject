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
                Register
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