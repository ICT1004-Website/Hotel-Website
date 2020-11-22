<html>
    <head>
        <title>The Lodge | Sign In</title>
        <?php
            include "head.inc.php";
        ?>
        <link rel="stylesheet" href="login.css">
    </head>
    
    <body>
        <?php
            include "nav.inc.php";
            //If user is logged in, redirect to view rooms page
            if(isset($_SESSION["memberid"])){
                header("Location: /ViewRoom.php");
                //Exit to stop content from loading
            exit;
            } else {
        ?>
        <header class="jumbotron jumbotron-fluid text-center" style=" background-image: url(https://imgcy.trivago.com/c_limit,d_dummy.jpeg,f_auto,h_1300,q_auto,w_2000/uploadimages/33/20/33208426.jpeg);">
            <h1 class="display-4">Sign In</h1>
            <h6>For existing members</h6>
        </header>
        
        <main class="container">
            <form class="login-form" action="process_login.php" method="post">
                <div class="form-group">
                    <?php
                        if(isset($_SESSION["logoutmsg"])) {
                            echo "
                                <div class=\"alert alert_success\">
                                  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                                  <strong>Error!</strong> " . $_SESSION['logoutmsg'] .  "
                                </div>";
                            //Reset session variables
                            session_unset();
                        }
                        //If email is set in session, an error has occured, display errors
                        if(isset($_SESSION["error"])) {
                            echo "
                                <div class=\"alert\">
                                  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                                  <strong>Error!</strong> " . $_SESSION['error'] .  "
                                </div>";
                        }
                    ?>
                    <label for="email"><b>Email</b></label>
                    <?php
                        //Check for invalid login attempt, place previously entered email if yes
                        if(isset($_SESSION["email"])) {
                            echo "<input class=\"form-control\" type=\"email\" id=\"email\" required name=\"email\" placeholder=\"Email\" value=\"".$_SESSION["email"]."\">";
                        } else {
                            echo "<input class=\"form-control\" type=\"email\" id=\"email\" required name=\"email\" placeholder=\"Email\">";
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="pwd"><b>Password</b></label>
                    <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Password">
                </div>
                <p>For new members, sign up <a href="/register.php">here</a>.</p>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </main>
        
        <br/>
        <?php
            include "footer.inc.php";
            }
         ?>
    </body>
</html>
