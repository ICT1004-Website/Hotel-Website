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
    </head>
    <body>
        <?php
             include "nav.inc.php";
         ?>
        <main class="container-fullwidth">
           <header class="jumbotron jumbotron-fluid text-center" style=" background-image: url(https://imgcy.trivago.com/c_limit,d_dummy.jpeg,f_auto,h_1300,q_auto,w_2000/uploadimages/33/20/33208426.jpeg);">
            <h1>Welcome to The Lodge</h1>
            <h2>AN EXCEPTIONAL HOTEL</h2>
            <p>Providing you the best living experience from the moment you step into our hotel.</p>
            <form class="form-inline">
            <div class="form-group" style="width:60px; margin:0 auto;">
            <label for="start">Start date:</label>
            <input class="form-control" type="date" name="start" id="start">  
            </div>
            <div class="form-group" style="width:60px; margin:0 auto;">
            <label for="end">End date:</label>
            <input class="form-control" type="date" name="end" id="end"> 
            </div>
            <div class="form-group" style="width:60px; margin:0 auto;">
            <button class="btn btn-primary" type="submit">Book Now</button>
            </div>
            </form>
            </header>
            
            <div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="https://www.marinabaysands.com/content/dam/singapore/marinabaysands/master/main/home/Revamp/new-homepage/rooms/Deluxe-room.jpg" alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Deluxe Room</h3>
        <p>First text</p>
        <button type="button" class="btn btn-primary btn-rounded waves-effect">Book Now</button>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://www.marinabaysands.com/content/dam/singapore/marinabaysands/master/main/home/Revamp/new-homepage/rooms/Premier-room.jpg" alt="Second slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Premier Room</h3>
        <p>Secondary text</p>
        <button type="button" class="btn btn-primary btn-rounded waves-effect">Book Now</button>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://www.marinabaysands.com/content/dam/singapore/marinabaysands/master/main/home/Revamp/new-homepage/rooms/Club-room.jpg" alt="Third slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Club Room</h3>
        <p>Third text</p>
        <button type="button" class="btn btn-primary btn-rounded waves-effect">Book Now</button>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
        <h1>Find Us Here</h1>
        <div class="mapouter">
        <style>.mapouter{position:relative;text-align:right;height:300px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:100%;}</style>
        <!--<style>iframe {width:100%;height:100%;}</style>-->
        <div class="gmap_canvas">
            <iframe width=100% height=100% id="gmap_canvas" src="https://maps.google.com/maps?q=sit%20nanyang&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen=""></iframe>
            <a href="https://www.whatismyip-address.com/divi-discount/"></a>
        </div>
        </div>
            </main>
        <?php
             include "footer.inc.php";
         ?>
    </body>
</html>
