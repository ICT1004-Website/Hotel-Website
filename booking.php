<?php
session_start();
?>
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
        <main>
            <?php
            include "nav.inc.php";
            ?>
            <h1>Booking Completed</h1>
            <div id="svg_wrap"></div>
            <button class="mem_button"  id="login" onclick="window.location.href = 'login.php'", type="button">Member Login</button>
            <form action="confirm booking.php" method="POST">
                <div class = row>
                    <div class ="multi-steps">    
                        <section class="steps">
                            <h3>Room Confirmation</h3>
                            <input name='comment' type="text" placeholder="Special Request"/>

                        </section>
                        <?php
                        if (is_null($_SESSION["memberid"])) {
                            ?>
                            <section class='steps'>
                                <h3>Guest Information</h3>
                                <div class='row'>
                                    <!--                                <div class='split-col'>
                                                                        <label class='label'>Title:</label>
                                                                        <select name='title' id='title'>
                                                                            <option value='' disabled selected hidden>Prefix:</option>
                                                                            <option value='Mr.'>Mr.</option>
                                                                            <option value='Mr.'>Mr.</option>
                                                                            <option value='Ms.'>Ms.</option>
                                                                            <option value='Mrs.'>Mrs.</option>
                                                                            <option value='Miss'>Miss</option>
                                                                            <option value='Dr.'>Dr.</option>
                                                                        </select>
                                                                    </div>-->
                                    <!--<div class='split-col'>-->
                                    <label class='label'>First Name:</label>
                                    <input type='text' id='Gfname' name='fname' placeholder='First Name' required>
                                    <!--</div>-->
                                    <!--<div class='split-col'>-->
                                    <label class='label'>Last Name:</label>
                                    <input type='text' required id='Glname' name='lname' required placeholder='Last Name'>
                                    <!--</div>-->
                                    <!--</div>-->
                                    <label class='label'>Country:</label>
                                    <input type='text' required id='Gphone' name='country' required placeholder='Phone'>
                                    <label class='label'>Email:</label>";
                                    <input type='text' required class='input' name='email' placeholder='E-mail'>
                                    </section>
                                    <?php
                                }
//                        $errorMsg = "";
//                        $success = true;
//
//                        // Sanitize Email
//                        if (empty($_POST["email"])) {
//                            //The dot equals ".=" is a contatenation equals operator
//                            $errorMsg .= "Email is required.<br>";
//                            $success = false;
//                        } else {
//                            $email = sanitize_input($_POST["email"]);
//
//                            //Additional check to make sure e-mail address is well-formed.
//                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//                                $errorMsg .= "Invalid email format.<br>";
//                                $success = false;
//                            }
//                        }
//                        // Sanitize First Name
//                        if (empty($_POST["fname"])) {
//                            $errorMsg .= "First name is required.<br>";
//                            $success = false;
//                        } else {
//                            sanitize_input($_POST["fname"]);
//                        }
//                        // Sanitize Last Name
//                        if (empty($_POST["lname"])) {
//                            $errorMsg .= "Last name is required.<br>";
//                            $success = false;
//                        } else {
//                            sanitize_input($_POST["lname"]);
//                        }
//                        // Sanitize Phone
//                        if (empty($_POST["phone"])) {
//                            $errorMsg .= "Phone number is required.<br>";
//                            $success = false;
//                        } else {
//                            sanitize_input($_POST["phone"]);
//                        }
//
//                        //Fucntion of sanitizing input
//                        function sanitize_input($data) {
//                            $data = trim($data);
//                            $data = stripslashes($data);
//                            $data = htmlspecialchars($data);
//                            return $data;
//                        }

                                if (isset($_SESSION["memberid"])) {
                                    $config = parse_ini_file('../../private/db-config.ini');
                                    $conn = new mysqli($config['servername'], $config['username'],
                                            $config['password'], $config['dbname']);
                                    //Check connection
                                    if ($conn->connect_error) {
                                        $errorMsg = "Connection failed: " . $conn->connect_error;
                                        $success = false;
                                    }
                                    $sql = "SELECT fname, lname, country, emailAddress from the_lodge_member WHERE memberid =" . $_SESSION["memberid"] . ";";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch_assoc();
                                    echo "<section class='steps'>";
                                    echo "<h3>Member Information</h3>";
                                    echo "<h4> First Name: " . $row['fname'] . "</h4>";
                                    echo "<h4> Last Name: " . $row['lname'] . "</h4>";
                                    echo "<h4> Country: " . $row['country'] . "</h4>";
                                    echo "<h4> Email: " . $row['emailAddress'] . "</h4>";
                                    echo "</section>";
                                    $conn->close();
                                }
                                ?>
                                <section class="steps">
                                    <h3>Payment</h3>                    
                                    <label for='card_holder' class="label">Card Holder Name: <i class="fas fa-user"></i></label>
                                    <input type="text" class="input" name="card_holder" placeholder="Card Holder Name"><br>
                                    <label for='card_number' class="label">Card Number: <i class="far fa-credit-card"></i></label>
                                    <input type="text"  class="input" name="card_number" placeholder="Card Number" data-mask="0000 0000 0000 0000">
                                    <div class="row">
                                        <div class="split-col">
                                            <label class="label">Expiry Date:  <i class="fas fa-calendar-alt"></i></label>
                                            <input type="text" class="input" id="expiry_date" name="expiry_date" placeholder="MM / YY" data-mask="00 / 00">
                                        </div>
                                        <div class="split-col">
                                            <label class="label">CVC:  <i class="fas fa-key"></i></label>
                                            <input type="text"  class="input" id="cvc" name="cvc" placeholder="CVC" data-mask="000">
                                        </div>
                                    </div>
                                    <?php
