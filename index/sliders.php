<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>liteAccordion - a horizontal accordion plugin for jQuery</title>
        <style>
            /* css for this page */
            body { font: 14px/24px 'Helvetica Neue', Arial, sans-serif; color: #333; width: 960px; margin: 30px auto 60px; background: #eee }
            body > h2 { margin: 30px 0 15px; text-shadow: 1px 1px 0 white; border-bottom: 2px solid #333; padding-bottom: 5px }
            h1 { text-align: center; margin-bottom: 30px; text-shadow: 1px 1px 0 white }
            strong + p { margin-top: 0 }
            dt { font-weight: bold }
            dd { margin: 0 }
            figure { display: block; width: 100%; height: 100%; margin: 0 }
            figcaption { padding: 10px 15px; position: absolute; bottom: 20px; right: 30px; z-index: 3; background: black; background: rgba(0,0,0,0.7); color: white;
                -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px }   
        </style>

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
                <li>
                    <h2><span>Slide One</span></h2>
                    <div>
                        <img src="img-demo/1.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Two</span></h2>
                    <div>
                        <img src="img-demo/2.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Three</span></h2>
                    <div>
                        <img src="img-demo/3.jpg" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Four</span></h2>
                    <div>
                        <img src="img-demo/4.jpg" width="768" alt="image" />
                    </div>
                </li>
                <li>
                    <h2><span>Slide Five</span></h2>
                    <div>
                        <img src="img-demo/5.jpg" alt="image" />
                    </div>
                </li>
            </ol>
            <noscript>
                <p>Please enable JavaScript to get the full experience.</p>
            </noscript>
        </div>

        <script>
            (function($) {
              
                $('#four').liteAccordion({ theme : 'light', firstSlide : 1, easing: 'easeOutBounce', activateOn: 'mouseover', rounded : true, autoPlay : true,cycleSpeed : 600, pauseOnHover : true, easing : 'swing'});
            })(jQuery);  
        </script>

    </body>
</html>