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
</head>





<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <h1 class="text-center mt-5">Your Booking List</h1>
    <div class="booking-list container mb-5">
        <table class="table table" style="border:1px solid #f0f0f2">
            <tbody>
            <tr class="text-white" style="background-color: #14a1ff;">
                    <th class="fw-bold">BOOKING ID</th>
                    <td class="fw-bold">EVENT NAME</td>
                    <td class="fw-bold">DATE</td>
                    <td class="fw-bold">TIME</td>
                    <td class="fw-bold">LOCATION</td>
                    <td class="fw-bold">PRICE</td>
            </tr>

                <?php
                $sql = "SELECT * FROM Booking WHERE User_ID = " . $_SESSION["userID"];
                $result = $mysqli->query($sql);
                

                

                for ($i = 0;$row = $result->fetch_assoc(); $i++) {
                    $sql = "SELECT * FROM event WHERE Event_ID=".$row['Event_ID'];
                    $eventResult = $mysqli->query($sql);
                    $eventRow = $eventResult->fetch_assoc();
                    echo ('        
                        <tr style="background-color:#f0f0f0;">
                        <td>' . $row['Booking_ID'] . '</td>
                        <td class="fw-semibold text-danger">' . $eventRow['Event_Name'] . '</td>
                        <td class="fw-light">' . $eventRow['Date'] . '</td>
                        <td class="fw-light">' . $eventRow['Time'] . '</td>
                        <td class="fw-light">' . $eventRow['Location'] . '</td> 
                        <td class="fw-light">RM ' . number_format((float)$eventRow['Price'] * $row['Quantity'], 2, '.', '') . '</td>
                        </tr>
                    ');
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>