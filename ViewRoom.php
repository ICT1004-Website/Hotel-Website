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
        <?php
        include "nav.inc.php";
        ?>
        <header class="jumbotron text-center">
            <h1 class="display-4">Overview</h1>
            <h2>Suites</h2>

        </header>
        <main class="container">
            <section>
                <div class="row">
                    <article class="col-sm">                    
                        <h3>White suites</h3>
                        <figure>                            
                            <img class = "img-thumbnail" 
                                 src="images/1st room.jpg" 
                                 alt="White suites"
                                 title="View larger image..."/>
                            <figcaption>White suites</figcaption>
                        </figure>
                        <p>
                            White suites
                        </p>
                    </article>
                    <article class="col-sm">
                        <h3>White suites</h3>
                        <figure>
                            <img class="img-thumbnail" 
                                 src="images/2nd room.jpg" 
                                 alt="Grand Suites"
                                 title="View larger image..."/>
                            <figcaption>Grand Suites</figcaption>
                        </figure>
                        <p>
                            Grand Suites
                        </p>
                    </article>
                </div>
            </section>
            <section>
                <div class="row">                      
                    <article class="col-sm">
                        <h3>Family Suites</h3>
                        <figure>
                            <img class="img-thumbnail" 
                                 src="images/3rd room.jpg" 
                                 alt="Family Suites"
                                 title="View larger image..."/>
                            <figcaption>Family Suites</figcaption>
                        </figure>
                        <p>
                            Family Suites
                        </p>
                    </article>
                    <article class="col-sm">
                        <h3>Romantica Suites</h3>
                        <figure>
                            <img class="img-thumbnail" 
                                 src="images/4th room.jpg" 
                                 alt="Calico"
                                 title="View larger image..."/>
                            <figcaption>Romantica Suites</figcaption>
                        </figure>
                        <p>
                            Romantica Suites
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
    