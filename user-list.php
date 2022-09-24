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
    if(isset($_POST['del-sub'])){
        $sql = "DELETE FROM booking WHERE User_ID=". $_GET['User_ID'];
        $mysqli->query($sql);
        $sql = "DELETE FROM user WHERE User_ID=". $_GET['User_ID'];
        $mysqli->query($sql);
        echo '<div class="container rounded" style="background-color:#CB1C1C;width:25vw"><h6 class="text-white" style="padding:5%">Deleted user ID '. $_POST["userID"] .'  
         the booking list</h6></div>';
    }

    $sql = "SELECT * FROM user";
    $result = $mysqli->query($sql);
    ?>

    <div class="booking-list container mb-5 mt-5">
        <table class="table table" style="border:1px solid #f0f0f2">
            <tbody>
                <tr class="text-white" style="background-color: #ff3dc5;">
                    <th class="fw-bold">USER ID</th>
                    <td class="fw-bold">First Name</td>
                    <td class="fw-bold">Last Name</td>
                    <td class="fw-bold">MOBILE NUMBER</td>
                    <td class="fw-bold">EMAIL</td>
                    <td class="fw-bold">ACTION</td>
                    <td class="fw-bold">ACTION</td>
                </tr>
                <?php
                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = $result->fetch_assoc();
                    echo ('<tr style="background-color:#f0f0f0;">
                        <td>' . $row['User_ID'] . '</td>
                        <td class="fw-semibold text-danger">' . $row['First_Name'] . '</td>
                        <td class="fw-semibold text-danger">' . $row['Last_Name'] . '</td>
                        <td class="fw-light">' . $row['Mobile_Number'] . '</td>
                        <td class="fw-light">' . $row['Email'] . '</td>
                        <form action="user-booking-list.php?User_ID=' . $row["User_ID"] . '" method="POST">
                        <td><input type="submit" value="View Booking" class="btn btn-primary w-75"></td>
                        <input type="text" name="userID" value="' . $row['User_ID'] . '" style="display:none">
                        </form>
                        <form action="user-list.php?User_ID=' . $row["User_ID"] . '" method="POST">
                        <td><input type="submit" name="del-sub" value="REMOVE" class="btn btn-danger w-75"></td>
                        <input type="text" name="userID" value="' . $row['User_ID'] . '" style="display:none">
                        </form>
                    </tr>');
                }
                ?>
            </tbody>
        </table>
    </div>
    </section>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>