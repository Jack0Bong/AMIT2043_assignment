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
    <h1 class="text-center mt-5">Add New Events</h1>
    <div class="pt-5">
  <div class="container" style="width:30vw;min-width:350px;">

    <div id="login-form" style="padding-bottom:150px">
      <div class="form-outline mb-4 text-black">
        <label class="form-label " for="loginName">Event Name</label>
        <input type="email" id="loginName" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label" for="loginPassword">Date</label>
        <input type="date" id="loginPassword" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label" for="loginPassword">Price</label>
        <input type="text" id="loginPassword" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label" for="loginPassword">Location</label>
        <input type="text" id="loginPassword" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-success btn-block d-block m-auto">Add Event</button>
    </div>
</div>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>