<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" class="w-100 h-100">
            <a href="index.php"> <img src="assets/tarc_logo.png" alt="" class="img-fluid" style="object-fit:cover; margin-right:30px;" width="30" height="30"></a>
            <h3 class="pe-2">Music Society</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="font-family: 'Roboto', sans-serif;font-weight:700;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="event.php" style="font-family: 'Roboto', sans-serif;font-weight:700;">Events</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php" style="font-family: 'Roboto', sans-serif;font-weight:700;">Contact Us</a>
                </li>
                <?php
                if(isset($_SESSION["adminLoggedIn"])){
                echo '<li class="nav-item">
                    <a class="nav-link" href="admin-page.php" style="font-family: '.'Roboto'.', sans-serif;font-weight:700;">Admin Page</a>
                </li>';
                }
                ?>

            </ul>

            <div class="mr-auto">
                <?php
                if (isset($_SESSION["isLoggedIn"]) || isset($_SESSION["adminLoggedIn"])) {
                    echo '<a class="btn btn-outline-dark me-2" href="account.php">Account</a>';
                    echo '<a class="btn btn-outline-dark " href="PHP_Modules/logout.php">Logout</a>';
                } else {
                    echo '<a class="btn btn-outline-dark " href="login.php">Login</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>