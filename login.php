<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                    <input class="form-control" type="email" id="email" required name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="pwd"><b>Password</b></label>
                    <input class="form-control" type="password" id="pwd" required name="pwd" placeholder="Password">
                </div>
                <p>For new members, sign up <a href="#">here</a>.</p>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
        </main>
        <br/>
        <?php
             include "footer.inc.php";
         ?>
    </body>
</html>
