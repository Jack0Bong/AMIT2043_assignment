<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Main CSS import -->
    <link rel="stylesheet" href="CSS/main.css">

    <!-- Color Calendar Import -->
    <script src="https://cdn.jsdelivr.net/npm/color-calendar@1.0.5/dist/bundle.js"></script>

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

    <div class="m-auto" style="background-color:#82b2ff;padding-bottom:10%">
            
            <div class="row">
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(0)">January</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(1)">February</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(2)">March</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(3)">April</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(4)">May</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(5)">June</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(6)">July</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(7)">August</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(8)">September</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(9)">October</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(10)">November</h1>
                </div>
                <div class="col">
                    <h1 class="month text-center pt-3 pb-3 text-transparent" onclick="switchMonth(11)">December</h1>
                </div>
            </div>
        <?php
        for ($i = 0; $i < 4; $i++) {
            echo ('<a href="#" style="text-decoration:none;color:black;"><div class="row mb-5 w-100">');
            for ($iInner = 0; $iInner < 3; $iInner++) {
                echo (' <div class="col d-flex ms-4 me-4 p-0 add-shadow" style="max-height:160px;background-color:white">
                        <div class="p-0" style="background-color:#ff6176;width:18%;color:white">
                            <h2 class="text-center pt-2">06</h1>
                            <h3 class="text-center ">Aug</h3>
                        </div>
                        <div class="container p-0 d-flex">
                            <img src="assets/event.jfif" alt="" style="object-fit:cover;width:120px;height:100%">
                            <div class="event-desc">
                                <h5 class="mb-0 ps-3">SPD GAR Music Event</h6>
                                <p class="p-3 pt-0" style="font-size:0.7em;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, quibusdam.</p>
                                <i class="fa-solid fa-calendar-days ps-3"></i><span class="pt-0"> 10:00 AM - 8:00 PM</span>
                                <i class="fa-solid fa-ticket ps-3"></i><span> Free</span>
                            </div>
                        </div>
                    </div>'
                );
            }
            echo ('</div></a>');
        }
        ?>
    </div>




    <!-- event JS import -->
    <script src="JS/event.js"></script>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function switchMonth(month){
            let months = document.querySelectorAll(".month");
            for (let index = 0; index < 12; index++) {
                months[index].classList.remove("active-month");
            }
            months[month].classList.add("active-month");
            console.log("test");
        }
    </script>
</body>

</html>