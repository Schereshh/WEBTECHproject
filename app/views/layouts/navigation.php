<!-- <div class="header">
    <a href="<?= URLROOT ?>/pages/index" class="logo">Gallery</a>
    <div class="header-right">
        <a href="<?= URLROOT ?>/pages/index">Home</a>
        <a href="<?= URLROOT ?>/pages/about">About</a>
        <a href="<?= URLROOT ?>/posts/index">Blog</a>
        <?php if (isset($_SESSION['username'])) : ?>
            <a href="<?= URLROOT ?>/users/logout">Log out</a>
        <?php else : ?>
            <a href="<?= URLROOT ?>/users/login">Login</a>
        <?php endif; ?>
    </div>
</div> -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="<?= URLROOT ?>/posts/index">Gallery</a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/pages/about">About</a>
                </li>

            </ul>

            <?php if (isset($_SESSION['username'])) : ?>

                <div class="d-flex align-items-right">

                    <?php if (($_SERVER['REQUEST_URI'] == "/pictureUpload/WEBTECHproject/posts/index") && isLoggedIn()) : ?>

                        <a href="<?= URLROOT ?>/posts/create" class="btn-success btn">
                            Create
                        </a>

                    <?php endif; ?>

                    <a type="button" class="btn btn-link px-3 me-2" href="<?= URLROOT ?>/users/logout">
                        Logout
                    </a>
                </div>


            <?php else : ?>

                <div class="d-flex align-items-right">
                    <a type="button" class="btn btn-link px-3 me-2" href="<?= URLROOT ?>/users/login">
                        Login
                    </a>
                    <a type="button" class="btn btn-primary me-3" href="<?= URLROOT ?>/users/register">
                        Sign up
                    </a>
                </div>

            <?php endif; ?>


            <?php if ($_SERVER['REQUEST_URI'] == "/pictureUpload/WEBTECHproject/posts/index") : ?>

                <!-- Search -->
                <form class="w-auto">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search">
                </form>

            <?php endif; ?>

        </div>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->