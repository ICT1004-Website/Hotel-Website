<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>The Lodge | Payment</title>
        <link rel="stylesheet" href="css/paymentstyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="payment">
                <h2>Payment Gateway</h2>
                
                <div class="form">
                    <div class="card space icon-relative">
                        <label class="label">Email Address:</label>
                        <input type="text" required class="input" name="email" placeholder="E-mail">
                        <i class="fas fa-at"></i>
                    </div>
                    <div class="card space icon-relative">
                        <label class="label">Card Holder Name:</label>
                        <input type="text" class="input" name="card_holder" placeholder="Card Holder">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card space icon-relative">
                        <label class="label">Card number:</label>
                        <input type="text" required class="input" name="card_number" placeholder="Card Number" data-mask="0000 0000 0000 0000">
                        <i class="far fa-credit-card"></i>
                    </div>
                    <div class="card-grp space">
                        <div class="card-item icon-relative">
                        <label class="label">Expiry date:</label>
                        <input type="text" required class="input" name="expiry_date" placeholder="MM / YY" data-mask="00 / 00">
                        <i class="fas fa-calendar-alt"></i>
                        </div>
                         <div class="card-item icon-relative">
                        <label class="label">CVC:</label>
                        <input type="text" required class="input" name="cvc" placeholder="***" data-mask="000">
                        <i class="fas fa-key"></i>
                        </div>
                    </div>
                    <div class="btn">
                        Submit Payment
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </body>
</html>