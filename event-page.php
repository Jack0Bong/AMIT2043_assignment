<?php 
    require("PHP_modules/conn.php");
    session_start();
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

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <?php
        //sql for event listing
        $sql = "SELECT * FROM event WHERE Event_ID = '" . $_GET['Event_id'] . "'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        $date = strtotime($row['Date'] . $row['Time']);
    ?>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Event_Image']) ?>" style="width: 30%;">
            <div class="ms-5" style="width: 35%;min-width:450px;max-width:650px">
                <h1><?php echo $row['Event_Name'] ?></h1>
                <div class="w-100 d-flex justify-content-evenly mb-3" style="background-color: #cccccc;">
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                        <i class="fa-solid fa-calendar-days pb-2"></i>
                        <h4 class="text-center event-info-text"><?php echo date("d",$date) ?></h4>
                        <h4 class="text-center event-info-text"><?php echo date("M",$date)  ?></h4>
                    </div>
                    <div class="vert-line"></div>
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                        <i class="fa-solid fa-clock pb-2"></i>
                        <h4 class="text-center event-info-text"><?php echo date("h:i A",$date)  ?></h4>
                    </div>
                    <div class="vert-line"></div>
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                        <i class="fa-solid fa-ticket pb-2"></i>
                        <h4 class="text-center event-info-text">RM<?php echo $row['Price'] ?></h4>
                    </div>
                    <div class="vert-line"></div>
                    <div class="m-1 mt-2 d-flex align-center flex-column text-center">
                    <i class="fa-solid fa-location-dot pb-2"></i>
                        <h4 class="text-center event-info-text"><?php echo $row['Location'] ?></h4>
                    </div>
                </div>
                <p><?php echo  $row['Event_Desc'] ?></p>
                <div class="d-flex justify-content-between pt-2">
                <a href="payment.php?Event_ID=<?php echo $_GET['Event_id'] ?>"><button class="btn btn-success">Buy Ticket</button></a>
                <div class="d-flex align-items-center ps-2 pe-2 text-white" style="background-color: #3080ff;border-radius:15px"><i class="fa-solid fa-person pe-2"></i><span> 1000 People are going</span></div>
                </div>
                <i class="fa-sharp fa-solid fa-chair ps-3 text-danger"></i><span class="text-danger">100 Left</span>
            </div>
        </div>
    </div>


    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>