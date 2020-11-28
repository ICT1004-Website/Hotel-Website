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
        ?>

<?php
 // Create database connection.
 $config = parse_ini_file('../../private/db-config.ini');
 $conn = new mysqli($config['servername'], $config['username'],
 $config['password'], $config['dbname']);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 //get Booking ID from previous page
 $bookingid=$_POST["bookingId"];
 $result = mysqli_query($conn,"SELECT * 
FROM the_lodge_booking
LEFT JOIN the_lodge_rooms ON the_lodge_rooms.room_no = the_lodge_booking.room_no 
WHERE bookingId='$bookingid'");
/// fetch data from database and display it
while($row = mysqli_fetch_array($result))
{
echo "<form action='viewbooking.php' method='post'>
 <div class='form-group'>
 <label for='bookingId'>Booking ID:</label>
 <input class='form-control' type='text' id='bookingId'
 name='bookingId' placeholder='Enter booking ID' value=". $row['bookingId'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='roomNo'>Room No:</label>
 <input class='form-control' type='text' id='roomNo' 
 name='roomNo' value=". $row['room_no'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='guestNo'>No of Guest:</label>
 <input class='form-control' type='number' id='guestNo' 
 name='guestNo' min='1' max=". $row['roomtypeId'] ." value=". $row['no_of_guests'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='arrival'>Arrival Date:</label>
 <input class='form-control' type='date' id='arrival' required
 name='arrival' value=". $row['arrival'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='checkout'>Check-Out Date:</label>
 <input class='form-control' type='date' id='checkout' required
 name='checkout' value=". $row['checkout'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='comment'>Comment:</label>
 <textarea class='form-control' type='text' id='comment' required readonly
 name='comment'>". $row['comments'] ."</textarea>
 </div>
 <div class='form-group'>
 <div class='text-center'>
 <button class='btn btn-success' type='submit'>Return to View Booking</button>
 </div>
 </div>
 </form>";
}

mysqli_close($conn);
?>

    </main>
    <?php
 include "footer.inc.php";
 ?>
</body>
</html>
