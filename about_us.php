<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Main CSS import -->
    <link rel="stylesheet" href="CSS/main.css">

    <!-- Fonts CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

</head>

<body>
    
    <!-- Font Awesome CDN -->
    <!-- <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script> -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>


    <!-- Content -->
    <?php require("PHP_modules/about_us_content.php")?>


    <!-- About us Profiles -->
    <?php require("PHP_modules/about_us_profiles.php") ?>

    <!-- event JS import -->
    <script src="JS/event.js"></script>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>