<?php
session_start();
require("PHP_modules/conn.php");
if (!isset($_SESSION["isLoggedIn"]) && !isset($_SESSION["adminLoggedIn"])) {
    Header("Location:login.php");
}


if (isset($_POST['sub-buy'])) {
    if (isset($_POST["payment"])) {
        $sql = "SELECT * FROM event";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();

        if ($row['Seat']-$_POST['qty'] >= 0) {
            if ($_POST["payment"] == "cc") {
                if ($_POST['cc_num'] != "") {
                    //Add Booking
                    $sql = "INSERT INTO booking (Event_ID,User_ID,Quantity,payment_method,cc_number) VALUES (" . $_GET['Event_ID'] . "," . $_SESSION['userID'] . "," . $_POST['qty'] . ",'Credit Card','" . $_POST['cc_num'] . "')";
                    $mysqli->query($sql);
                    $updatedSeat = $row['Seat'] - $_POST['qty'];

                    //Update Qty
                    $sql = "UPDATE event SET Seat =" . $updatedSeat . " WHERE Event_ID=" . $_GET['Event_ID'];
                    $mysqli->query($sql);
                    header("Location:event.php");
                } else {
                    $ccErr = "Please fill in the credit card number";
                }
            } else if ($_POST["payment"] == "sc") {
                if ($_POST['sc_num'] != "") {
                    //Add Booking
                    $sql = "INSERT INTO booking (Event_ID,User_ID,Quantity,payment_method,student_id) VALUES (" . $_GET['Event_ID'] . "," . $_SESSION['userID'] . "," . $_POST['qty'] . ",'Student Card','" . $_POST['sc_num'] . "')";
                    $mysqli->query($sql);

                    //Update Qty
                    $updatedSeat = $row['Seat'] - $_POST['qty'];
                    $sql = "UPDATE event SET Seat =" . $updatedSeat . " WHERE Event_ID=" . $_GET['Event_ID'];
                    $mysqli->query($sql);
                    header("Location:event.php");
                } else {
                    $scErr = "Please fill in the student card number";
                }
            }
        }else{
            $qtyErr= "Not enough seat is available";
        }
    } else {
        $paymentErr = "Please select a payment method";
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
    $sql = "SELECT * FROM event WHERE Event_ID = '" . $_GET['Event_ID'] . "'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $date = strtotime($row['Date'] . $row['Time']);
    ?>


    <form action="payment.php?Event_ID=<?php echo $_GET['Event_ID'] ?>" method="POST">
        <h1 class="text-center mt-5">PAYMENT</h1>
        <div class="container d-block justify-content-evenly w-75 mt-3">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tr style="height: 100px;width:100%">
                        <td style="width: 20%;">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['Event_Image']) ?>" style="object-fit:cover;width:70%">
                        </td>
                        <td>
                            <div class="mt-5">
                                <h3><?php echo $row['Event_Name']; ?></h3>
                            </div>
                        </td>
                        <td class="h-100">
                            <div class="input-group mt-5">
                                <button class="btn btn-outline-secondary" type="button" onclick="quantityManage(-1)">-</button>
                                <input value="1" class="text-center quantity" type="number" name="qty" min="1" style="width: 60px;-webkit-appearance: none;">
                                <button class="btn btn-outline-secondary" type="button" onclick="quantityManage(1)">+</button>
                            </div>
                            <p class="text-danger"><?php echo isset($qtyErr) ? $qtyErr  : ""  ?></p>
                        </td>
                        <td>
                            <div class="mt-5">
                                RM
                                <span class="price">
                                    <?php echo number_format((float)$row['Price'], 2, '.', '') ?>
                                </span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>


            <div class="inputs w-100 mt-3 d-flex justify-content-between">
                <div class="payment-methods w-50">
                    <h5 class="text-center">PAYMENT METHOD</h5>
                    <p class="text-danger text-center"><?php echo isset($paymentErr) ? $paymentErr  : ""  ?></p>
                    <div class="d-flex justify-content-evenly p-3">
                        <div class="w-50">
                            <input class="form-check-input" type="radio" name="payment" value="cc" onclick="paymentMethod(0)">
                            <label class="form-check-label" for="flexRadioDefault1">Credit Card</label>
                            <div class="cc" style="display:none">
                                <br>
                                <label for="">Credit Card Number</label>
                                <input type="tel" name="cc_num" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" class="form-control">
                                <p class="text-danger text-center"><?php echo isset($ccErr) ? $ccErr  : ""  ?></p>
                            </div>
                        </div>
                        <div class="w-50">
                            <input class="form-check-input" type="radio" name="payment" value="sc" onclick="paymentMethod(1)">
                            <label class="form-check-label" for="flexRadioDefault1">Student Card</label>
                            <div class="sc" style="display:none">
                                <br>
                                <label for="">Student Card Number</label>
                                <input type="tel" name="sc_num" pattern="[0-9\s]{7}" placeholder="xxxxxxx" class="form-control">
                                <p class="text-danger text-center"><?php echo isset($scErr) ? $scErr  : ""  ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pay-info">
                    <span class="pe-2 text-muted">Subtotal: </span>
                    <span class="subtotal" style="padding-right:6vw">RM12.99</span>
                    <br>
                    <input type="submit" name="sub-buy" value="Buy Ticket" class="btn btn-success mt-3">
                </div>
            </div>
    </form>
    </div>

    </section>
    <!-- Footer import -->
    <?php require("PHP_modules/footer.php") ?>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- script to change quantity -->
    <script>
        function paymentMethod(method) {
            let cc = document.querySelector(".cc");
            let sc = document.querySelector(".sc");
            if (method == 0) {
                cc.style.display = "block";
                sc.style.display = "none";
            } else if (method == 1) {
                cc.style.display = "none";
                sc.style.display = "block";
            }
        }

        function quantityManage(num) {
            let inputQty = document.querySelector(".quantity");
            if (num == 1) {
                inputQty.value = parseInt(inputQty.value) + parseInt(1);
            } else if (num == -1) {
                if (inputQty.value != 1) {
                    inputQty.value = parseInt(inputQty.value - 1);
                }
            }

            let qty = parseInt(inputQty.value);
            let subtotal = document.querySelector(".subtotal");
            let price = parseFloat(document.querySelector(".price").innerHTML);

            console.log(qty * price);
            subtotal.innerHTML = 'RM' + (qty * price).toFixed(2);

        }
    </script>

    <?php
    if (isset($ccErr)) {
        echo "<script>paymentMethod(0)</script>";
    } else if (isset($scErr)) {
        echo "<script>paymentMethod(1)</script>";
    }
    ?>
</body>

</html>