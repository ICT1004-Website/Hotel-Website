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
  $success = true;
  
 if ($success)
   {   
   //Vaild Input
   echo "<h2>Your booking is cancelled!</h2>";
   echo "<form action='viewbooking.php' method='post'><div class='form-group'><button class='btn btn-danger'>Return to View Booking</button></div></form>";
   authenticate();
   }
   else
   {
    //Invaild Input
    echo "<h2>Oops!</h2>";
    echo "<h4>The following errors were detected:</h4>";
    echo "<p>" . $errorMsg . "</p>";
    echo "<form action='viewbooking.php' method='post'><div class='form-group'><button class='btn btn-warning' id='button2'>Return to View Booking</button></div></form>";
   }
   
  
  
//Helper function that checks input for malicious or unwanted content.

function authenticate()
{
 global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
 // Create database connection.
 $config = parse_ini_file('../../private/db-config.ini');
 $conn = new mysqli($config['servername'], $config['username'],
 $config['password'], $config['dbname']);
 // Check connection
 if ($conn->connect_error)
 {
 $errorMsg = "Connection failed: " . $conn->connect_error;
 $success = false;
 }
 else
 {
 //get Booking ID from previous page
 $bookingid=$_POST["bookingId"];
 // Prepare the statement:
 $stmt = $conn->prepare("DELETE FROM the_lodge_booking WHERE bookingId=?");
 $stmt->bind_param("i", $bookingid);
 // Bind & execute the query statement:
  if (!$stmt->execute())
 {
 $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
 $success = false;
 }
 $stmt->execute();
 $stmt->close();
 
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




