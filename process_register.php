<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>The Lodge | Process Register</title>
        <?php
        include "head.inc.php"
        ?>
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
        <main class ="container">
            <?php
            $fname = $email = $pwd_hashed = $lname = $country = $errorMsg = "";
            $success = true;
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["fname"])) {
                    $fname = sanitize_input($_POST["fname"]);
                }

                if (empty($_POST["lname"])) {
                    $errorMsg .= "Last name is required.<br>";
                    $success = false;
                } else {
                    $lname = sanitize_input($_POST["lname"]);
                }
                if (empty($_POST["country"])) {
                    $errorMsg .= "Country is required.<br>";
                    $success = false;
                } else {
                    $country = sanitize_input($_POST["country"]);
                }
                if (empty($_POST["email"])) {
                    $errorMsg .= "Email is required.<br>";
                    $success = false;
                } else {
                    $email = sanitize_input($_POST["email"]);
// Additional check to make sure e-mail address is well-formed.
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errorMsg .= "Invalid email format.<br>";
                        $success = false;
                    } 
                }
                

                if (empty($_POST["pwd"]) || empty($_POST["pwd_confirm"])) {
                    $errorMsg .= "Password is required.<br>";
                    $success = false;
                } else {

                    if ($_POST["pwd"] != $_POST["pwd_confirm"]) {
                        $errorMsg .= "Passwords do not match.<br>";
                        $success = false;
                    } else {
                        $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
//                        saveMemberToDB($pwd_hashed);
                    }
                }
            } else {
                $success = false;
            }
            if ($success){
                saveMemberToDB();   
            }
            
            if ($success) {
                
                echo "<h1>Your registration is successful!</h1>";
                echo "<h3>Thank you for signing up, $fname $lname.</h3>";
                echo "<form action='login.php' method='post'>";
                echo "<div class='form-group'>
                    <button style='background-color:green' class='btn btn-primary' type='submit'>Log In</button>";
            } else {
                echo "<h1>Oops!</h1>";
                echo "<h3>The following errors were detected:</h3>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<form action='register.php' method='post'>";
                echo "<div class='form-group'>
                    <button style='background-color:red' class='btn btn-primary' type='submit'>Return to Sign Up</button>";
            }

//Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            /*
             * Helper function to write the member data to the DB
             */

            function saveMemberToDB() {
                global $fname, $lname, $email, $country, $pwd_hashed, $errorMsg, $success;
// Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
 //Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
// Prepare the statement:
                    $stmt = $conn->prepare("INSERT INTO the_lodge_member (fname, lname, country, pwd, emailAddress) VALUES (?, ?, ?, ?, ?)");
// Bind & execute the query statement:
                    $stmt->bind_param("sssss", $fname, $lname, $country, $pwd_hashed, $email);
                    if (!$stmt->execute()) {
                        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                        $success = false;
                    }
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