<?php 
  session_start();
  require("PHP_modules/conn.php");

  // LOGIN PROCESS
  if(isset($_POST["log-sub"])){

    //Login validation
    if(!empty($_POST["loginEmail"])){
      if(!empty($_POST["loginPassword"])){
        $sql = "SELECT * FROM user WHERE Email = '". $_POST['loginEmail'] ."' AND Password = '". $_POST['loginPassword'] ."'";
        $adminSql = "SELECT * FROM admin WHERE Email = '". $_POST['loginEmail'] ."' AND password = '". $_POST['loginPassword'] ."'";
        $result = $mysqli->query($sql);
        $adminResult = $mysqli->query($adminSql);

        if(mysqli_num_rows($result) != 0){
          $_SESSION["isLoggedIn"] = true;
          $row = $result->fetch_assoc();
          $_SESSION["userID"] = $row["User_ID"];
          echo "<script>alert('Login Successful!');</script>";
          Header("Location:index.php");
        }else if(mysqli_num_rows($adminResult) != 0){
          $_SESSION["adminLoggedIn"] = true;
          $row = $result->fetch_assoc();
          $_SESSION["adminID"] = $row["Admin_ID"];
          echo "<script>alert('Login Successful!');</script>";
          Header("Location:admin-page.php");
        }else{
          $loginEmailErr= "Incorrect email or password";
          $loginPasswordErr= "Incorrect email or password";
        }
      }else{
        $loginPasswordErr="Password can't be empty";
      }
    }else{
      $loginEmailErr="Email can't be empty.";
    }
    

  // REGISTER PROCESS
  }else if(isset($_POST["reg-sub"])){
    //first name validation
    if(!empty($_POST["firstName"])){
      $firstName = $_POST["firstName"];
    }else{
      $firstNameErr="First name can't be empty";
    }

    //last name validation
    if(!empty($_POST["lastName"])){
      $lastName = $_POST["lastName"];
    }else{
      $lastNameErr="Last name can't be empty";
    }

    //Email validation
    if(!empty($_POST["email"])){
      $sql = "SELECT * FROM user WHERE Email = '". $_POST["email"] ."'";
      $result = $mysqli->query($sql);
      if(mysqli_num_rows($result) > 0){
        $firstNameErr="Email already exist,try another.";
      }else{
        $email = $_POST["email"];
      }
    }else{
      $emailErr="Email can't be empty.";
    }

    //Phone validation
    if(!empty($_POST["mobile"])){
      $mobile = $_POST["mobile"];
    }else{
      $mobileErr="Mobile number can't be empty";
    }

    //Password validation
    if(!empty($_POST["password"])){
      if(!empty($_POST["confirm-password"])){
        if($_POST['password'] == $_POST['confirm-password']){
          $password = $_POST['password'];
        }else{
          $passwordErr="Password and confirm password does not match";
          $confirmPasswordErr="Password and confirm password does not match";
        }
      }else{
        $confirmPasswordErr="Please confirm your password";
      }
    }else{
      $passwordErr="Password can't be empty";
    }

    if(isset($firstName) && isset($lastName) && isset($email) && isset($mobile) && isset($password)){
      $sql = "INSERT INTO user (First_Name,Last_Name,Email,Mobile_Number,Password) VALUES ('". $firstName."','". $lastName."','". $email."','". $mobile."','". $password."')";
      $mysqli->query($sql);
      
      echo "<script>alert('Register Successful!');</script>";
    }else{
      echo "<script>alert('Register Unsuccessful!');let unsuccess = true;</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

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


    <!-- LOGIN FORM -->
    <form action="login.php" method="POST" class="mb-0">
    <div id="login-form" style="padding-bottom:150px">
      <!-- Email input -->
      <div class="form-outline mb-4 text-white">
        <label class="form-label" for="loginEmail">Email</label>
        <input type="email" name="loginEmail" id="loginName" class="form-control" />
        <p style="color:red"><?php echo isset($loginEmailErr) ? $loginEmailErr : "" ?></p>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4 text-white">
        <label class="form-label" for="loginPassword">Password</label>
        <input type="password" name="loginPassword" id="loginPassword" class="form-control" />
        <p style="color:red"><?php echo isset($loginPasswordErr) ? $loginEmailErr : "" ?></p>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
        </div>
      </div>

      <!-- Submit button -->
      <input type="submit" name="log-sub" class="btn btn-primary btn-block d-block m-auto" value="Sign in">
    </div>
    </form>


    <!-- REGISTER FORMS -->
    <div style="display:none;" id="register-form">
      <form action="login.php" method="POST" class="pb-5 mb-0 text-white">

        <!-- First Name input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerName">First Name</label>
          <input type="text" id="registerName" class="form-control" name="firstName"/>
          
          <p style="color:red"><?php echo isset($firstNameErr) ? $firstNameErr : "" ?></p>
        </div>

        <!-- Last Name input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerUsername">Last Name</label>
          <input type="text" id="registerUsername" class="form-control" name="lastName"/>
          <p style="color:red"><?php echo isset($lastNameErr) ? $lastNameErr : "" ?></p>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerEmail">Email</label>
          <input type="email" id="registerEmail" class="form-control" name="email"/>
          <p style="color:red"><?php echo isset($emailErr) ? $emailErr  : "" ?></p>
        </div>

        <!-- Mobile input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerEmail">Phone Number</label>
          <input type="tel" class="form-control" pattern="01[0-9][0-9]{9}" name="mobile"/>
          <p style="color:red"><?php echo isset($mobileErr) ? $mobileErr : "" ?></p>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerPassword">Password</label>
          <input type="password" id="registerPassword" class="form-control" name="password"/>
          <p style="color:red"><?php echo isset($passwordErr) ? $passwordErr : "" ?></p>
        </div>

        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerRepeatPassword">Repeat password</label>
          <input type="password" id="registerRepeatPassword" class="form-control" name="confirm-password"/>
          <p style="color:red"><?php echo isset($confirmPasswordErr) ? $confirmPasswordErr : "" ?></p>
        </div>


        <!-- Submit button -->
        <input type="submit" name="reg-sub" class="btn btn-primary btn-block d-block m-auto" value="Sign up">
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
  
  <script>
    if(unsuccess == true){
      registerForm();
    }
  </script>
</body>

</html>