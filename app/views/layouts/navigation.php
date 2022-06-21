<div class="header">
    <a href="<?= URLROOT ?>/pages/index" class="logo">Gallery</a>
    <div class="header-right">
        <a href="<?=URLROOT?>/pages/index">Home</a>
        <a href="<?=URLROOT?>/pages/about">About</a>
        <a href="<?=URLROOT?>/posts/index">Blog</a>
        <?php if(isset($_SESSION['username'])) : ?>
            <a href="<?=URLROOT?>/users/logout">Log out</a>
        <?php else : ?>
            <a href="<?=URLROOT?>/users/login">Login</a>
        <?php endif; ?>
    </div>
</div>