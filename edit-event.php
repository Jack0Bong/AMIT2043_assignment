<?php
session_start();
require("PHP_modules/conn.php");
if (!isset($_SESSION["adminLoggedIn"])) {
    Header("Location:login.php");
}


if (isset($_POST['change-sub'])) {
    if(empty($_POST['eventName'])){
        $nameErr = "Event name can't be empty";
    }

    if(empty($_POST['eventDesc'])){
        $descErr = "Event Description can't be empty";
    }
    if(empty($_POST['eventDate'])){
        $dateErr = "Date can't be empty";
    }
    if(empty($_POST['eventTime'])){
        $timeErr = "Time can't be empty";
    }
    if(empty($_POST['eventLocation'])){
        $locationErr = "Location can't be empty";
    }
    if(empty($_POST['eventPrice'])){
        $priceErr = "Price can't be empty";
    }else if($_POST['eventPrice'] < 0){
        $priceErr = "Price can't be lesser than 0";
    }
    if(empty($_POST['eventSeat'])){
        $seatErr = "Seat number can't be empty";
    }else if($_POST['eventSeat'] < 0){
        $seatErr = "Seat number can't be lesser than 0";
    }


    if(!empty($_FILES["imgFile"]["name"])){
        $imgData = addslashes(file_get_contents($_FILES['imgFile']['tmp_name']));
        $sql = "UPDATE event SET Event_Name='". $_POST['eventName'] ."',Event_Image='". $imgData ."',Event_Desc='". $_POST['eventDesc'] ."',Date='". $_POST['eventDate'] ."',Time='". $_POST['eventTime'] ."',Location='". $_POST['eventLocation'] ."',Price='". $_POST['eventPrice'] ."',Seat='". $_POST['eventSeat'] ."' WHERE Event_ID = " . $_GET['Event_ID'];
        $mysqli->query($sql);
    }else{
        $sql = "UPDATE event SET Event_Name='". $_POST['eventName'] ."',Event_Desc='". $_POST['eventDesc'] ."',Date='". $_POST['eventDate'] ."',Time='". $_POST['eventTime'] ."',Location='". $_POST['eventLocation'] ."',Price='". $_POST['eventPrice'] ."',Seat='". $_POST['eventSeat'] ."' WHERE Event_ID = " . $_GET['Event_ID'];
        $mysqli->query($sql);
    }
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

    <!-- Color Calendar CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar@1.0.5/dist/css/theme-basic.css" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php
$sql = "SELECT * FROM event WHERE Event_ID=" . $_GET['Event_ID'];
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
?>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <form action="edit-event.php?Event_ID=<?php echo $_GET['Event_ID'] ?>" method="POST" enctype="multipart/form-data">
        <div class="container mt-5 mb-5">
            <h1 class="text-center mb-5">Edit Event</h1>
            <div class="d-flex justify-content-center">
                <div class="form-outline mb-4 text-black">
                    <label class="form-label " for="eventName">Event Thumbnail</label>
                    <br>
                    <img class="m-auto d-block" src="data:image/jpeg;base64,<?php echo base64_encode($row['Event_Image']) ?>" alt="" id="preview-img" style="width: 30vw;max-width:300px">
                    <br>
                    <input type="file" name="imgFile" class="form-control-file" accept="image/gif, image/jpeg, image/png" onchange="previewImg(event)">
                </div>
                <div id="event-form" class="ms-5" style="padding-bottom:150px">
                    <div class="form-outline mb-4 text-black">
                        <label class="form-label" for="eventName">Event Name</label>
                        <input type="text" name="eventName" class="form-control" value="<?php echo $row['Event_Name'] ?>" />
                        <p style="color:red"><?php echo isset($nameErr) ? ($nameErr): "" ?></p>
                    </div>

                    <div class="form-outline mb-4 text-black">
                        <label class="form-label" for="eventName">Event Description</label>
                        <br>
                        <textarea name="eventDesc" id="" cols="40" rows="10" class="form-control"><?php echo $row['Event_Desc'] ?></textarea>
                        <p style="color:red"><?php echo isset($descErr) ? ($descErr): "" ?></p>
                    </div>

                    <div class="form-outline mb-4 text-black">
                        <label class="form-label">Date</label>
                        <input name="eventDate" type="date" class="form-control" value="<?php echo $row['Date'] ?>" />
                        <p style="color:red"><?php echo isset($dateErr) ? ($dateErr): "" ?></p>
                    </div>

                    <div class="form-outline mb-4 text-black">
                        <label class="form-label">Price</label>
                        <input name="eventPrice" type="number" step="any" class="form-control" value="<?php echo $row['Price'] ?>" />
                        <p style="color:red"><?php echo isset($priceErr) ? ($priceEr): "" ?></p>
                    </div>

                    <div class="form-outline mb-4 text-black">
                        <label class="form-label">Time</label>
                        <input name="eventTime" type="time" class="form-control" value="<?php echo $row['Time'] ?>" />
                        <p style="color:red"><?php echo isset($timeErr) ? ($timeErr): "" ?></p>
                    </div>

                    <div class="form-outline mb-4 text-black">
                        <label class="form-label">Location</label>
                        <input name="eventLocation" type="text" class="form-control" value="<?php echo $row['Location'] ?>" />
                        <p style="color:red"><?php echo isset($locationErr) ? ($locatio): "" ?></p>
                    </div>

                    <div class="form-outline mb-4 text-black">
                        <label class="form-label">Seat</label>
                        <input name="eventSeat" type="number" class="form-control" value="<?php echo $row['Seat'] ?>" />
                        <p style="color:red"><?php echo isset($seatErr) ? ($seatErr): "" ?></p>
                    </div>

                    <!-- 2 column grid layout -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                        </div>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" class="btn btn-success btn-block d-block m-auto" value="Save Changes" name="change-sub">
                </div>
            </div>
        </div>
    </form>

    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function previewImg(event) {
            let image = document.querySelector("#preview-img");
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>