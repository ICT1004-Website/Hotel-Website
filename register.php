<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Hotel</title>
        <?php
        include "head.inc.php"
        ?>
    </head>
    <body>
    <body>

        <main class="container">
            <h1>Register</h1>
            
            <form action="process_register.php" method="post">
                <div class="form-group">
                    <label  for="fname">First Name:</label>
                    <input class="form-control" type="text" id="fname"
                           name="fname" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="lname">*Last Name:</label>
                    <input class="form-control" type="text" id="lname"
                           maxlength="45" required name="lname" placeholder="Enter last name">
                </div>
                <div class="form-group">
                    <label for="email">*Email:</label>
                    <input class="form-control"  id="email"
                           required name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">*Password:</label>
                    <input class="form-control" type="password" id="pwd"
                           required name="pwd" placeholder="Enter password"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                           title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                           onchange="checkPassword()"
                           >
                </div>
                <p style="color:blue; text-align:left;">Note: Password must contain a capital letter, a special character and a digit. Password length must be minimum 8 characters.</p>
                <div  class="form-group">
                    <label for="pwd_confirm">*Confirm Password:</label>
                    <input class="form-control" type="password" id="pwd_confirm"
                           required name="pwd_confirm" placeholder="Confirm password" onkeyup="checkPassword()">
                </div>
                <div class="form-check">
                    <label>
                        <input type="checkbox" required name="agree">
                        Agree to terms and conditions.
                    </label>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              
            </form>
            <p>
                For existing members, please go to the
                <a href="login.php">Sign In page</a>.
            </p>
        </main>
        

    </body>
</body>
</html>

