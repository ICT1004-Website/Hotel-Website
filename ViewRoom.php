<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>The Lodge | Suites</title>
        <?php
        include "head.inc.php"
        ?>
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
        <header class="jumbotron jumbotron-fluid text-center" style=" background-image: url(https://imgcy.trivago.com/c_limit,d_dummy.jpeg,f_auto,h_1300,q_auto,w_2000/uploadimages/33/20/33208426.jpeg);">
            <h1>Rooms & Suites</h1>               
        </header>

    </header>
    <main class="container-fluid">
        <section>
            <div class="row">
                <article class="col-sm">                    
                    <h3>Cozy Room</h3>
                    <figure>                            
                        <img class="d-block w-100" 
                             src="images/single_room.jpg" 
                             alt="Single Room"
                             title="View larger image..."/>
                        <figcaption>Single Room</figcaption>
                    </figure>
                    <p>
                        Our Cozy Room brings out comfort and the feel of your "home". 
                    </p>
                </article>
                <article class="col-sm">
                    <h3>Summer Room</h3>
                    <figure>
                        <img class="d-block w-100"
                             src="images/double_room.jpg" 
                             alt="double_room"
                             title="View larger image..."/>
                        <figcaption>Double Room</figcaption>
                    </figure>
                    <p>
                        Our Summer Rooms are themed in subtle hues for an atmosphere of relaxed, modern elegance.
                    </p>
                </article>
            </div>
        </section>
        <section>
            <div class="row">                      
                <article class="col-sm">
                    <h3>Royal Suites</h3>
                    <figure>
                        <img class="d-block w-100" 
                             src="images/suites.jpg" 
                             alt="Suites"
                             title="View larger image..."/>
                        <figcaption>Suites</figcaption>
                    </figure>
                    <p>
                        The Royal Suite evokes a sense of couture 
                        elegance drawn from the opulent history of classical styles. 
                        Reside in style in the generously proportioned one-bedroom suite
                        that comes with a spacious living room.
                    </p>
                </article>
                <article class="col-sm">
                    <h3>Elegant Studio</h3>
                    <figure>
                        <img class="d-block w-100" 
                             src="images/studio.jpeg" 
                             alt="Studio"
                             title="View larger image..."/>
                        <figcaption>Studio</figcaption>
                    </figure>
                    <p>
                        A space saving invention of this studio provides 2 level platform
                        that allows you to read a book while enjoying the view at the top level. 
                    </p> 
                </article>
            </div>
            <div class="row">
                <article class="col-sm">
                    <h3>Picturesque Villa</h3>
                    <figure>
                        <img class="d-block w-100" 
                             src="images/villa.jpg" 
                             alt="Villa"
                             title="View larger image..."/>
                        <figcaption>Villa</figcaption>
                    </figure>
                    <p>
                        Picturesque Villa will take your breath away as you enjoy the breathtaking views
                        and scenery in the open concept room.
                    </p>
                </article>
            </div>
        </section>
    </main>
    <?php
    include "footer.inc.php";
    ?>
</body>
</html>

    
