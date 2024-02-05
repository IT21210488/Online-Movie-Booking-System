<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment </title>
    <link rel="stylesheet" href="/css/payment.css">
    <link href="css/common.css"type="text/css" rel="stylesheet">
    <link href="css/footer.css"type="text/css" rel="stylesheet">
    <link href="css/header.css"type="text/css" rel="stylesheet">
    <link href="css/homepage.css"type="text/css" rel="stylesheet">
    <link href="css/about.css"type="text/css" rel="stylesheet">
    <link href="css/movies.css"type="text/css" rel="stylesheet">
</head>
<body>
<header><?php include 'html/header.html'; ?></header><br>
    <h3>Payment Deatils</h3>
    <div class="container">
        <form action="">
            <div class="inputBox">
                <span>Card Number</span>
                <input type="text" maxlength="16" class="card-number-input">
            </div>
            <div class="inputBox">
                <span>Card Holder</span>
                <input type="text" class="card-holder-input">
            </div>
            <div class="flexBox">
                <div class="inputBox"></div>
                <span>Expire mm</span>
                <select name="" id="" class="month-input">
                    <option value="month" selected disabled>month</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                </div>
                <div class="flexBox">
                    <div class="inputBox"></div>
                    <span>Expire yy</span>
                    <select name="" id="" class="year-input">
                        <option value="year" selected disabled>year</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                    </div>
                    <div class="inputBox">
                        <span>CVV</span>
                        <input type="text" maxlength="4" class="cvv-input">
                        <input type="submit" value="submit" class="submit-btn" onclick="alert('Payment Succesful')">
                    </div>
            </div>
               
        </form>


    </div>
    <script src="js/homepage.js"></script>
    <footer><?php include 'html/footer.html'; ?></footer>
</body>
</html>