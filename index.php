<?php
session_start();
require('PHP_Modules/conn.php');
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
    <section style="background-image: url(assets/concert-main.jpeg);background-attachment: fixed;background-size: 100% 100%; background-blend-mode:darken;background-color: #606061;">

        <?php
        $sql = "SELECT * FROM event ORDER BY Event_ID DESC";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        ?>

        <!-- Carousel -->
        <h1 class="text-center pt-5 pb-3 text-white">Upcoming Popular Events</h1>
        <div class="container d-flex h-100 p-0 mb-5" style="width:90%;border-radius: 10px;">
            <div class="carousel slide" data-bs-ride="carousel" style="width:70%">
                <div class="carousel-inner" style="border-radius: 10px 0px 0px 10px;">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo base64_encode($row['Event_Image']) ?>" alt="First slide" style="max-height:60vh;object-fit:cover">
                    </div>
                </div>
            </div>
            <div class="infobox p-3 position-relative" style="width:30%;background-color:#F5F5F5;border-radius: 0px 10px 10px 0px;">
                <h6 class="text-white" style="padding:6px;background-color:#ed8c9f;border-radius:15px;border:1px solid #ed8c9f;width:fit-content">New Event</h6>
                <h1><?php echo $row['Event_Name'] ?></h1>
                <p><?php echo $row['Event_Desc'] ?></p>
                <a href="event-page.php?Event_ID=<?php echo $row["Event_ID"]; ?>"><button type="button" class="btn btn-dark position-absolute" style="bottom:3%;">Find out More</button></a>
            </div>
        </div>
        </div>



        <h1 class="text-center text-white pt-3 pb-3 ">Recent Events</h1>
        <div class="container">
            <div class="row d-flex">
                <?php
                $sql = "SELECT * FROM event ORDER BY Event_ID DESC";
                $result = $mysqli->query($sql);


                for ($i = 0; $i < 3; $i++) {
                    if ($row = $result->fetch_assoc()) {
                        $date = strtotime($row['Date'] . $row['Time']);
                        echo ('<div class="col pb-5" >
                                <div class="cards" style="">
                                    <div class="card" style="width: 18vw;border: none;margin:auto;height:50vh;max-height:480px" >
                                        <img src="data:image/jpeg;base64,'.base64_encode( $row['Event_Image'] ).'" class="card-img-top" style="max-height:200px;object-fit:cover">
                                        <div class="card-body" style="height:50%;max-height:300px">
                                            <h5 class="card-title">'. $row['Event_Name'] . '</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">'. date("d M",$date) . '</h6>
                                            <p class="card-text mb-1" style="overflow:hidden;height:100px">'. $row['Event_Desc'] . '</p>
                                            <a href="event-page.php?Event_ID='.$row['Event_ID'].'" class="btn btn-primary">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>');
                    }
                }
                ?>
            </div>
        </div>


    </section>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>