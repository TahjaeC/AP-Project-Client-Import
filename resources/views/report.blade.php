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

  <div class="container white">
    <h1 class="center" style="color:indigo;">Sales Report</h1>
    <br><br>

    {!! $chart->container() !!}
  </div>
      
  
 
  <!--  Scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  {!! $chart->script() !!}
  </body>
</html>
