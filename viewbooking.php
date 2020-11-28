
<html>
         <?php
             include "head.inc.php";
         ?>
    
   
<body>
    <?php
     include "nav.inc.php";
    ?>
    <header class="jumbotron text-center" style="background-color: grey;">
    <h1>View Booking</h1>
    <p>View booking history, update or cancel current booking anytime, anywhere.</p>
    </header>
    <main class="container">
<?php

echo "<h1>Booking History</h1>";
 $config = parse_ini_file('../../private/db-config.ini');
 $conn = new mysqli($config['servername'], $config['username'],
 $config['password'], $config['dbname']);
 
// check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//SQL Statement 
$memberid=$_SESSION["memberid"];
$result = mysqli_query($conn,"SELECT * FROM the_lodge_booking WHERE arrival <= CURDATE() AND memberId='$memberid'");
$totalRows_results = mysqli_num_rows($result);  
//if there are data returned from the database
if($totalRows_results > 0) { 
echo "<div class='table-responsive'>
<table class='table table-hover'>
<thead>
<tr>
<th>Booking ID</th>
<th>Room No</th>
<th>No of Guest</th>
<th>Arrival Date</th>
<th>Checkout Date</th>
</tr>
<thead/>
<tbody>";

// fetch data from database and display it
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['bookingId'] . "</td>";
echo "<td>" . $row['room_no'] . "</td>";
echo "<td>" . $row['no_of_guests'] . "</td>";
echo "<td>" . $row['arrival'] . "</td>";
echo "<td>" . $row['checkout'] . "</td>";

 echo "<td><form action='bookingHistory.php' method='post'>
      <div class='form-group'>
      <input type='hidden' name='bookingId' value=".$row['bookingId'].">
      <button class='btn btn-primary' type='submit'>View Booking</button>
      </div>
      </form>
       </td>";
 
echo "</tr>";
   }
 }
echo "</tbody>";
echo "</table>";
echo "</div>";
//if there are no data returned from the database
if($totalRows_results == 0)
{
echo "<p style='text-align: center;'>No Records Found</p>";

}

mysqli_close($con);
?>
<?php

echo "<h1>Current Booking</h1>";
 // Create database connection.
 $config = parse_ini_file('../../private/db-config.ini');
 $conn = new mysqli($config['servername'], $config['username'],
 $config['password'], $config['dbname']);
 
// check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// SQL statement
$memberid=$_SESSION["memberid"];
$result = mysqli_query($conn,"SELECT * FROM the_lodge_booking WHERE arrival > CURDATE() AND memberId='$memberid'");
$totalRows_results = mysqli_num_rows($result);  
//if there are data returned from the database
if($totalRows_results > 0) { 
echo "<div class='table-responsive'>
<table class='table table-hover'>
<thead>
<tr>
<th>Booking ID</th>
<th>Room No</th>
<th>No of Guest</th>
<th>Arrival Date</th>
<th>Checkout Date</th>
</tr>
<thead/>
<tbody>";
// fetch data from database and display it
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['bookingId'] . "</td>";
echo "<td>" . $row['room_no'] . "</td>";
echo "<td>" . $row['no_of_guests'] . "</td>";
echo "<td>" . $row['arrival'] . "</td>";
echo "<td>" . $row['checkout'] . "</td>";

 echo "<td><form action='updatebooking.php' method='post'>
      <div class='form-group'>
      <input type='hidden' name='bookingId' value=".$row['bookingId'].">
      <button class='btn btn-success' type='submit'>Update Booking</button>
      </div>
      </form>
       </td>";
 
echo "<td><form action='process_deletebooking.php' method='post'>
      <div class='form-group'>
      <input type='hidden' name='bookingId' value=".$row['bookingId'].">
      <button class='btn btn-danger' type='submit'>Cancel Booking</button>
      </div>
      </form>
       </td>";
echo "</tr>";
   }
 }
echo "</tbody>";
echo "</table>";
echo "</div>";


//if there are no data returned from the database
if($totalRows_results == 0)
{
echo "<p style='text-align: center;'>No Records Found</p>";

}

mysqli_close($conn);
?>


 
    </main>
    <?php
 include "footer.inc.php";
 ?>
</body>
</html>






