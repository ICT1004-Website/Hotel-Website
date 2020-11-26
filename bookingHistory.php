<?php
// Start the session
session_start();
?>
<html>
         <?php
             include "head.inc.php";
         ?>
   
<body>
    <?php
     include "nav.inc.php";
 ?>
    <main class="container">
        <?php
        echo "<h1>Booking History</h1>";
        //echo "Member ID is " . $_SESSION["member_id"] . ".<br>";
        ?>

<?php
 $config = parse_ini_file('../../private/db-config.ini');
 $conn = new mysqli($config['servername'], $config['username'],
 $config['password'], $config['dbname']);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$id = $_SESSION["member_id"]; 
 //$id=$_GET["id"];
$bookingid=$_POST["bookingId"];
 
$result = mysqli_query($conn,"SELECT * FROM the_lodge_booking WHERE bookingId='$bookingid'");

while($row = mysqli_fetch_array($result))
{
echo "<form action='viewbooking.php' method='post'>
 <div class='form-group'>
 <label for='bookingId_update'>Booking ID:</label>
 <input class='form-control' type='text' id='bookingId_update'
 name='bookingId_update' placeholder='Enter booking ID' value=". $row['bookingId'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='roomNo_update'>Room No:</label>
 <input class='form-control' type='text' id='roomNo_update' 
 name='roomNo_update' placeholder='Enter room no' value=". $row['room_no'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='arrival_update'>Arrival Date:</label>
 <input class='form-control' type='date' id='arrival_update' required
 name='arrival_update' placeholder='Enter arrival date' value=". $row['arrival'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='checkout_update'>Check-Out Date:</label>
 <input class='form-control' type='date' id='checkout_update' required
 name='checkout_update' placeholder='Enter checkout date' value=". $row['checkout'] ." readonly>
 </div>
 <div class='form-group'>
 <div class='text-center'>
 <button class='btn btn-success' type='submit'>Return to View Booking</button>
 </div>
 </div>
 </form>";
}



mysqli_close($con);
?>

    </main>
    <?php
 include "footer.inc.php";
 ?>
</body>
</html>
