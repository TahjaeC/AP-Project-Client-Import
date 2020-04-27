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
          background-repeat: none;
      }
      #index-banner{
          float: center;
      }
      .c {
        margin: 0 auto;
        max-width: 30%;
        width: 90%;
      }
      @media only screen and (min-width: 601px) {
        .c {
          width: 30%;
        }
      }
      @media only screen and (min-width: 993px) {
        .c {
          width: 30%;
        }
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

<section class = "container c grey-text" width = "50%">
    <h2 style = "color:indigo;" class = "center">Add an Item</h2>
    <form class = "transparent orange" action="create" method="POST">
      @csrf

        <label class="indigo-text">Name of Menu Item: </label>
        <input type="text" name="name" value="">

        <label class="indigo-text">Cost: </label>
        <input type="text" name="cost" value="">

        <div class="input-field col s12 orange-text" >
          
            <select style = "color:orange;" name = "category">
              <option style = "color:orange;" value="" disabled selected><label style = "color:orange;" for="category" class="orange-text">Select a Category</label></option>
              <option value="beverage">Beverage</option>
              <option value="snack">Snack</option>
              <option value="daily surprise">Daily Surprise</option>
            </select>
        </div>
        <br>

        <label class="indigo-text">Initial Stock: </label>
        <input type="text" name="stock" value="">

        <label class="indigo-text">Item Image: </label>
        <input type="text" name="iimage" value="">

        <label class="indigo-text">ASL Image: </label>
        <input type="text" name="image" value="">

        <label class="indigo-text">Audio: </label>
        <input type="text" name="audio" value="">

        <label class="indigo-text">Creator: </label>
        <input type="text" name="creator" value="">


        <div class ="center">
            <input type="submit" name="submit" value="Add Menu Item" class ="btn brand z-depth-0 orange darken-1">
        </div>
    </form>
</section>

  

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
  <script>
    $(document).ready(function(){
    $('select').formSelect();
  });
  </script>

  </body>
</html>
