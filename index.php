<!DOCTYPE HTML>
<head>
  <meta charset="utf-8">
  <title>MSL &middot; Solutions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <style type="text/css">
    body {
      padding-top: 20px;
      padding-bottom: 60px;
    }

    /* Custom container */
    .container {
      margin: 0 auto;
      max-width: 1000px;
    }
    .container > hr {
      margin: 60px 0;
    }

    /* Main marketing message and sign up button */
    .jumbotron {
      margin: 80px 0;
      text-align: center;
    }
    .jumbotron h1 {
      font-size: 100px;
      line-height: 1;
    }
    .jumbotron .lead {
      font-size: 24px;
      line-height: 1.25;
    }
    .jumbotron .btn-big {
      font-size: 21px;
      padding: 14px 24px;
    }

    /* Supporting marketing content */
    .marketing {
      margin: 60px 0;
    }
    .marketing p + h4 {
      margin-top: 28px;
    }


    /* Customize the navbar links to be fill the entire space of the .navbar */
    .navbar .navbar-inner {
      padding: 0;
    }
    .navbar .nav {
      margin: 0;
      display: table;
      width: 100%;
    }
    .navbar .nav li {
      display: table-cell;
      width: 1%;
      float: none;
    }
    .navbar .nav li a {
      font-weight: bold;
      text-align: center;
      border-left: 1px solid rgba(255,255,255,.75);
      border-right: 1px solid rgba(0,0,0,.1);
    }
    .navbar .nav li:first-child a {
      border-left: 0;
      border-radius: 3px 0 0 3px;
    }
    .navbar .nav li:last-child a {
      border-right: 0;
      border-radius: 0 3px 3px 0;

            body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    /* Login Modal View */
    .form-signin {
      max-width: 300px;
      padding: 19px 29px 29px;
      margin: 0 auto 20px;
      background-color: #fff;
      border: 1px solid #e5e5e5;
      -webkit-border-radius: 5px;
         -moz-border-radius: 5px;
              border-radius: 5px;
      -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
         -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
              box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
      font-size: 16px;
      height: auto;
      margin-bottom: 15px;
      padding: 7px 9px;
    }
    body .modal {
        /* new custom width */
        width: 560px;
        /* must be half of the width, minus scrollbar on the left (30px) */
        margin-left: -280px;
    }
  </style>
  <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
<!--     <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                  <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                 <link rel="shortcut icon" href="../assets/ico/favicon.png"> -->
</head>

<body>

  <div class="container">

    <div class="masthead">
      <!-- <h3 class="muted">Project name</h3> -->
      <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="calendar.php">Calendar</a></li>
              <li><a href="backend.php">Backend</a></li>
              <li><a href="#">Stuff</a></li>
              <li><a href="#">Around</a></li>
              <li><a href="#">Here</a></li>
            </ul>
          </div>
        </div>
      </div><!-- /.navbar -->
    </div>
    <!-- Jumbotron -->
    <div class="jumbotron">
      <h1>MSL Solutions</h1>
      <p class="lead">Tagline goes here</p>
      <?php  
        // check for a successful form post  
        if (!isset($_GET['s'])) 
          echo "<button class=\"btn-big btn-large btn-success\" role=\"button\" data-toggle=\"modal\" href=\"#myModal\">Get Started Today</button>";
        else{
          echo "<div id=\"myCarousel\" class=\"carousel slide\">
                <ol class=\"carousel-indicators\">
                  <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
                  <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
                  <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
                </ol>
                <!-- Carousel items -->
                <div class=\"carousel-inner\">
                <div class=\"active item\"><center><img src=\"img.jpg\" width=\"600px\" height=\"500px\" /></center></div>
                <div class=\"item\"><center><img src=\"img.jpg\" width=\"600px\" height=\"500px\" /></center></div>
                <div class=\"item\"><center><img src=\"img.jpg\" width=\"600px\" height=\"500px\" /></center></div>
                </div>
                <!-- Carousel nav -->
                <a class=\"carousel-control left\" href=\"#myCarousel\" data-slide=\"prev\">&lsaquo;</a>
                <a class=\"carousel-control right\" href=\"#myCarousel\" data-slide=\"next\">&rsaquo;</a>
              </div>";
            }

      ?>

        <?php  
        // check for a successful form post  
        if (isset($_GET['s'])) echo "<br /><div class=\"alert alert-success\" data-dismiss=\"alert\"\">".$_GET['s']."</div>"; 
            // <div class="alert">
            //   <button type="button" class="close" data-dismiss="alert">&times;</button>
            //   <strong>Warning!</strong> Best check yo self, youre not looking too good.
            // </div> 
        // check for a form error  
        elseif (isset($_GET['e'])) echo "<br /><div class=\"alert alert-error\" data-dismiss=\"alert\"\">".$_GET['e']."</div>";  
        ?>

      <!-- <a class="btn btn-large btn-success" role="button" data-toggle="modal" href="#myModal">Get Started Today</a> -->
      <!-- Modal -->
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:40%;left:30%;margin: auto auto auto auto;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 class="form-signin-heading" id="myModalLabel">Sign In</h3>
        </div>
        <div class="modal-body">
          <form class="form-signin" method="post" action="login_db.php">
            <br />
            <input type="text" class="input-large" name="email" id="input1" placeholder="Email address" />
            <br />
            <input type="password" class="input-large" name="pass" id="input2" placeholder="Password" />
            <br />
            <label class="checkbox inline">
              <input type="checkbox" name="rem" id="input3" />
                Remember me
            </label>
            </div>
            <div class="modal-footer">
              <a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
              <input class="btn btn-primary" type="submit" value="Sign In" />
            </div>
         </form>
      </div>
    </div>

    <hr>


    <!-- Example row of columns -->
    <div class="row-fluid">
      <div class="span4">
        <h2>About</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
      </div>
      <div class="span4">
        <h2>Who We Are</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
     </div>
      <div class="span4">
        <h2>What We are About</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
      </div>
    </div>

    <hr>


    <div class="footer">
      <p>&copy; Tia Incorporated 2013</p>
    </div>

  </div> <!-- /container -->

  <!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script>
  <script src="sharrre/jquery.sharrre-1.3.4.js"></script>
  <script src="sharrre/jquery.sharrre-1.3.4.min.js"></script>
  <script src="assets/js/bootstrap-transition.js"></script>
  <script src="assets/js/bootstrap-alert.js"></script>
  <script src="assets/js/bootstrap-modal.js"></script>
  <script src="assets/js/bootstrap-dropdown.js"></script>
  <script src="assets/js/bootstrap-scrollspy.js"></script>
  <script src="assets/js/bootstrap-tab.js"></script>
  <script src="assets/js/bootstrap-tooltip.js"></script>
  <script src="assets/js/bootstrap-popover.js"></script>
  <script src="assets/js/bootstrap-button.js"></script>
  <script src="assets/js/bootstrap-collapse.js"></script>
  <script src="assets/js/bootstrap-carousel.js"></script>
  <script src="assets/js/bootstrap-typeahead.js"></script>

</body>
</HTML>