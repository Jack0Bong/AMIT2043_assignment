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

<?php
$sql = "SELECT * FROM event";
$result = $mysqli->query($sql);
?>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->

    <?php require("PHP_modules/Navigation.php") ?>
    <h1 class="text-center mt-5">Manage Events</h1>
    <div class="booking-list container mb-5">
        <table class="table table" style="border:1px solid #f0f0f2">
            <tbody>
                <tr class="text-white" style="background-color: #47ad62;">
                    <th class="fw-bold">EVENT ID</th>
                    <td class="fw-bold">EVENT NAME</td>
                    <td class="fw-bold">DATE</td>
                    <td class="fw-bold">TIME</td>
                    <td class="fw-bold">LOCATION</td>
                    <td class="fw-bold">PRICE</td>
                    <td class="fw-bold">ACTION</td>
                    <td class="fw-bold">ACTION</td>
                    <td class="fw-bold">ACTION</td>
                </tr>
                <?php
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = $result->fetch_assoc();
                    $date = strtotime($row['Date'] . $row['Time']);
                    echo ('
                        <tr style="background-color:#f0f0f0;">
                            <td>' . $row['Event_ID'] . '</td>
                            <td class="fw-semibold text-danger">' . $row['Event_Name'] . '</td>
                            <td class="fw-light">' . date("d M", $date) . '</td>
                            <td class="fw-light">' . date("h:i A", $date) . '</td>
                            <td class="fw-light">' . $row['Location'] . '</td>
                            <td class="text-success">RM' . number_format((float)$row['Price'], 2, '.', '') . '</td>
                            <td><a href="event-participant.php?Event_ID=' . $row['Event_ID'] . '"><button class="btn btn-info text-white">VIEW PARTICIPANT</button></a></td>
                            <td><a href="edit-event.php?Event_ID=' . $row['Event_ID'] . '"><button class="btn btn-primary">EDIT</button></a></td>
                            <td><button class="btn btn-danger" onclick="delEvent('. '`' . $row['Event_Name'] .'`' .',`' . $row['Event_ID'] .'`' .')">DELETE</button></td>
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
    <script>
        function delEvent(eventName,eventID) {
            if (confirm("Are you sure you want to delete event '" + eventName + "'")) {
                window.location.href = "http://localhost/AMIT2043_assignment/delete-event.php?Event_ID=" + eventID;
            }
        }
    </script>
</body>

</html>