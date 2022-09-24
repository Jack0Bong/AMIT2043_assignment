<?php
session_start();
require("PHP_modules/conn.php");
if (!isset($_SESSION["adminLoggedIn"])) {
    Header("Location:login.php");
}
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
    <?php
        if (isset($_POST['del-sub'])) {
            $sql = "DELETE FROM booking WHERE Booking_ID=" . $_POST['bookingID'];
            $mysqli->query($sql);
            echo '<div class="container rounded" style="background-color:#CB1C1C;width:25vw"><h6 class="text-white" style="padding:5%">Deleted Booking ID ' . $_POST["bookingID"] . '  from the booking list</h6></div>';
        }

        $sql = "SELECT * FROM booking WHERE User_ID=" . $_GET['User_ID'];
        $result = $mysqli->query($sql);
    ?>

    <h1 class="text-center mt-5">User <?php echo $_GET['User_ID'] ?> Booking List</h1>
    <div class="booking-list container mb-5">
        <table class="table table" style="border:1px solid #f0f0f2">
            <tbody>
                <tr class="text-white" style="background-color: #47ad62;">
                    <th class="fw-bold">BOOKING ID</th>
                    <td class="fw-bold">EVENT NAME</td>
                    <td class="fw-bold">DATE</td>
                    <td class="fw-bold">TIME</td>
                    <td class="fw-bold">LOCATION</td>
                    <td class="fw-bold">PRICE</td>
                    <td class="fw-bold">ACTION</td>
                </tr>
                <?php
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = $result->fetch_assoc();
                    $sql = "SELECT * FROM event WHERE Event_ID=" . $row["Event_ID"];
                    $eventResult = $mysqli->query($sql);
                    $eventRow = $eventResult->fetch_assoc();
                    $date = strtotime($eventRow['Date'] . $eventRow['Time']);


                    echo ('<tr style="background-color:#f0f0f0;">
                    <td>' . $row['Booking_ID'] . '</td>
                    <td class="fw-semibold text-danger">' . $eventRow['Event_Name'] . '</td>
                    <td class="fw-light">' . date("d M", $date) . '</td>
                    <td class="fw-light">' . date("h:i A", $date) . '</td>
                    <td class="fw-light">' . $eventRow['Location'] . '</td>
                    <td class="text-success">RM' . number_format((float)$eventRow['Price'], 2, '.', '') . '</td>
                    <form action="user-booking-list.php?User_ID=' . $_GET["User_ID"] . '" method="POST">
                    <td><input type="submit" name="del-sub" value="DELETE" class="btn btn-danger w-75"></td>
                    <input type="text" name="bookingID" value="' . $row['Booking_ID'] . '" style="display:none">
                    </form>
                </tr>');
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