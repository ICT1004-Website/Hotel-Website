<?php
session_start();

//$email = "";
$errorMsg = "";
$success = true;

include "head.inc.php";
echo "<title>The Lodge | Member</title>";

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

if (empty($_POST["pwd"])) {
    $errorMsg .= "Password is required.<br>";
    $success = false;
}

echo "<body>";
include "nav.inc.php";
echo "<br><main class=\"container\">";

if ($success) {
    authenticateUser();
}

if ($success) {
    $_SESSION["memberid"] = $memberid;
    $_SESSION["email"] = $_POST["email"];
    echo "<h3>" . $fname . " " . $lname. ", welcome back to The Lodge</h3>";
    echo "<a href=\"ViewRoom.php\"><button class=\"btn btn-success\">View rooms</button></a>";
} else {
    $_SESSION['error'] = $errorMsg;
    header("Location: /login.php");
    exit;
}

echo "<br><br>";
include "footer.inc.php";
echo "</main>";
echo "</body>";

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function authenticateUser()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
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
            $pwd_hashed = $row["password"];
            // Check if the password matches:
            if (!password_verify($_POST["pwd"], $pwd_hashed)) {
                $errorMsg = "Invalid email/password!";
                $success = false;
            }
        } else {
            $errorMsg = "Invalid email/password!";
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}
?>