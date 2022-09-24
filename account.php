<?php
session_start();
require("PHP_modules/conn.php");
if (!isset($_SESSION["isLoggedIn"]) && !isset($_SESSION["adminLoggedIn"])) {
    Header("Location:login.php");
}

    if(isset($_POST['save-sub'])){
        $sql = "UPDATE user SET First_Name='".$_POST['firstName']."',Last_Name='".$_POST['lastName']."',Email='".$_POST['email']."',Mobile_Number='".$_POST['mobile']."' WHERE User_ID=". $_SESSION['userID'];
        $mysqli->query($sql);
    }

?>
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

    <!-- Account Css -->
    <link rel="stylesheet" href="CSS/account.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<body>
    <!-- Font Awesome CDN -->
    <!-- <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script> -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <?php 
        $sql = "SELECT * FROM user WHERE User_ID=" . $_SESSION['userID'];
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
    ?>

    <!-- Account content -->
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-cEnter text-cEnter p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold"><?php echo $row['First_Name'] ?></span>
                    <span class="text-black-50"><?php echo $row['Email'] ?></span>
                    <a href="booking-list.php" style="text-decoration:none;" class="d-flex justify-content-between w-50 align-items-center pt-2">
                        <span>Booking List</span>
                        <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-cEnter mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="account.php" method="POST">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input required name="firstName" type="text" class="form-control" placeholder="first name" value="<?php echo $row['First_Name'] ?>"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input required type="text" name="lastName" class="form-control" value="<?php echo $row['Last_Name'] ?>" placeholder="surname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input required type="tel" class="form-control" pattern="01[0-9][0-9]{9}" name="mobile" value="<?php echo $row['Mobile_Number'] ?>"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input required type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $row['Email'] ?>"></div>
                    </div>
                    <div class="mt-5 text-cEnter"><input class="btn btn-primary profile-button" type="submit" name="save-sub" value="Save"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Page Heading -->








    <!-- event JS import -->
    <script src="JS/event.js"></script>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>