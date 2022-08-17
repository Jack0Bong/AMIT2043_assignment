<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Fonts CDN -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="CSS/main.css">
</head>

<body>
  <!-- Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
  <?php require("PHP_modules/Navigation.php") ?>

<div class="pt-5" style="background-image: url(assets/lantern.jpeg);background-attachment: fixed;background-size: 100% 100%; background-blend-mode:darken;background-color: #606061;">
  <div class="container" style="width:30vw;min-width:350px;">
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab-login" data-mdb-toggle="pill" role="tab" aria-controls="pills-login" aria-selected="true" onclick="loginForm()">Login</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-register" data-mdb-toggle="pill" role="tab" aria-controls="pills-register" aria-selected="false" onclick="registerForm()">Register</button>
      </li>
    </ul>
    <!-- Pills navs -->

    <div id="login-form" style="padding-bottom:150px">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="loginName">Email or username</label>
        <input type="email" id="loginName" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="loginPassword">Password</label>
        <input type="password" id="loginPassword" class="form-control" />
        <p style="color:red">Incorrect something something</p>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block d-block m-auto">Sign in</button>
    </div>

    <!-- REGISTER FORMS -->

    <div style="display:none;" id="register-form">
      <form class="pb-5">

        <!-- Name input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerName">Name</label>
          <input type="text" id="registerName" class="form-control" />
          <p style="color:red">Incorrect something something</p>
        </div>

        <!-- Username input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerUsername">Username</label>
          <input type="text" id="registerUsername" class="form-control" />
          <p style="color:red">Incorrect something something</p>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerEmail">Email</label>
          <input type="email" id="registerEmail" class="form-control" />
          <p style="color:red">Incorrect something something</p>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerPassword">Password</label>
          <input type="password" id="registerPassword" class="form-control" />
          <p style="color:red">Incorrect something something</p>
        </div>

        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerRepeatPassword">Repeat password</label>
          <input type="password" id="registerRepeatPassword" class="form-control" />
          <p style="color:red">Incorrect something something</p>
        </div>


        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block d-block m-auto">Sign up</button>
      </form>
    </div>
  </div>
  </div>

  <!-- Footer import -->
  <?php require("PHP_modules/footer.php") ?>
  <!-- Login JS -->
  <script src="JS/loginform.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>