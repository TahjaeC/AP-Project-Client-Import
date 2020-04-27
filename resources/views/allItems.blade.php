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
      .card {
        border-radius: 25px;
        float:left;
        margin: 1.5%;
        width: 30%;
      }
      
      .t{
        background-color: rgba(255,255,255,0.3);
      }
      }.wrapper {
        max-width: 1140px;
        padding: 10px;
        margin: 10px auto;
        vertical-align: middle;
        background: blurred;
      }.product-index h1 {
        margin-bottom: 10px;
      }

      .product-index .product-item {
        margin: 10px 0;
        padding: 10px;
        vertical-align: middle;
        background: #f4f4f4;
      }

      .product-index .product-item img {
        
        vertical-align: sub;
        display: inline-block;
      }

      .product-index .product-item h4 {
        display: inline-block;
        font-weight: normal;
        margin-left: 20px;
      }

      .product-index .product-item h4 a {
        color: #777;
        text-decoration: none !important;
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

 
<section class = "container align-center">
    <h2 class = "center"style = "color:indigo;">All Items</h2>
    <br><br><br>
    <div class="wrapper t z-depth-4 product-index">          
      <table style = "color:black;" class="table striped">
        <thead >
          <tr>
            <th>ASL</th>
            <th>Item</th>
            <th>Item Number</th>
            <th>Name</th>
            <th>In Stock</th>
            <th>Cost</th>
            <th>Audio</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $prod)
          <tr>
            <td><img class= "img1 circle materialboxed" height="50px" width="50px" src="{{ asset($prod->image) }}"></td>
            <td><img class= "img1 circle materialboxed" height="50px" width="50px" src="{{ asset($prod->item_image) }}"></td>
            <td> {{ $prod->id }}</td>
            <td> {{ $prod->name }}</td>
            <td> {{ $prod->stock }}</td>
            <td> {{ $prod->cost }}</td>
            <td><audio controls><source src="{{$prod->audio}}" type="audio/mpeg"> </audio></td>
            <td>
            <form action="allItems/{{ $prod->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button class=" btn indigo darken-2">Delete</button>
            </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
</section>

<div class="container">
  <p class="message center orange-text">{{ session('message')}}</p>
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
  <script>
    $(document).ready(function(){
    $('.materialboxed').materialbox();
    });
  </script>

  </body>
</html>
