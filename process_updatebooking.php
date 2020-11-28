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

$errorMsg = "";
$success = true;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  //sanitize user input for comment
  if (empty($_POST["comment_update"]))
  {
      $success = true;
      
  }
  else
  {
      $comment = sanitize_input($_POST["comment_update"]);
      //$comment=filter_var($_POST["comment_update"], FILTER_SANITIZE_STRING);
      if (preg_match('/^[a-zA-Z0-9-,. ]+$/', $comment))
      {
          $success = true;
      } else {
          $errorMsg .= "Invalid comment. <br>Please enter only alphabet, numbers, comma, fullstop or dash.<br>";
         $success = false;
      }
     
  }
 
  //sanitize user input for Booking ID
  if (empty($_POST["bookingId_update"]))
  {
   $errorMsg .= "Booking ID is required.<br>";
   $success = false;
  }
  else
  {
    $bookingId = sanitize_input($_POST["bookingId_update"]);
  }
  //sanitize user input for No of guest
  if (empty($_POST["guestNo_update"]))
  {
   $errorMsg .= "No of guests is required.<br>";
   $success = false;
  }
  else
  {
    $guestNo = sanitize_input($_POST["guestNo_update"]);
    $maxnoPpl= sanitize_input($_POST["maxnoPpl_update"]);
    if(!filter_var($guestNo,FILTER_SANITIZE_NUMBER_INT)){
      $errorMsg .= "Invalid format for no of guests.<br>";
      $success = false;
    } else if(1>$guestNo || $guestNo>$maxnoPpl){
       $errorMsg .= "Invalid no of guests.<br>";
       $success = false;
    }
  
  }
  //sanitize user input for Arrival Date
  if (empty($_POST["arrival_update"]))
  {
   $errorMsg .= "Arrival date is required.<br>";
   $success = false;
  }
  else
  {    
    $arrivaldate = sanitize_input($_POST["arrival_update"]);
    $arrivaldate_validate = date("Y-m-d", strtotime($arrivaldate));
 
  $date_now = date("Y-m-d H:i:s");;
  $myregex = "~^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$~";

 if (!filter_var($arrivaldate_validate,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=> $myregex))))
   {
   $errorMsg .= "Invalid arrival date format.<br>";
   $success = false;
   }
   if ($date_now > $arrivaldate) {
   $errorMsg .= "Invalid arrival date.<br>";
   $success = false;
   } 
   }
   //sanitize user input for Checkout Date
   if (empty($_POST["checkout_update"]))
  {
   $errorMsg .= "Checkout date is required.<br>";
   $success = false;
  }
  else
  {
       
    $date_now = date("Y-m-d H:i:s");
    $checkoutdate = sanitize_input($_POST["checkout_update"]);
    $checkoutdate_validate = date("Y-m-d", strtotime($checkoutdate));
    $myregex = "~^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$~";

 if (!filter_var($checkoutdate_validate,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=> $myregex))))
   {
   $errorMsg .= "Invalid check-out date format.<br>";
   $success = false;
   }
   if ($date_now > $checkoutdate) {
    $errorMsg .= "Invalid check-out date.<br>";
    $success = false;
   }
  }
     
 
 if ($success)
   {   
   //Vaild Input
   echo "<h2>Your booking is updated!</h2>";
   echo "<form action='viewbooking.php' method='post'><div class='form-group' display: flex;
  justify-content: center;><button class='btn btn-success'>Return to View Booking</button></div></form>";
     authenticate();
   }
   else
   {
    //Invaid Input
    echo "<h2>Oops!</h2>";
    echo "<h4>The following errors were detected:</h4>";
    echo "<p>" . $errorMsg . "</p>";
    echo "<form action='viewbooking.php' method='post'><div class='form-group'><button class='btn btn-warning' id='button2'>Return to View Booking</button></div></form>";
   }
}
  
  function sanitize_input($data)
{
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
//Helper function that checks input for malicious or unwanted content.

function authenticate()
{
 global $comment,$guestNo,$bookingId, $arrivaldate, $checkoutdate, $errorMsg, $success;
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
  //get the sanitize input
  $comment=$_POST["comment_update"];
  $guestNo=$_POST["guestNo_update"];
 $bookingId=$_POST["bookingId_update"];
 $arrival_update=$_POST["arrival_update"];
 $checkout_update=$_POST["checkout_update"];
 // Prepare the statement:
 $stmt = $conn->prepare("UPDATE the_lodge_booking SET comments=?, no_of_guests=?, arrival=?, checkout=? WHERE bookingId=?");
 $stmt->bind_param("sissi", $comment,$guestNo,$arrival_update,$checkout_update,$bookingId);
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

