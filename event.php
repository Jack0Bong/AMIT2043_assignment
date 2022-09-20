<?php
require('PHP_Modules/conn.php');
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

    <!-- Color Calendar CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/color-calendar@1.0.5/dist/css/theme-basic.css" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/deebd6333b.js" crossorigin="anonymous"></script>
    <!-- Navigation bar import -->
    <?php require("PHP_modules/Navigation.php") ?>

    <!-- <div id="calendar-b"></div> -->

    <div class="m-auto pt-5" style="background-image: url(assets/Party-starters.jpeg);background-attachment: fixed;background-size: 100% 100%; background-blend-mode:darken;background-color: #606061;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(0)">January</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(1)">February</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(2)">March</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(3)">April</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(4)">May</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(5)">June</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(6)">July</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(7)">August</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(8)">September</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(9)">October</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(10)">November</h3>
                </div>
                <div class="col">
                    <h3 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(11)">December</h3>
                </div>
            </div>
        </div>
        <div class="row w-100">
            <div class="col"></div>
            <div class="col mt-5 mb-5">
                <h1 class="text-center text-white">2022 EVENTS LISTING</h1>
            </div>
            <div class="col">
                <form action="event.php" method="POST" class="d-flex align-items-center h-100">
                    <input style="width:150px" type="text" name="key" class="form-control me-2" placeholder="Search for events" required>
                    <input type="submit" name="search-sub" class="btn btn-primary">
                </form>
            </div>
        </div>
        <?php

        //sql for event listing
        $sql = "SELECT * FROM event";
        $result = $mysqli->query($sql);
        $resultCount = mysqli_num_rows($result);

        //echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';

        for ($i = 0; $i < $resultCount / 4; $i++) {
            echo ('<div class="row pb-5 m-auto" style="width:fit-content">');
            for ($iInner = 0; $iInner < 3; $iInner++) {
                if ($row = $result->fetch_assoc()) {
                    $date = strtotime($row['Date'] . $row['Time']);
                    if(isset($_POST['search-sub'])){
                        if(stripos($row['Event_Name'],$_POST['key']) !== false){
                            echo '<a href="event-page.php?Event_ID='. $row['Event_ID'] .'" class=" p-0 event-card '. date("M",$date) .'" style="text-decoration:none;color:black;width:fit-content;max-width:500px;display:initial">';
                        }else{
                            echo '<a href="event-page.php?Event_ID='. $row['Event_ID'] .'" class=" p-0 event-card '. date("M",$date) .'" style="text-decoration:none;color:black;width:fit-content;max-width:500px;display:none">';
                        }
                    }else{
                        echo '<a href="event-page.php?Event_ID='. $row['Event_ID'] .'" class=" p-0 event-card '. date("M",$date) .'" style="text-decoration:none;color:black;width:fit-content;max-width:500px;display:none">';
                    }

                    echo ('<div class="col d-flex ms-4 me-4 p-0 add-shadow" style="max-height:150px;background-color:white;max-width:500px">
                        <div class="p-0" style="background-color:#ff6176;width:18%;max-width:76px;color:white">
                            <h2 class="text-center pt-2">'. date("d",$date) .'</h1>
                            <h3 class="text-center ">'. date("M",$date) .'</h3>
                        </div>
                        <div class="container p-0 d-flex">
                            <img src="data:image/jpeg;base64,'.base64_encode( $row['Event_Image'] ).'" alt="" style="object-fit:cover;width:120px;height:100%;max-height:120px;">
                            <div class="event-desc">
                                <h5 class="mb-0 ps-3">'. $row['Event_Name'] .'</h6>
                                <p class="p-3 pt-0 m-0" style="font-size:0.7em;overflow:hidden;height:50px">'. $row['Event_Desc'] .'</p>
                                <i class="fa-solid fa-calendar-days ps-3"></i><span class="pt-0">  '. date("h:i A",$date) .'</span>
                                <i class="fa-solid fa-ticket ps-3"></i><span> RM'. $row['Price'] .'</span>
                                </br>
                                <i class="fa-sharp fa-solid fa-chair ps-3"></i><span>'.$row['Seat'].' Left</span>
                            </div>
                        </div>
                    </div>
                    </a>'
                    );
                } else {
                    break;
                }
            }
            echo ('</div>');
        }
        ?>
    </div>




    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // script to get switch months
        function switchMonth(month) {
            let months = document.querySelectorAll(".month");
            let allCard = document.querySelectorAll(".event-card");
            for (let index = 0; index < 12; index++) {
                months[index].classList.remove("active-month");
            }
            months[month].classList.add("active-month");

            for (let index = 0; index < allCard.length; index++) {
                allCard[index].style.display ="none";
            }

            let cards;
            switch (month) {
                case 0:
                    cards = document.querySelectorAll(".Jan");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 1:
                    cards = document.querySelectorAll(".Feb");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 2:
                    cards = document.querySelectorAll(".Mar");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 3:
                    cards = document.querySelectorAll(".Apr");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 4:
                    cards = document.querySelectorAll(".May");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 5:
                    cards = document.querySelectorAll(".Jun");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 6:
                    cards = document.querySelectorAll(".Jul");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 7:
                    cards = document.querySelectorAll(".Aug");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 8:
                    cards = document.querySelectorAll(".Sep");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 9:
                    cards = document.querySelectorAll(".Oct");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 10:
                    cards = document.querySelectorAll(".Nov");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                case 11:
                    cards = document.querySelectorAll(".Dec");
                    for(let i=0;i<cards.length;i++){
                        cards[0].style.display = "inline";
                    }
                    break;
                default:
                    break;
            }
        }
    </script>

    <!-- check if search was executed before, otherwise run default -->
    <?php 
        if(!isset($_POST['search-sub'])){
            echo '
            <script>
            const date = new Date()
            switchMonth(parseInt(date.getMonth()));
            </script>
            ';
            
        }
    ?>
</body>

</html>