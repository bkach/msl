<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MSL &middot; Solutions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="picker/css/datetimepicker.css" rel="stylesheet" media="screen">
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

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
      .modal {
        top: 500px;
        margin: -250px 0 0 -280px; 
        left: 50%;  
        position: fixed;
      }
    </style>

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
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
  <script src="assets/js/bootstrap.min.js"></script>

    <div class="container">

      <div class="masthead">
        <!-- <h3 class="muted">Project name</h3> -->
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="#">Calendar</a></li>
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
        <i class="icon-calendar"></i>
        <p class="lead">Plan your life away</p>

        <?php
          if (isset($_POST['dayForm'])){
            $day = $_POST['dayForm'];

            $link = mysql_connect("", 'root', 'root') or 
              die("Could not connect : " . mysql_error());
              mysql_select_db("db") or die("Could not select database");

            $query = 
              "SELECT *
              FROM appointments
              WHERE DATE_FORMAT(dt, \"%M %e, %Y\") = \"$day\"
              AND open = 1
              AND reserved = 0;";
            $result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
            $num_rows = mysql_num_rows($result);
            
            echo "<h5>".$num_rows." Time Slots for ".$day.".";
            if($day == "Please Choose A Date"){
                echo " Don't be cheeky.</h5>";
            }
            else
              echo "</h5>";

            if($num_rows != 0){
                echo "
                    <ul class=\"nav nav-pills\">
                    <li class=\"dropdown active\" id=\"menu1\" style=\"left: 50%; margin-left: -100px;\">
                      <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#menu1\">
                        Choose an appointment
                        <b class=\"caret\"></b>
                      </a>
                      <ul class=\"dropdown-menu\" style=\"left: 60%; margin-left: -100px;\">";

                echo "<form method=\"post\" action=\"\">";
                while($row = mysql_fetch_array($result)){
                   $time = $row['time'];
                   $p_id = $row['P_Id'];
                   $date = date("M d, Y", strtotime($row["dt"]));
                   $print_time = date("g:i A", strtotime($time));

                   echo "\t\t\t\t<li>
                   <button class=\"btn\" type=\"submit\" name=\"reserve\" value=\"".$p_id."\">".$print_time."</button>
                   </a></li>\n";
                }
                echo "</form>
                      </ul>
                    </li>
                  </ul>
                  <script>
                  $('.dropdown-toggle').dropdown();
                  </script>
                      ";
            }
            else{
              echo "<button class=\"btn btn-info\" onClick=\"parent.location='calendar.html'\">Back</button>";
            }
            mysql_close($link);

        }
        else if(isset($_POST['reserve'])){
          $link = mysql_connect("", 'root', 'root') or 
              die("Could not connect : " . mysql_error());
              mysql_select_db("db") or die("Could not select database");
          $pid = $_POST['reserve'];
          $query = 
              "UPDATE appointments
              SET reserved = 1
              WHERE P_Id = $pid";

          $result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
          
          $query = 
              "SELECT * FROM appointments
               WHERE P_Id = $pid";
          $result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());

          while($row = mysql_fetch_array($result)){
            echo "<h3>Your Appointment on <font color=\"FF0000\">".date("M d, Y", strtotime($row["dt"]))." </font> 
            from <font color=\"FF0000\">"
            .date("g:i", strtotime($row['time']))."-".date("g:i A", strtotime($row['time']."+1 hour")).
            "</font>
            has been recieved.\n</h3>
            <button class=\"btn btn-info\" onClick=\"parent.location='calendar.html'\">Back</button>
            ";
          }
          mysql_close($link);
        }
        else{
        // $datetime = new Date();
        echo "
          <form id=\"dayForm\" name=\"dayForm\" method=\"post\" action=\"\">
            <div class=\"input-append date form_datetime\" data-date=\"1882-05-10T15:25:00Z\">
              <input size=\"16\" name=\"dayForm\" type=\"text\" value=\"Please Choose A Date\" readonly>
                <span class=\"add-on\"><i class=\"icon-calendar\"></i></span>
                <span class=\"add-on\" type=\"submit\">
                  <button class=\"btn-link\" type=\"submit\">
                    <i class=\"icon-arrow-right\"></i>
                  </button>
                </span>
              </input>
            </div>
          </form>";
        }
      ?>


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
   <!--  <script src="assets/js/bootstrap.js"></script> -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
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
    <script type="text/javascript" src="picker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="picker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script type="text/javascript">
        startDate = new Date();
        startDate.setMinutes(0);
        $('.form_datetime').datetimepicker({
          format: "MM dd, yyyy",
          autoclose: true,
          todayBtn: false,
          startDate: startDate,
          maxView: 2,
          minView: 2,
          pickerPosition: "bottom-left",
          daysOfWeekDisabled: [0,6]
        });
    </script>
  </body>
</html>