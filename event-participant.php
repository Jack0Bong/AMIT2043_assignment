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

    <h1 class="text-center mt-5">SPD GAR Participant List</h1>
    <div class="booking-list container mb-5">
        <table class="table table" style="border:1px solid #f0f0f2">
            <div class="d-flex" style="width:40%;">
                <input type="text ps-5 pe-5" style="width:100%;border:none;font-family: 'Roboto';font-weight: 600;" placeholder='Search for keywords'></input>
            </div>
            <tbody>
            <tr class="text-white" style="background-color: #ff3dc5;">
                    <th class="fw-bold">USER ID</th>
                    <td class="fw-bold">USERNAME</td>
                    <td class="fw-bold">MOBILE NUMBER</td>
                    <td class="fw-bold">EMAIL</td>
                    <td class="fw-bold">ACTION</td>
                </tr>
                <tr style="background-color:#f0f0f0;">
                    <td>U001</td>
                    <td class="fw-semibold text-danger">Roel Ascart</td>
                    <td class="fw-light">012-3456789</td>
                    <td class="fw-light">roel@gmail.com</td>
                    <td><a href="user-booking-list.php?id=U001"><button class="btn btn-danger w-75">REMOVE</button></a></td>
                </tr>
                <tr style="background-color:#f0f0f0;">
                    <td>U001</td>
                    <td class="fw-semibold text-danger">Roel Ascart</td>
                    <td class="fw-light">012-3456789</td>
                    <td class="fw-light">roel@gmail.com</td>
                    <td><a href="user-booking-list.php?id=U001"><button class="btn btn-danger w-75">REMOVE</button></a></td>
                </tr>
                <tr style="background-color:#f0f0f0;">
                    <td>U001</td>
                    <td class="fw-semibold text-danger">Roel Ascart</td>
                    <td class="fw-light">012-3456789</td>
                    <td class="fw-light">roel@gmail.com</td>
                    <td><a href="user-booking-list.php?id=U001"><button class="btn btn-danger w-75">REMOVE</button></a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>