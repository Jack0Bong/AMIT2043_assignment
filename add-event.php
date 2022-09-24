<?php
session_start();
require("PHP_modules/conn.php");
if (!isset($_SESSION["adminLoggedIn"])) {
  Header("Location:login.php");
}

if (isset($_POST['add-sub'])) {
  $err = false;

  // Name check
  if (empty($_POST['eventName'])) {
    $nameErr = "Event name can't be empty";
    $err = true;
  }

  // Description Check
  if (empty($_POST['eventDesc'])) {
    $descErr = "Event Description can't be empty";
    $err = true;
  }

  // Date Check
  if (empty($_POST['eventDate'])) {
    $dateErr = "Date can't be empty";
    $err = true;
  } else {
    $date = strtotime($_POST['eventDate']);
    $currDate = date('Y-m-d');

    if (date('Y-m-d', $date) <= $currDate) {
      $dateErr = "Event date can't be before or on " . date('d-m-Y');;
      $err = true;
    }
  }

  // Time Check
  if (empty($_POST['eventTime'])) {
    $timeErr = "Time can't be empty";
    $err = true;
  }

  // Location Check
  if (empty($_POST['eventLocation'])) {
    $locationErr = "Location can't be empty";
    $err = true;
  }

  // Price check
  if (empty($_POST['eventPrice'])) {
    $priceErr = "Price can't be empty";
    $err = true;
  } else if ($_POST['eventPrice'] < 0) {
    $priceErr = "Price can't be lesser than 0";
    $err = true;
  }

  // Seat check
  if (empty($_POST['eventSeat'])) {
    $seatErr = "Seat number can't be empty";
    $err = true;
  } else if ($_POST['eventSeat'] < 0) {
    $seatErr = "Seat number can't be lesser than 0";
    $err = true;
    
  }

  // Img check
  if (empty($_FILES["imgFile"]["name"])) {
    $imgErr = "Thumbnail can't be empty";
    $err = true;
  }

  if ($err == false) {
    $imgData = addslashes(file_get_contents($_FILES['imgFile']['tmp_name']));
    $sql = "INSERT INTO event (Event_Name,Event_Image,Event_Desc,Date,Time,Location,Price,Seat) VALUES ('" . $_POST['eventName'] . "','" . $imgData . "','" . $_POST['eventDesc'] . "','" . $_POST['eventDate'] . "','" . $_POST['eventTime'] . "','" . $_POST['eventLocation'] . "'," . $_POST['eventPrice'] . "," . $_POST['eventSeat'] . ")";
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
  <form action="add-event.php" method="post" enctype="multipart/form-data">
    <h1 class="text-center mt-5">Add New Events</h1>
    <div class="pt-5">
      <div class="container" style="width:30vw;min-width:350px;">
        <?php
        if (isset($err)) {
          if ($err == false) {
            echo '<div class="container rounded" style="background-color:#099226;width:25vw"><h6 class="text-white" style="padding:5%">Event successfully Added</h6></div>';
          }else{
            echo '<div class="container rounded" style="background-color:#CD2727;width:25vw"><h6 class="text-white" style="padding:5%">Event unsuccessfully Added</h6></div>';
          }
        }
        ?>

        <div id="event-form" style="padding-bottom:150px">
          <div class="form-outline mb-4 text-black">
            <label class="form-label " for="eventName">Event Thumbnail</label>
            <br>
            <img class="m-auto d-block" src="assets/no-img.png" alt="" id="preview-img" style="width: 30vw;max-width:300px">
            <br>

            <input type="file" name="imgFile" class="form-control-file" accept="image/gif, image/jpeg, image/png" onchange="previewImg(event)">
            <p style="color:red"><?php echo isset($imgErr) ? ($imgErr) : "" ?></p>
          </div>

          <div class="form-outline mb-4 text-black">
            <label class="form-label " for="eventName">Event Name</label>
            <input name="eventName" type="text" id="eventName" class="form-control" />
            <p style="color:red"><?php echo isset($nameErr) ? ($nameErr) : "" ?></p>
          </div>

          <div class="form-outline mb-4 text-black">
            <label class="form-label " for="eventName">Event Description</label>
            <br>
            <textarea name="eventDesc" id="" cols="40" rows="10" class="form-control"></textarea>
            <p style="color:red"><?php echo isset($descErr) ? ($descErr) : "" ?></p>
          </div>

          <div class="form-outline mb-4 text-black">
            <label class="form-label">Date</label>
            <input name="eventDate" type="date" class="form-control" />
            <p style="color:red"><?php echo isset($dateErr) ? ($dateErr) : "" ?></p>
          </div>

          <div class="form-outline mb-4 text-black">
            <label class="form-label">Price</label>
            <input name="eventPrice" type="number" step="any" class="form-control" />
            <p style="color:red"><?php echo isset($priceErr) ? ($priceErr) : "" ?></p>
          </div>

          <div class="form-outline mb-4 text-black">
            <label class="form-label">Time</label>
            <input name="eventTime" type="time" class="form-control" />
            <p style="color:red"><?php echo isset($timeErr) ? ($timeErr) : "" ?></p>
          </div>

          <div class="form-outline mb-4 text-black">
            <label class="form-label">Location</label>
            <input name="eventLocation" type="text" class="form-control" />
            <p style="color:red"><?php echo isset($locationErr) ? ($locationErr) : "" ?></p>
          </div>

          <div class="form-outline mb-4 text-black">
            <label class="form-label">Seats</label>
            <input name="eventSeat" type="number" step="any" class="form-control" />
            <p style="color:red"><?php echo isset($seatErr) ? ($seatErr) : "" ?></p>
          </div>

          <!-- 2 column grid layout -->
          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
            </div>
          </div>

          <!-- Submit button -->
          <input type="submit" value="Add Event" name="add-sub" class="btn btn-success btn-block d-block m-auto">
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