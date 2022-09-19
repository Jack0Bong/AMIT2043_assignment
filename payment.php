<?php
require("PHP_modules/conn.php");
session_start();
?>

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

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <?php
    //sql for event listing
    $sql = "SELECT * FROM event WHERE Event_ID = '" . $_GET['Event_ID'] . "'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $date = strtotime($row['Date'] . $row['Time']);
    ?>

    <div class="container d-block justify-content-evenly w-75" style="border:1px solid black">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tr style="height: 100px;width:100%">
                    <td style="width: 20%;">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Event_Image']) ?>" style="object-fit:cover;width:70%">
                    </td>
                    <td>
                        <div class="mt-5">
                            <h3>SPD GAR</h3>
                            <p>test</p>
                        </div>
                    </td>
                    <td class="h-100">
                        <div class="input-group mt-5">
                            <button class="btn btn-outline-secondary" type="button">-</button>
                            <input type="number" name="" id="" style="width: 60px;">
                            <button class="btn btn-outline-secondary" type="button">+</button>
                        </div>
                    </td>
                    <td>
                        <div class="mt-5">
                        <span>
                            RM<?php echo $row['Price'] ?>
                        </span>
                        </div>
                    </td>
                </tr>

            </table>
        </div>


        <!-- <div class="inputs w-50 mt-3">
            <div class="d-flex justify-content-evenly">
                <div>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Credit Card</label>
                </div>
                <div>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">Student Card</label>
                </div>
            </div>
        </div> -->
    </div>

    </section>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>