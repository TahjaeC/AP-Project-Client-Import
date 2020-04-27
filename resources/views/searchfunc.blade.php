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
          text-decoration-color: orange;
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
      .card-image{
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
      }
  </style>

</head>

<body class = "b">
  <nav class="orange n" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Manager</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="signin">LOGIN</a></li>
        <li><a href="signup">REGISTER</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="welcome">HOME</a></li>
        <li><a href="signin">LOGIN</a></li>
        <li><a href="signup">REGISTER</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <section class = "container align-center">
    <h4 class = "center" style = "color:orange;">All Items</h4>
    <br><br><br>
    <div class="wrapper Search">
    </div>
  </section>

  <div class=" container form-group">
    <form action="/searchfunc" method="get" >
        <br>
        <input style = "color:orange;" type='search' name="q" value="" placeholder="  Enter the Name of the item ">
        <button type ="submit" class="btn btn-default orange darken-2">Search</button>
        <br>
    </form>

    @if(isset($details))
      <div>
        <h4 style = "color:orange;">Results</h4>
        <table style = "color:orange;" class="table table-stripped">
          <thead >
            <tr>
              <th>Item Number</th>
              <th>Name</th>
              <th>Category</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($details as $item)
            <tr>
              <td> {{ $item->id }}</td>
              <td> {{ $item->name }}</td>
              <td> {{ $item->category }}</td>
              <td> {{ $item->cost }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @elseif(isset($message))
    <p style = "color:orange;"> {{ $message }}</p>
    @endif
      
  </div>
 
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
