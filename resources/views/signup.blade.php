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
<section>
    <div class=" c row">
        <div class="col-md-4 col-md-offset-4">
            <h1  class = "center" style = "color:indigo;">Register</h1>
            @if(count($errors) > 0)
                <div style = "color:indigo;" class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error}}</p>
                    @endforeach
                </div>
            @endif
            <form style = "color:indigo;" class = "transparent" action="/signup" method="POST">
                @csrf
                  <label class="indigo-text">First Name: </label>
                  <input style = "color:indigo;"type="text" name="firstname" value="">

                  <label class="indigo-text">Last Name: </label>
                  <input style = "color:indigo;"type="text" name="lastname" value="">
          
                  <label class="indigo-text">Password: </label>
                  <input style = "color:indigo;"type="password" name="password" value="">

                  <div class ="center">
                    <input type="submit" name="submit" value="Sign Up" class ="btn brand z-depth-0 orange darken-1">
                </div>
              </form>
        </div>
    </div>
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
