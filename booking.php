<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <?php
        include "head.inc.php";
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/booking.css">
        <script defer src="js/booking.js"></script>
        
        <!--payment links-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <link rel="stylesheet" href="css/paymentstyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
        <title>The Lodge | Booking</title>
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
        <h1>Booking Confirmation</h1>

        <div id="svg_wrap"></div>
        <button class="mem_button"  id="login" onclick="window.location.href = 'login.php'", type="button">Member Login</button>
        <div class = row>
        <div class ="multi-steps">
        <section class="steps">
            <h3>Room Confirmation</h3>
            <input type="text" placeholder="Date" />
            <input type="text" placeholder="No. of rooms and guest" />
            <input type="text" placeholder="Room Type" />
            <input type="text" placeholder="Price" />
        </section>

        <section class="steps">
            <h3>Special Requests</h3>
            <input type="text" placeholder="Special Request" />
        </section>

        <section class="steps">
            <h3>Guest Information</h3>
            <div class="row">
              <div class="split-col">
                <label class="label">Title:</label>
                <select name="title" id="title">
                    <option value="" disabled selected hidden>Prefix:</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr.">Dr.</option>
                </select>
              </div>
              <div class="split-col">
                <label class="label">First Name:</label>
                <input type="text" id="fname" name="firstname" placeholder="First Name" required>
              </div>
              <div class="split-col">
                <label class="label">Last Name:</label>
                <input type="text" required id="lname" name="lastname" required placeholder="Last Name">
              </div>
            </div>
            <div class="row">
              <div class="split-col">
                <label class="label">CC"</label>
                <input type="tel" id="phone">
              </div>
              <div class="split-col">
                <label class="label">Phone Number:</label>
                <input type="text" required id="phone" name="phone" required placeholder="Phone">
              </div>
            </div>        
            <label class="label">Email:</label>
            <input type="text" required class="input" name="email" placeholder="E-mail">

        </section>

        <section class="steps">
            <h3>Confirmation</h3>
            <input type="text" placeholder="Confirm" />
        </section>
        <section class="steps">
            <h3>Payment</h3>
            <label class="label">Email:<i class="fas fa-at"></i></label>
            <input type="text" required class="input" name="email" placeholder="E-mail">
             <label class="label">Cardholder Name:  <i class="fas fa-user"></i></label>
            <input type="text" class="input" name="card_holder" placeholder="Card Holder">
             <label class="label">Card Number:<i class="far fa-credit-card"></i></label>
            <input type="text" required class="input" name="card_number" placeholder="Card Number" data-mask="0000 0000 0000 0000">
            <div class="row">
              <div class="split-col">
                <label class="label">Expiry Date:<i class="fas fa-calendar-alt"></i></label>
                <input type="text" class="input" id="expiry_date" name="expiry_date" placeholder="MM / YY" data-mask="00 / 00">
              </div>
              <div class="split-col">
                <label class="label">CVC:<i class="fas fa-key"></i></label>
                <input type="text" required class="input" id="cvv" name="cvc" placeholder="CVC" data-mask="000">
              </div>
            </div>
        </div>
        <div class="summary">
            <div class="container">
                <h4>Summary <span class="summary" style="color:black"><i class="summary"></i></span></h4>
                <p><a href="images/singleroom.jpg">
                <img src="images/singleroom.jpg" alt="singleroom" title="singleroom" width="300" height="200"></a> 
                <p><a>Single Room</a><span class="price">$15</span></p>
                <p><a href="#">Product 2</a> <span class="price">$5</span></p>
                <p><a href="#">Product 3</a> <span class="price">$8</span></p>
                <p><a href="#">Product 4</a> <span class="price">$2</span></p>
                <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
            </div>
        </div>
        </div>
        <div class="button" id="prev">&larr; Previous</div>
        <div class="button" id="next">Next &rarr;</div>
        <div class="button" id="submit">Agree and send application</div>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>
