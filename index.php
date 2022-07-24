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
    <?php require ("PHP_modules/Navigation.php") ?>    


    <!-- Carousel -->
    <h1 class="text-center pt-3">Upcoming Popular Events</h1>
    <div class="container d-flex h-100 p-0 mb-5" style="width:90%;border:1px solid white;border-radius: 10px;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width:70%">
            <div class="carousel-inner" style="border-radius: 10px 0px 0px 10px;">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://pop.inquirer.net/files/2021/05/gigachad.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://i.ytimg.com/vi/Ux5cQbO_ybw/maxresdefault.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://pop.inquirer.net/files/2021/05/gigachad.jpg" alt="Third slide">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="infobox p-3 position-relative" style="width:30%;background-color:#F5F5F5;border-radius: 0px 10px 10px 0px;">
            <h6 style="color:#ff5d8f;">New Events</h6>
            <h1>Event 1 Here</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab voluptas cupiditate quibusdam expedita minima, earum exercitationem cumque nostrum quisquam rerum, voluptatibus nisi cum tenetur. At minus laudantium autem quas exercitationem.</p>
            <button type="button" class="btn btn-dark position-absolute" style="bottom:3%;">Find out More</button>
        </div>
    </div>
    </div>



    <h1 class="text-center">Recent Events</h1>
    <div class="container">
        <div class="row d-flex">
            <!-- Cards -->
            <div class="col pb-5">
            <div class="cards">
                <div class="card" style="width: 18rem;">
                    <img src="https://i.ytimg.com/vi/lQezinb283E/maxresdefault.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            </div>
            <!-- Cards -->
            <!-- Cards -->
            <div class="col pb-5">
            <div class="cards">
                <div class="card" style="width: 18rem;">
                    <img src="https://i.ytimg.com/vi/lQezinb283E/maxresdefault.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            </div>
            <!-- Cards -->
            <!-- Cards -->
            <div class="col pb-5">
            <div class="cards">
                <div class="card" style="width: 18rem;">
                    <img src="https://i.ytimg.com/vi/lQezinb283E/maxresdefault.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            </div>
            <!-- Cards -->
        </div>
    </div>


    
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>