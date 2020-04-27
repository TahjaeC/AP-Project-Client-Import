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
        background-attachment: fixed;
        }
        .t{
        background-color: rgba(255,255,255,0.3);
        }
    </style>
</head>

    <body class="b">
            <nav class="orange" role="navigation">
                <div class="nav-wrapper container">
                    <a id="brand-logo" href="/" class="brand-logo white-text">C.U.P.S</a>
                    <ul class="right">
                    <a class="waves-effect waves-light btn-small indigo" href="cart"> <i class="material-icons left">add_shopping_cart</i> Cart <span class="badge white-text" data-badge-caption={{ count((array) session('cart')) }}></span></a>
                    </ul>
                </div>
            </nav>
        <div class=" c row">
            
                <div class=" container container-table z-depth-4 white">

                    <h4 class="center-align">YOUR ITEMS</h4>
                    <br>
                    <br>
                    <table id="cart" class="center">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0 ?>
                            @if(session('cart'))
                                @php
                                    $saless=Array();
                                @endphp
                                @foreach(session('cart') as $id => $products)
                                    <tr>
                                        <td name="Product">
                                            <div class="row">
                                                <h5 class="center">{{ $products['name'] }}</h5>
                                            </div>
                                        </td>

                                        <td name="Unit Price">${{$products['cost']}}</td>

                                        <td name="Quantity">
                                            <input type="number" min = "1" name="Quantity" value="{{ $products['stock'] }}" class="form-control stock"/>
                                        </td>

                                        <td name="Subtotal" class="text-center">${{ $products['cost'] * $products['stock'] }}</td>

                                        <td class="actions" data-th="Action">
                                            <button  name="update" class="waves-effect waves-purple btn-small green update-item" data-id={{ $id }} ><i class="material-icons">loop</i></button>
                                            <button  name="delete" class="waves-effect waves-purple btn-small red delete-item" data-id={{ $id }} ><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                    @php

                                        $total += $products['cost'] * $products['stock'];
                                        $sale = $products['cost'] * $products['stock'];
                                        $item = $products['name'];

                                        $saless[] = array(
                                        'sale' => $sale,
                                        'name' => $item
                                        );
                                    @endphp
                                            
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <br>
                    <div class="group">
                        <a href="{{ url('/home') }}" class="waves-effect waves-light btn-large indigo"><i class="material-icons left">arrow_back</i> Buy More Items</a>
                        <a href="{{ url('/checkout') }}" class="waves-effect waves-light btn-large right indigo"><i class="material-icons left">arrow_forward</i> CHECKOUT</a>
                        <a class="center"><strong>Total ${{ $total }}</strong></a>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <h1  class = "center" style = "color:indigo;">Login</h1>
                    @if(count($errors) > 0)
                        <div style = "color:orange;" class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
    
                    <form style = "color:orange;" action="carttest" method="POST">

                    @csrf
                        <label class="indigo-text">First Name: </label>
                        <input style = "color:orange;"type="text" name="firstname" value="">
                
                        <label class="indigo-text">Password: </label>
                        <input style = "color:orange;"type="password" name="password" value="">
    
                        <div class ="center">
                        <input type="submit" name="submit" value="Check Out" class ="btn brand z-depth-0 orange darken-1">
                    </div>
                </form>
            </div>
        </div>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/mylogic.js"></script>

        {{-- <script>
                    $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: url('update-cart'),
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), stock: ele.parents("tr").find(".stock").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);
                $.ajax({
                    url: url('remove-from-cart'),
                    method: "delete",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
        });
    </script> --}}


  </body>
</html>
