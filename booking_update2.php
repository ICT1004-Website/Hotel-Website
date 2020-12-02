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
            <div class = "row">
                <div class = "container">
                    <form action="Cbooking.php" method="POST" id="regForm">
                            <h1>Register:</h1>
                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">Name:
                                <p><input placeholder="First name..." oninput="this.className = ''"></p>
                                <p><input placeholder="Last name..." oninput="this.className = ''"></p>
                            </div>

                            <div class="tab">Contact Info:
                                <p><input placeholder="E-mail..." oninput="this.className = ''"></p>
                                <p><input placeholder="Phone..." oninput="this.className = ''"></p>
                            </div>

                            <div class="tab">Birthday:
                                <p><input placeholder="dd" oninput="this.className = ''"></p>
                                <p><input placeholder="mm" oninput="this.className = ''"></p>
                                <p><input placeholder="yyyy" oninput="this.className = ''"></p>
                            </div>

                            <div class="tab">Login Info:
                                <p><input placeholder="Username..." oninput="this.className = ''"></p>
                                <p><input placeholder="Password..." oninput="this.className = ''"></p>
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                                        <?php
                                        
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
                                            $_SESSION['memfname'] = $row['fname'];
                                            $_SESSION['memlname'] = $row['lname'];
                                            $_SESSION['memcountry'] = $row['country'];
                                            $_SESSION['mememail'] = $row['emailAddress'];
                                            $conn->close();
                                        }
                                        ?>
                            
                                      </form>              
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
                    $_SESSION['price'] = $price;
                    echo "<h3>" . $roomtype . "<span class='summary' style='color:black'><i class='summary'></i></span></h3>";
                    echo "<img src='images/" . $image . "' alt='" . $image . "' title='" . $image . "' width='300' height='200'>";
                    echo "<h5>Arrival Date: " . $start . "</h5>";
                    echo "<h5>Checkout Date: " . $end . "</h5>";
                    echo "<h5>No. of Guests: " . $quantity . "</h5>";
                    echo "<h5>Price: $" . $price . "</h5>";
                    ?>                        
                </div>
            </div>
            <?php
            include "footer.inc.php";
            ?>
        </main>
    </body>
</html>
