<?php

$errorMsg = "";
$success = true;


if (empty($_POST["email"])) {
    //The dot equals ".=" is a contatenation equals operator
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);
    
    //Additional check to make sure e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    }
}

if (empty($_POST["fname"])) {
    
    $errorMsg .="First name is required.<br>";
    $success = false;
         
}
else{
    sanitize_input($_POST["fname"]);
}
  





function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function authenticateUser()
{
    global $fname, $lname, $email, $errorMsg, $success;
    // Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
    $config['password'], $config['dbname']);
    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        //Enter db name here
        $stmt = $conn->prepare("SELECT * FROM the_lodge_member WHERE emailAddress=?");
        // Bind & execute the query statement:
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Note that email field is unique, so should only have
            // one row in the result set.
            $row = $result->fetch_assoc();
            $memberid = $row["memberId"];
            $fname = $row["fname"];
            $lname = $row["lname"];
         
        $stmt->close();
    }
    $conn->close();
}

?>