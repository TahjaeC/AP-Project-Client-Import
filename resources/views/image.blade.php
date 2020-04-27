<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Search Results</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style>
        .b{
      background-image: url("background1.jpg");
      background-repeat: none;
      background-attachment: fixed;
  }
        </style>
    </head>

    <body class="b">

        <nav class="orange" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="/" class="brand-logo white-text">C.U.P.S</a>
                    <ul class="right">
                        <a class="waves-effect waves-light btn-small indigo" href=" {{route('cart.index') }}"> <i class="material-icons left">add_shopping_cart</i> Cart </a>
                    </ul>
                        <ul class="right">
                            <div class="row">
                                <form class="col s12" action="{{route('searchByName')}}" method="GET">
                                    <div class="row">
                                            <div class="input-field col s6">
                                                <input id="query" type="text" class= "white" style="border-radius:20px" placeholder=" Find..." style="color: black" name="query">
                                            </div>
                                            <div class="input-field col s6">
                                                <button class="waves-effect waves-light btn-small indigo" type="submit">Search</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </ul>
            </div>
        </nav>

        <h3 class="center-align white-text">Image Search Results</h3>

        <div class="center">
            <div class="container">
                <input type='file' onchange="readURL(this);"/>
                <img id="pic" src="#" alt="" style="color:white"/>
                <a href="#" class="btn indigo darken-2">Add to Cart</a>
            </div>
            <br>
            <br>
            <div class = "center"><a href="{{ url('/home') }}" class="waves-effect waves-light btn-large indigo center"><i class="material-icons left">arrow_back</i>Back to All Products</a></div>
            <p></p>
        </div>

        <!-- Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/mylogic.js"></script>

    </body>
</html>
