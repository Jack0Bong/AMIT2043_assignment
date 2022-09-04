<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="CSS/main.css">

    <!-- Fonts CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <div class="container">
        <h1 class="text-center">Welcome, Admin</h1>
    <div class="row">
        <a href="user-list.php" style="width:50%;text-decoration:none">
        <div class="col m-4 rounded d-flex justify-content-center align-items-center text-white admin-options" style="border:1px solid #3b7bd4;height:20vh;max-height:230px;min-height:180px;background-color:#3b7bd4">
            <h1>Manage user bookings</h1>
        </div>
        </a>
        <a href="manage-event.php" style="width:50%;text-decoration:none">
        <div class="col m-4 rounded d-flex justify-content-center align-items-center text-white admin-options" style="border:1px solid #3b7bd4;height:20vh;max-height:230px;min-height:180px;background-color:#3b7bd4">
            <h1>Manage events</h1>
        </div>
        </a>
    </div>
    <div class="row">
    <a href="add-event.php" style="width:50%;text-decoration:none">
        <div class="col m-4 rounded d-flex justify-content-center align-items-center text-white admin-options" style="border:1px solid #3b7bd4;height:20vh;max-height:230px;min-height:180px;background-color:#3b7bd4">
            <h1>Add new event</h1>
        </div>
        </a>
        <a style="width:50%;text-decoration:none">
        <div class="col m-4"></div>
        </a>
    </div>
    </div>

<!-- Footer import -->
<?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>