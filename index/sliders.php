        <!-- liteAccordion css -->
        <link href="style/liteaccordion.css" rel="stylesheet" />

        <!-- jQuery -->        
        <script src="js/jquery.min.js"></script>

        <!-- easing -->
        <script src="js/jquery.easing.1.3.js"></script>

        <!-- liteAccordion js -->
        <script src="js/liteaccordion.jquery.js"></script>

        <!--[if lt IE 9]>
            <script>
                document.createElement('figure');
                document.createElement('figcaption');           
            </script>
        <![endif]-->         
    </head>
    <body>
      
        <div id="four">
            <ol>
 <?php
mysql_connect("localhost", "root", "");
mysql_select_db("Poupipou");
// On récupère les cinq dernières news.
$retour = mysql_query('SELECT * FROM news ORDER BY id DESC LIMIT 0, 5');
while ($donnees = mysql_fetch_array($retour))
{
   
      ?>
                <li>
                    <h2><span><?php echo $donnees['titre']; ?></span></h2>
                    <div>
                        <img src="images/<?php echo $donnees['img']; ?>" alt="image" />
                        <figcaption><?php echo $donnees['contenu']; ?></figcaption>
                    </div>
                </li>
                
           <?php
}
?>
               <!-- <li>
                    <h2><span>Fouquet's</span></h2>
                    <div>
                        <img src="img-demo/2.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Léon</span></h2>
                    <div>
                        <img src="img-demo/3.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Créperie Josselin</span></h2>
                    <div>
                        <img src="img-demo/4.jpg" width="768" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Vin & Marée</span></h2>
                    <div>
                        <img src="img-demo/5.jpg" alt="image" />
                    </div>
                </li> -->
            </ol>
            <noscript>
                <p>Please enable JavaScript to get the full experience.</p>
            </noscript>
        </div>

        <script>
            (function($) {
              
                $('#four').liteAccordion({ theme : 'light', firstSlide : 1, easing: 'easeOutBounce', activateOn: 'mouseover', rounded : true, autoPlay : true,cycleSpeed : 6000, pauseOnHover : true, easing : 'swing'});
            })(jQuery);  
        </script>

    </body>
</html>