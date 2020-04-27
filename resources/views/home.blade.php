<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Products</title>

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
            </div>
        </nav>

        <h3 class="center white-text">Products</h3>

            <div class="container">

                <div class="row">
                    @foreach ($products as $products)

                        <div class="col 3">
                            <div class="card" style="width: 18rem;">
                                <div class="card-image">
                                    <img src="best.jpg" alt="">
                                </div>
                                <div class="card-content">
                                    <span class="card-title">{{$products->name}}</span>
                                    <p><strong>Price:</strong> ${{$products->cost}}</p>
                                </div>
                                <div class="card-action">
                                    <a href="{{url('add-to-cart/'.$products->id) }}" class ="waves-effect waves-light btn-small indigo">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
