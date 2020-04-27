<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>manager</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <style>
      .b{
          background-image: url("background1.jpg");
          background-size: cover;
          background-repeat: none;
      }
      #index-banner{
          float: center;
      }
  </style>

</head>

<body class = "b">
  <nav class="orange n" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Manager</a>
      <nav class="orange" role="navigation">
        <ul class="right hide-on-med-and-down">
            <li><a href="welcome">HOME</a></li>
            <li><a href="manager">Manager</a></li>
            <li><a href="products">Make an Order</a></li>
            <li><a href="search">Search</a></li>
        </ul>
      </nav>
        <ul id="nav-mobile" class="sidenav">
          <li><a href="welcome">HOME</a></li>
          <li><a href="manager">Manager</a></li>
          <li><a href="products">Make an Order</a></li>
          <li><a href="search">Search</a></li>
        </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="container c">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center  " style = "color:indigo">Dashboard</h1>
        <br><br>
        <div class="row center">
            <div class="col s12 m6 l3">
                <a href="create" id="download-button" class="btn-large waves-effect waves-light orange darken-1">Add new menu item</a>
            </div>  
            <div class="col s12 m6 l3">
                <a href="allItems" id="download-button" class="btn-large waves-effect waves-light orange darken-1">View all items</a>
            </div> 
        
            <div class="col s12 m6 l3">
                <a href="edit" id="download-button" class="btn-large waves-effect waves-light orange darken-1">Update Inventory</a>
            </div>           
        
            <div class="col s12 m6 l3">
                <a href="report" id="button" class="btn-large waves-effect waves-light orange darken-1 circle">View Sales Report</a>
            </div>    
        </div>

      
        <br><br>
      </div>
    </div>
  </div>

  

  <!--
  <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
