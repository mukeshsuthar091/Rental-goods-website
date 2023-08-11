<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/payment.css">
    <!-- for icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <title>Payment Gateway</title>
</head>

<body>

    <!-- <?php
            if (isset($_GET['loginFail']) && $_GET['loginFail'] == true) {
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> Failed to login because ' . $_GET['loginFail'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
            ?> -->

    <main>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $totalAmountPay = $_POST['totalAmountPay'];
            $fullName = $_POST['fullName'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $country = $_POST['country'];
            $postcode = $_POST['postcode'];
            $mobileNumber = $_POST['mobileNumber'];
            $email = $_POST['email'];

            // echo $fullName , $mobileNumber, $email;

        }
        ?>

        <div class="container">
            <div class="totalPaymentAmount">
                <p>Total Amount : </p>
                <h1 class="amount"><?php echo $totalAmountPay; ?></h1>
            </div>
            <div class="cardDetails">
                <div class="paymentType">
                    <div>
                        <input type="radio" name="payOption" id="payOption-1" class="payOption" onclick="optionShow(1)" value="1">
                        <label for="payOption-1">UPI</label>
                    </div>
                    <div>
                        <input type="radio" name="payOption" id="payOption-2" class="payOption" onclick="optionShow(2)" value="2" checked>
                        <label for="payOption-2">Credit/Debit Card</label>
                    </div>
                </div>
                <div class="paymentTypeDetail">
                    <form action="/RentalGoods/partials/_handlePaymentUPIDetail.php" method="post">
                        <div class="paymentWindow-1 hide">
                            <label for="upiID">Enter your UPI ID </label>
                            <input type="text" name="upiID" id="upiID" placeholder="e.g. mukesh21@oksbi" required>
                            <!-- <button type="submit" id="payBtn-1" class="payBtn">Pay</button> -->
                            <button type="button" id="payBtn-1" class="payBtn">Pay</button>
                        </div>
                    </form>
                    <!-- <hr> -->
                    <form action="/RentalGoods/partials/_handlePaymentCardDetail.php" method="post">
                        <div class="paymentWindow-2">
                            <div id="CH-name">
                                <label for="cardholder-name">Cardholder Name </label>
                                <input type="text" class="" id="cardholder-name" name="cardholder-name" value="" placeholder="e.g. Mukesh Suthar" maxlength="30" required>
                                <p class="error" id="name-error"></p>
                            </div>

                            <div id="c-number">
                                <label for="card-no">Card Number</label>
                                <input type="text" class="" id="card-no" name="card-no" value="" placeholder="e.g. 1234 5678 9123 0000" maxlength="19" required>
                                <p class="error" id="number-error"></p>
                            </div>

                            <div class="card-date-cvc">
                                <div id="c-date">
                                    <label for="card-month-year">Exp. Date (MM/YY)</label>
                                    <input type="text" class="" id="card-month" name="card-m" value="" placeholder="MM" maxlength="2" required>
                                    <input type="text" class="" id="card-year" name="card-y" value="" placeholder="YY" maxlength="2" required>
                                    <p class="error" id="date-error"></p>
                                </div>
                                <div id="c-cvc">
                                    <label for="card-cvc-no">CVC</label>
                                    <input type="text" class="" id="card-cvc-no" name="card-cvc-no" value="" placeholder="e.g. 123" maxlength="3" required>
                                    <p class="error" id="cvc-error"></p>
                                </div>
                            </div>

                            <!-- <button type="submit" id="payBtn-2" class="payBtn">Pay</button> -->
                            <button type="button" id="payBtn-2" class="payBtn">Pay</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- <div class="ps-message"> -->
            <div class="paymentSuccess">
                <div>
                    <i class="lar la-check-circle"></i>
                    <p>Payment Successful!</p>
                </div>
            </div>
        <!-- </div> -->
    </main>

    <!------------ Javascript -------------->

    <?php include('partials/_js_script.php') ?>

</body>

</html>