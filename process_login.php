<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>The Lodge | Welcome</title>
        <?php
        include "head.inc.php"
        ?>
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
            <?php
            $email = "";
            $errorMsg = "";
            $success = true;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["email"])) {
                    //The dot equals ".=" is a contatenation equals operator
                    $errorMsg .= "Email is required. ";
                    $success = false;
                } else {
                    $email = sanitize_input($_POST["email"]);

                    //Additional check to make sure e-mail address is well-formed.
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errorMsg .= "Invalid email format. ";
                        $success = false;
                    }
                }

                if (empty($_POST["pwd"])) {
                    $errorMsg .= "Password is required. ";
                    $success = false;
            }}
            
                else {
                    $success = false;
                }
                if ($success) {
                    authenticateUser();
                }


                if ($success) {
                    //Clear previous session variables
                    session_unset();
                    //Add session variable for member id and email
                    $_SESSION["memberid"] = $memberid;
                    $_SESSION["email"] = $email;
                    $_SESSION["fname"] = $fname;
                    $_SESSION["lname"] = $lname;
                    include "head.inc.php";
                    echo "<title>The Lodge | Member</title>";
                    echo "<header class=\"jumbotron jumbotron-fluid text-center\" style=\" background-image: url(https://imgcy.trivago.com/c_limit,d_dummy.jpeg,f_auto,h_1300,q_auto,w_2000/uploadimages/33/20/33208426.jpeg);\">";
                    echo "<h1 class=\"display-4\">" . $fname . " " . $lname . ",<br> welcome back to The Lodge</h1>";
                    echo "<br><h6>To view our rooms, click <a href=\"/ViewRoom.php\">here</a></h6>";
                    echo "</header>";
                    echo "<br><br>";
                } else {
                    //Set error messages into session
                    $_SESSION['error'] = $errorMsg;
                    $_SESSION['email'] = $email;
                    //Redirect to login page
                    header("Location: /project/login.php");
                    exit;
                }

                function sanitize_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                function authenticateUser() {
                    global $memberid, $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
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
                            $pwd_hashed = $row["pwd"];
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
                    $fname = "Zhong Yi"; $lname = "Kee"; $email = "m@genmcorp.net"; $memberid = 1;
                }
                ?>
            <?php
            include "footer.inc.php";
            ?>
    </body>
</html>
