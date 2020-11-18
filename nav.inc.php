<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img alt="Qries" src="https://raw.githubusercontent.com/ICT1004-Website/Hotel-Website/main/logo.png"
         width=100" height="40">
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#dogs">Dogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#cats">Cats</a>
      </li>
      <?php
        if(isset($_SESSION["memberid"])){
      ?>
            <li class="nav-item">
                <a class="nav-link" href="#">View Bookings</a>
            </li>
      <?php
        }
      ?>
    </ul>
      <ul class="navbar-nav ml-auto">
       <li class="nav-item">
           <a class="nav-link" href="register.php">
                <span class="material-icons">account_circle</span>
           </a>
           
      </li>
      <?php
        if(isset($_SESSION["memberid"])){
      ?>
       <li class="nav-item">
           <a class="nav-link" href="logout.php">
               <span class="material-icons">login</span>
           </a>
      </li>
      <?php
        } else {
      ?>
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
