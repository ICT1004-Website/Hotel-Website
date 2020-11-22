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
        <h1>Rooms Available</h1>

        <div id="svg_wrap"></div>
        <div class = row>
            <div class ="multi-steps">
                <section class="steps">
            <?php
            $start = $end = $guest = "";
            $guest = $_POST['quantity'];
            $start = date("Y-m-d", strtotime($_POST['start']));
            $end = date("Y-m-d", strtotime($_POST['end']));
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
            //Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            }
            $sql = "select max_no_ppl, description, price_per_night from the_lodge_roomtype 
                    where max_no_ppl <= ".$guest." AND roomtypeId in  
                    (SELECT distinct roomtypeId from the_lodge_rooms where room_no not in 
                    (select room_no from the_lodge_booking WHERE '" . $start . "' >= arrival AND '" . $end . "' <= checkout));";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    echo "<h2>".$row["description"] . "</h2><br>";
                    
                    if ($row["description"] == "single room") {
                        echo "<div class='row'>";
                        echo "<div class='col'>";
                        echo "<img src='images/single_room.jpg' 
                                alt='single room' 
                                width='500' 
                                height='200'<br>";
                        echo "<div class='col'>";
                        echo "<h4>$" . $row["price_per_night"] . "</h4><br>";
                        echo "<form action='booking.php' method='post'>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='roomtype' value='single room'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='price' value='".$row["price_per_night"]."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='start' value='".$start."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='end' value='".$end."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='quantity' value='".$guest."'></div>";
                        echo "<div class='form-group'>
                    <button style='background-color:red' class='btn btn-primary' type='submit'>Book Room</button></div><br>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }                     
                    else if ($row["description"] == "double room") {              
                        echo "<div class=\"row\">";
                        echo "<div class=\"col\">";
                        echo "<img src=\"images/double_room.jpg\" 
                                alt=\"double room\" 
                                width=\"500\" 
                                height=\"200\"<br>";
                        echo "<div class=\"col\">";
                        echo "<h4>$" . $row["price_per_night"] . "</h4><br>";
                        echo "<form action='booking.php' method='post'>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='roomtype' value='double room'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='start' value='".$start."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='end' value='".$end."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='quantity' value='".$guest."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='price' value='".$row["price_per_night"]."'></div>";
                        echo "<div class='form-group'>
                    <button style='background-color:red' class='btn btn-primary' type='submit'>Book Room</button></div><br>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } else if ($row["description"] == "suites") {            
                        echo "<div class=\"row\">";
                        echo "<div class=\"col\">";
                        echo "<img src=\"images/suites.jpg\" 
                                alt=\"suites\" 
                                width=\"500\" 
                                height=\"200\"<br>";
                        echo "<div class=\"col\">";
                        echo "<h4>$" . $row["price_per_night"] . "</h4><br>";
                        echo "<form action='booking.php' method='post'>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='roomtype' value='suites'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='start' value='".$start."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='end' value='".$end."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='quantity' value='".$guest."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='price' value='".$row["price_per_night"]."'></div>";
                        echo "<div class='form-group'>
                    <button style='background-color:red' class='btn btn-primary' type='submit'>Book Room</button></div><br>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } else if ($row["description"] == "studio") {
                        echo "<div class=\"row\">";
                        echo "<div class=\"col\">";
                        echo "<img src=\"images/studio.jpeg\" 
                                alt=\"studio\" 
                                width=\"500\" 
                                height=\"200\"<br>";
                        echo "<div class=\"col\">";
                        echo "<h4>$" . $row["price_per_night"] . "</h4><br>";
                        echo "<form action='booking.php' method='post'>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='roomtype' value='studio'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='start' value='".$start."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='end' value='".$end."'></div>"; 
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='quantity' value='".$guest."'></div>";   
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='price' value='".$row["price_per_night"]."'></div>";                    
                        echo "<div class='form-group'>
                    <button style='background-color:red' class='btn btn-primary' type='submit'>Book Room</button></div><br>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } else if ($row["description"] == "villa") {  
                        echo "<div class=\"row\">";  
                        echo "<div class=\"col\">";       
                        echo "<img src=\"images/villa.jpg\" 
                                alt=\"villa\" 
                                width=\"500\" 
                                height=\"200\"<br>";
                        echo "<div class=\"col\">";
                        echo "<h4>$" . $row["price_per_night"] . "</h4><br>";
                        echo "<form action='booking.php' method='post'>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='roomtype' value='villa'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='start' value='".$start."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='end' value='".$end."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='quantity' value='".$guest."'></div>";
                        echo "<div class='form-group'>";
                        echo "<input type='hidden' name='price' value='".$row["price_per_night"]."'></div>";
                        echo "<div class='form-group'>
                    <button style='background-color:red' class='btn btn-primary' type='submit'>Book Room</button></div><br>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<p>So sorry, there are no rooms available for the date choosen, Please select another date.</p> <br>";
                        
                    }
                    
                }
                
            } else {
                echo "Please select the number of guests.";
            }
            /*
              $sql = "SELECT COUNT(roomtypeId), roomtypeId FROM the_lodge_rooms WHERE room_no NOT IN
              (select room_no from the_lodge_booking WHERE '2020-11-19' >= arrival AND '2020-11-20' <= checkout)
              GROUP BY roomtypeId" ;
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              if ($row["COUNT(roomtypeId)"] >= $quantity && $single == "single room") {
              $single = $row["description"];
              } else if ($row["description"] == "double room")
              $double = $row["description"];
              else if ($row["description"] == "suites")
              $suites = $row["description"];
              else if ($row["description"] == "studio")
              $studio = $row["description"];
              else if ($row["description"] == "villa")
              $villa = $row["description"];
              else
              echo "So sorry, there are no rooms available for the date choosen, Please select another date.";
              }
              } else {
              echo "0 results";

              }
             */
            $conn->close();
            ?>
                    </section>
            </div>
        </div>
        
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>