////Sanitize card holder name
//                            if (empty($_POST["card_holder"])) {
//                                $errorMsg .= "Card Holder name is required.<br>";
//                                $success = false;
//                            } else {
//                                sanitize_input($_POST["card_holder"]);
//                            }
////Sanitize card number
//                            if (empty($_POST["card_number"])) {
//                                $errorMsg .= "Card Number is required.<br>";
//                                $success = false;
//                            } else {
//                                sanitize_input($_POST["card_number"]);
//                            }
////Sanitize expiry
//                            if (empty($_POST["expiry_date"])) {
//                                $errorMsg .= "Expiry Date is required.<br>";
//                                $success = false;
//                            } else {
//                                sanitize_input($_POST["expiry_date"]);
//                            }
////Sanitize cvc
//                            if (empty($_POST["cvc"])) {
//                                $errorMsg .= "CVC Number is required.<br>";
//                                $success = false;
//                            } else {
//                                sanitize_input($_POST["cvc"]);
//                            }
                                    ?>
                                </section>
                            </div>
                            <div class="summary">
                                <div class="container">
                                    <?php
                                    $start = $_POST['start'];
                                    $end = $_POST['end'];
                                    $roomtype = $_POST['roomtype'];
                                    $price = $_POST['price'];
                                    $quantity = $_POST['quantity'];
                                    $image = $_POST['image'];
                                    $_SESSION['arrival'] = $start;
                                    $_SESSION['checkout'] = $end;
                                    $_SESSION['roomtype'] = $roomtype;
                                    $_SESSION['image'] = $image;
                                    $_SESSION['quantity'] = $quantity;
                                    echo "<h3>" . $roomtype . "<span class='summary' style='color:black'><i class='summary'></i></span></h3>";
                                    echo "<img src='images/" . $image . "' alt='" . $image . "' title='" . $image . "' width='300' height='200'>";
                                    echo "<h5>Arrival Date: " . $start . "</h5>";
                                    echo "<h5>Checkout Date: " . $end . "</h5>";
                                    echo "<h5>No. of Guests: " . $quantity . "</h5>";
                                    echo "<h5>Price: $" . $price . "</h5>";
                                    ?>                
                                </div>
                            </div>
                    </div>
                    <div class="button" id="prev">&larr; PREVIOUS</div>
                    <div class="button" id="next">NEXT &rarr;</div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="Confirm Booking" id="submit">
                    </div>
            </form>
            <?php
            include "footer.inc.php";
            ?>
        </main>
    </body>
</html>
