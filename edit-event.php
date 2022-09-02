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
                <div>
                <label for="">Event Name</label>
                <br>
                <input type="text" placeholder="Event Name" value="SPD GAR MUSIC EVENT">
                </div>
                <div>
                <label for="">Date</label>
                <br>
                <input type="date" name="" id="">
                </div>
                <div>
                <label for="">Price</label>
                <br>
                <input type="text" name="" id="" value="12.00">
                </div>
                <div>
                <label for="">Location</label>
                <br>
                <input type="text" placeholder="Event Name" value="Setapak">
                </div>

                <button class="btn btn-success mt-3">Save Changes</button>
            </div>
        </div>
    </div>


    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>