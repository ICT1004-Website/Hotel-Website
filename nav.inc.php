<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img alt="the lodge" src="/images/logo.png"
             width=100" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ViewRoom.php">Rooms & Suites</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="facilities.php">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About us</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <?php
            if (isset($_SESSION["memberid"])) {
                ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">View Bookings</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">
                        <span class="material-icons">account_circle</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <span class="material-icons">login</span>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>



    </div>
</nav>
