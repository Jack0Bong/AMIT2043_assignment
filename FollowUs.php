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

    <!-- Follow Us Css -->
    <link rel="stylesheet" href="CSS/FollowUs.css">

</head>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>
    <h3>
        <div class="socialmedia">

            <div class="button">
                <div class="icon">
                <div class="text">Facebook</div>    
                    <span> <i class="fab fa-facebook-f"></i></span>
                </div>
            </div>

            <div class="button">
                <div class="icon">
                <div class="text">Twitter</div>  
                    <span> <i class="fab fa-twitter"></i></span>
                </div>
            </div>

            <div class="button">
                <div class="icon">
                <div class="text">Google</div> 
                    <span> <i class="fab fa-google"></i></span>
                </div>
            </div>

            <div class="button">
                <div class="icon">
                <div class="text">Instagram</div>  
                    <span><i class="fab fa-instagram"></i></span>
                </div>
            </div>

            <div class="button">
                <div class="icon">
                <div class="text">Linkedin</div> 
                    <span><i class="fab fa-linkedin"></i></span>
                </div>
            </div>

            <div class="button">
                <div class="icon">
                <div class="text"> GitHub</div>
                    <span> <i class="fab fa-github"></i></span>
                </div>
            </div>
    </h3>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>