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

    <!-- Color Calendar CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar@1.0.5/dist/css/theme-basic.css" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center">
            <img src="assets/event.jfif" alt="" srcset="" style="width: 30%;">
            <div class="ms-5" style="width: 35%;min-width:450px;max-width:650px">
                <h1>SPD GAR MUSIC EVENT</h1>
                <div class="w-100 d-flex justify-content-evenly mb-3" style="background-color: #cccccc;">
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                        <i class="fa-solid fa-calendar-days pb-2"></i>
                        <h4 class="text-center event-info-text">06</h4>
                        <h4 class="text-center event-info-text">June</h4>
                    </div>
                    <div class="vert-line"></div>
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                        <i class="fa-solid fa-clock pb-2"></i>
                        <h4 class="text-center event-info-text">10:00 AM - 12:00 AM</h4>
                    </div>
                    <div class="vert-line"></div>
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                        <i class="fa-solid fa-ticket pb-2"></i>
                        <h4 class="text-center event-info-text">FREE</h4>
                    </div>
                    <div class="vert-line"></div>
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                    <i class="fa-solid fa-location-dot pb-2"></i>
                        <h4 class="text-center event-info-text">Setapak</h4>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perspiciatis adipisci tempore similique dolores cum quod inventore voluptate ad ducimus, illum cumque aliquid nulla odio iste consectetur eaque sint culpa in tempora deserunt esse explicabo voluptates. Reiciendis obcaecati dolorum quas vitae at nemo, odio, a eveniet iste enim hic dolores.</p>
                <div class="d-flex justify-content-between pt-2">
                <button class="btn btn-success">Buy Ticket</button>
                <div class="d-flex align-items-center ps-2 pe-2 text-white" style="background-color: #3080ff;border-radius:15px"><i class="fa-solid fa-person pe-2"></i><span> 1000 People are going</span></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>