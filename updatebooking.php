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
        echo "<h1>Update Booking</h1>";
        ?>

<?php
 // Create database connection
 $config = parse_ini_file('../../private/db-config.ini');
 $conn = new mysqli($config['servername'], $config['username'],
 $config['password'], $config['dbname']);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//SQL statement
$bookingid=$_POST["bookingId"];
 $result = mysqli_query($conn,"SELECT * 
FROM the_lodge_booking
LEFT JOIN the_lodge_rooms ON the_lodge_booking.room_no= the_lodge_rooms.room_no
LEFT JOIN the_lodge_roomtype ON the_lodge_rooms.roomtypeId= the_lodge_roomtype.roomtypeId 
WHERE bookingId='$bookingid'");

// fetch data from database and display it
while($row = mysqli_fetch_array($result))
{
echo "<form action='process_updatebooking.php' method='post'>
 <div class='form-group'>
 <label for='bookingId_update'>Booking ID:</label>
 <input class='form-control' type='text' id='bookingId_update' required
 name='bookingId_update' placeholder='Enter booking ID' value=". $row['bookingId'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='roomNo_update'>Room No:</label>
 <input class='form-control' type='text' id='roomNo_update' required
 name='roomNo_update' placeholder='Enter room no' value=". $row['room_no'] ." readonly>
 </div>
 <div class='form-group'>
 <label for='roomNo_update'>No of Guest:</label>
 <input class='form-control' type='number' id='guestNo_update' required
 name='guestNo_update' placeholder='Enter no of guest' min='1' max=". $row['max_no_ppl'] ." value=". $row['no_of_guests'] .">
 <input type='hidden' name='maxnoPpl_update' value=".$row['max_no_ppl'].">
 </div>
 <div class='form-group'>
 <label for='arrival_update'>Arrival Date:</label>
 <input class='form-control' type='date' id='arrival_update' required
 name='arrival_update' placeholder='Enter arrival date' value=". $row['arrival'] .">
 </div>
 <div class='form-group'>
 <label for='checkout_update'>Check-Out Date:</label>
 <input class='form-control' type='date' id='checkout_update' required
 name='checkout_update' placeholder='Enter checkout date' value=". $row['checkout'] .">
 </div>
 <div class='form-group'>
 <label for='comment_update'>Comment:</label>
 <textarea class='form-control' type='text' id='comment1_update' 
 name='comment_update' placeholder='Enter comment'>". $row['comments'] ."</textarea>
 </div>
 <div class='form-group'>
 <div class='row'>
 <div class='mx-auto'>
 <input type='hidden' name='bookingId' value=".$row['bookingId'].">
 <button class='btn btn-primary' formaction='viewbooking.php'>Back</button>
 <button class='btn btn-success' type='submit'>Confirm</button>
 </div>
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



