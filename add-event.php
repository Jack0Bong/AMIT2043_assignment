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

    <div id="event-form" style="padding-bottom:150px">
      <div class="form-outline mb-4 text-black">
        <label class="form-label " for="eventName">Event Thumbnail</label>
        <br>
        <img class="m-auto d-block" src="assets/no-img.png" alt="" id="preview-img" style="width: 30vw;max-width:300px">
        <br>
        
        <input type="file" class="form-control-file" accept="image/gif, image/jpeg, image/png" onchange="previewImg(event)">
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label " for="eventName">Event Name</label>
        <input type="email" id="eventName" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label " for="eventName">Event Description</label>
        <br>
        <textarea name="" id="" cols="40" rows="10" class="form-control"></textarea>
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label" for="eventPassword">Date</label>
        <input type="date" id="eventPassword" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>
      
      <div class="form-outline mb-4 text-black">
        <label class="form-label" for="eventPassword">Price</label>
        <input type="number" min="1" step="any" class="form-control"/>
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label" for="eventPassword">Time</label>
        <input type="time" id="eventPassword" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <div class="form-outline mb-4 text-black">
        <label class="form-label" for="eventPassword">Location</label>
        <input type="text" id="eventPassword" class="form-control" />
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

    <script>
      function previewImg(event){
        let image = document.querySelector("#preview-img");
        image.src = URL.createObjectURL(event.target.files[0]);
      }
    </script>
</body>

</html>