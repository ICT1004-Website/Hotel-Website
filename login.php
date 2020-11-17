<?php
session_start();

//If user is logged in, redirect to logout page
if(isset($_SESSION["memberid"])){
    header("Location: /logout.php");
    //Exit to stop content from loading
    exit;
}
?>
<html>
    <head>
        <?php
            include "head.inc.php";
        ?>
        <title>The Lodge | Sign In</title>
    </head>
    
    <body>
        <?php
             include "nav.inc.php";
        ?>
        
        <header class="jumbotron text-center" style="background-color: grey;">
            <h1 class="display-4">Sign In</h1>
            <h6>For existing members</h6>
        </header>
        
        <main class="container">
            <form action="" method="post" style="margin-left: 25%;margin-right: 25%;">
                <div class="form-group">
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
         ?>
    </body>
</html>
