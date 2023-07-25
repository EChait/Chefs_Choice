<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
   
    <script src="jquery.slimmenu.min.js">$('#navigation').slimmenu(
{
    resizeWidth: '800',
    collapserTitle: 'Main Menu',
    animSpeed: 'medium',
    easingEffect: null,
    indentChildren: false,
    childrenIndenter: '&nbsp;'
});</script>
  </head>
  <body>
    <a href='index.php'>
        <img class="logo" src="logo.jpg" alt=""/>
    </a>
    <?php include "menu.php"; ?>
    <hr />