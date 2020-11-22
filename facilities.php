<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>The Lodge | Facilities</title>
        <?php
        include "head.inc.php"
        ?>
        <link rel="stylesheet" href="facilities.css">
    </head>
    <body>
        <?php
        include "nav.inc.php";
        ?>
        <header class="jumbotron jumbotron-fluid text-center" style=" background-image: url(https://imgcy.trivago.com/c_limit,d_dummy.jpeg,f_auto,h_1300,q_auto,w_2000/uploadimages/33/20/33208426.jpeg);">
            <h1>Facilities</h1>
            <p>The lodge offers a wide range of facilities.<br/>Providing you with the greatest comfort during your stay.</p>
        </header>

        <main class="container-fluid">
            <section>
                <div class="row">
                    <article class="col-sm facility">
                        <figure class="facil-left">                            
                            <img class="d-block w-100" 
                                 src="images/dining.jpg" 
                                 alt="Dining"
                                 title="Dining"/>
                        </figure>
                        <h3>Dining</h3>
                        <p>With our specially curated menu, enjoy as our chefs serve up dishes ranging from local to international cuisines.</p>
                    </article>
                </div>
            </section>
            <section>
                <div class="row">
                    <article class="col-sm facility">
                        <figure class="facil-right">                            
                            <img class="d-block w-100" 
                                 src="images/pool.jpg" 
                                 alt="Pool"
                                 title="Poolside"/>
                        </figure>
                        <h3>Outdoor Swimming Pool</h3>
                        <p>Enjoy the scenery while relaxing by the poolside, or indulge yourself by taking a dip in the jacuzzi.</p>
                        <p>Operating hours: <br/> Weekdays: 6:30am to 9:00pm <br/> Weekends: 7:00am to 10:00pm</p>
                    </article>
                </div>
            </section>
            <section>
                <div class="row">
                    <article class="col-sm facility">
                        <figure class="facil-left">                            
                            <img class="d-block w-100" 
                                 src="images/gym.jpg" 
                                 alt="Gym"
                                 title="Fitness Center"/>
                        </figure>
                        <h3>Fitness Center</h3>
                        <p>Give yourself a good workout at our gym. Equipped with state-of-the-art facilities, casual users and fitness enthusiasts alike will find what they need here.</p>
                        <p>Open from 6:00am to 10:00pm daily.</p>
                    </article>
                </div>
            </section>
        </main>
        <br/>
    <?php
    include "footer.inc.php";
    ?>
</body>
</html>

    
