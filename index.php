<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="styles.css">
    <?php include "header.php"; ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="responsiveslides.min.js"></script>
    <script>
      $(function() {
          
        $('.rslides').responsiveSlides({
          auto: true,             // Boolean: Animate automatically, true or false
          speed: 500,            // Integer: Speed of the transition, in milliseconds
          timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
          pager: false,           // Boolean: Show pager, true or false
          nav: false,             // Boolean: Show navigation, true or false
          random: false,          // Boolean: Randomize the order of the slides, true or false
          pause: false,           // Boolean: Pause on hover, true or false
          pauseControls: true,    // Boolean: Pause when hovering controls, true or false
          prevText: "Previous",   // String: Text for the "previous" button
          nextText: "Next",       // String: Text for the "next" button
          maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
          navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
          manualControls: "",     // Selector: Declare custom pager navigation
          namespace: "rslides",   // String: Change the default namespace used
          before: function(){},   // Function: Before callback
          after: function(){}     // Function: After callback
        });
      });
    </script>
</head>
    
<h1>Our Specials!</h1>
<ul class="rslides">
    <li><img src="sandwhich 1.jpg" alt=""></li>
    <li><img src="Create-Your-Own-Salad (1).jpg" alt=""></li>
    <li><img src="Veggie-Toasty.jpg" alt=""></li>
</ul>

<footer>
<?php include "footer.php"; ?>
</footer>



