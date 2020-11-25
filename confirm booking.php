<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>The Lodge | Booking Summary</title>
        <?php
        include "head.inc.php"
        ?>
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
        <header class="jumbotron jumbotron-fluid text-center" style=" background-image: url(https://imgcy.trivago.com/c_limit,d_dummy.jpeg,f_auto,h_1300,q_auto,w_2000/uploadimages/33/20/33208426.jpeg);">
            <h1 class="display-4">Booking Summary</h1>
        </header>
        <main class ="container">

            <section>                
                <div class="row">                  
                    <article class="col-sm">
                        <?php
                        echo "<h3>" . $_SESSION['roomtype'] . "</h3>";
                        ?>
                        <figure>
                            <?php
                            echo "<img src='images/" . $_SESSION['image'] . "' alt='" . $_SESSION['roomtype'] . "'/>";
                            ?>
                        </figure>
                    </article>                    
                </div>
                <div class="row">
                    <article class="col-sm">

                    </article>
                </div>
            </section>




            <?php
            $fname = $lname = $country = $email = $image = $arrival = $checkout = $comment = $room_no = $memberid = $guestid = $errorMsg = "";
            $success = true;
            // sanitize inputs
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST['comment'])) {
                    $comment = sanitize_input($_POST["comment"]);
                }
                // save guess info into db when not log in.
                if (is_null($_SESSION["memberid"])) {
                    if (!empty($_POST['fname'])) {
                        $fname = sanitize_input($_POST["fname"]);
                    }
                    if (!empty($_POST['lname'])) {
                        $lname = sanitize_input($_POST["lname"]);
                    }
                    if (!empty($_POST['country'])) {
                        $country = sanitize_input($_POST["country"]);
                    }
                    if (!empty($_POST['email'])) {
                        $email = sanitize_input($_POST["email"]);
                    }
                    $memberId = 0;
                }
                //echo $guessId;
                //retrieveguessid();
            } else if (isset($_SESSION["memberid"])) {
                $memberId = $_SESSION["memberid"];
                $guessid = 0;
            } else {
                $success = false;
            }
            if ($success) {
                //saveGuestToDB();
                //retrieveroom_no();
                //saveBookingToDB();
                // save booking details into db.
                //saveBookingTodb();
            }

            if ($success) {

//                echo "<h1>Successfully Booked A room for You!</h1>";
//                echo "<h3>Thank you for booking with us, $fname $lname.</h3>";
//                echo "<h4>$fname,$lname,$country,$email,$comment</h4><br>";
//                echo "<h4>" . $_SESSION['image'] . $_SESSION['arrival'] . $_SESSION['checkout'].$_SESSION['memberid'].$_SESSION['quantity'].$_SESSION['roomtype']."<h4>";
//                echo "<form action='index.php' method='post'>";
//                echo "<div class='form-group'>
//                 <button style='background-color:green' class='btn btn-primary' type='submit'>Home</button>";
            } else {
                echo "<h1>Oops!</h1>";
                echo "<h3>The following errors were detected:</h3>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<form action='index.php' method='post'>";
                echo "<div class='form-group'>
                    <button style='background-color:red' class='btn btn-primary' type='submit'>Return to Home</button>";
            }

//Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            /*
             * Helper function to write the member data to the DB
             */

            function saveGuestToDB() {
                global $fname, $lname, $email, $country, $errorMsg, $success;
// Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
                //Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
// Prepare the statement:
                    // insert into database
                    $stmt = $conn->prepare("INSERT INTO the_lodge_guest (fname, lname, country, emailAddress) VALUES (?, ?, ?, ?)");
// Bind & execute the query statement:
                    $stmt->bind_param("ssss", $fname, $lname, $country, $email);
                    if (!$stmt->execute()) {
                        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                        $success = false;
                    }
                    $stmt->close();
                    // retrieve guessId from database                            
                }
                $conn->close();
            }

            function retrieveroom_no() {
                global $room_no;
// Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
                //Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                }
// Prepare the statement:
                $sql = "SELECT room_no from the_lodge_rooms WHERE roomtypeId in 
(SELECT roomtypeId from the_lodge_roomtype WHERE image = '" . $_SESSION['image'] . "' AND room_no not in 
(select room_no from the_lodge_booking WHERE '" . $_SESSION['arrival'] . "' >= arrival AND '" . $_SESSION['checkout'] . "' <= checkout))
;);";
// Bind & execute the query statement:
                $result = mysql_query($sql);
                $row = mysql_fetch_row($result);
                echo "<p>room no: " . $row['room_no'] . "</p>";
                $room_no = row[0];
            }

            function saveBookingToDB() {
                global $guestId, $memberId;
// Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
                //Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                }

                $stmt = $conn->prepare("INSERT INTO the_lodge_booking (arrival, checkout, comment, room_no, memberId, guestId) VALUES (?, ?, ?, ?, ?, ?)");
// Bind & execute the query statement:
                $stmt->bind_param("sssddd", $_SESSION['arrival'], $_SESSION['checkout'], $_SESSION['comment'], $room_no, $memberId, $guestId);
                if (!$stmt->execute()) {
                    $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    $success = false;
                }
                $conn->close();
            }
            ?>
        </main>
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>