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
                        <a class="waves-effect waves-light btn-small indigo" href="cart"> <i class="material-icons left">add_shopping_cart</i> Cart <span class="badge white-text" data-badge-caption={{ count((array) session('cart')) }}></span></a>
                    </ul>
                        <ul class="right">
                            <div class="row">
                                <form class="col s12" action="{{route('search')}}" method="GET">
                                    <div class="row">
                                            <div class="input-field col s6">
                                                <input id="query" type="text" class= "white" style="border-radius:20px" placeholder="Text Search..." style="color: black" name="query">
                                            </div>
                                                <div class="input-field col s6">
                                                    <button class="waves-effect waves-light btn-small indigo" type="submit">Search text</button>
                                                </div>
                                    </div>
                                </form>
                            </div>
                        </ul>
                    <!-- Dropdown Trigger -->
                    <ul class="right">
                        <a class='dropdown-trigger btn-small indigo' href='#' data-target='dropdown1'>Advanced Search</a>
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="audio"><i style="color: indigo" class="material-icons right">play_arrow</i>Audio</a></li>
                            <li><a href="{{route('image')}}"><i style="color: indigo" class="material-icons right">add_a_photo</i>Image</a></li>
                        </ul>
                    </ul>
            </div>
        </nav>

        <h3 class="center-align white-text">Text Search Results</h3>

            <div class="container">
                <p class="left-align white-text">{{ $products->count() }} result(s) for '{{ request()->input('query') }}'</p>

                    @foreach ($products as $prod)
                            <div class="card" style="width: 23.5rem;">
                                <div class="card-image">
                                    <img src="{{$prod->image}}" alt="" width='200px' height='200px'>
                                </div>
                                <div class="card-content">
                                    <span class="card-title bold">{{$prod->name}}</span>
                                    <p><strong>Price:</strong> ${{$prod->cost}}</p>
                                    <p><audio controls><source src="{{$prod->audio}}" type="audio/mpeg"></audio></p>
                                </div>
                                <div class="card-action">
                                    <a href="{{ route('cart.add', $prod->id) }}" class ="waves-effect waves-light btn-small indigo">Add to cart</a>
                                </div>
                            </div>
                    @endforeach
                    
                <a href="{{ url('products') }}" class="waves-effect waves-light btn-large indigo center"><i class="material-icons left">arrow_back</i>Back to All Products</a>

            </div>

        <!-- Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/mylogic.js"></script>

    </body>
</html>
