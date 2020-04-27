<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Cart</title>

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
      .t{
        background-color: rgba(255,255,255,0.3);
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
    <nav class="orange n" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="#" class="brand-logo">Cart</a>
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
</head>

<body class = "b">


      <div class="container t">
          <h2>Your cart</h2>
        <table style = "color:black;" class="table striped">
            <thead>
                <tr>
                    <th>Name of Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ Cart::session(1)->get($item->id)->getPriceSum() }}</td>
                        <td>
                            <form action="{{route('cart.update', $item->id)}}">
                                <input name="quantity" type="number" value="{{ $item->quantity }}">
                                <input type="submit" value="save">
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('cart.destroy', $item->id) }}" class="btn orange darken-2">Delete</a>
                        </td>
                        <td>
                            <a href="{{ route('cart.confirm', $item->id) }}" class="btn orange darken-2">Confirm Item</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4> Total Price: ${{Cart::session(1)->getTotal()}}</h4>
        <a href="{{ route('cart.clearCart') }}" class="btn orange darken-2 center">Clear Cart</a>
        <br>
        <br><br><br>
      </div>

        <div class = "container t">
          <div class=" c row">
            <div class="col-md-4 col-md-offset-4">
                <h3  class = "center" style = "color:indigo;">Login to checkout</h3>
                @if(count($errors) > 0)
                    <div style = "color:indigo;" class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form style = "color:indigo;" class = "transparent" action="/signin/" method="POST">
                    @csrf
                      <label class="indigo-text">First Name: </label>
                      <input style = "color:indigo;"type="text" name="firstname" value="">
              
                      <label class="indigo-text">Password: </label>
                      <input style = "color:indigo;"type="password" name="password" value="">
    
                      <div class ="center">
                        <input type="submit" name="submit" value="Login" class ="btn brand z-depth-0 orange darken-1">
                    </div>
                  </form>
            </div>
        </div>
      </div>




  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }

  </body>
</html>
