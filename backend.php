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
      text-align: left;
    }
    .jumbotron h1 {
      font-size: 100px;
      line-height: 1;
    }
    .jumbotron .lead {
      font-size: 24px;
      line-height: 1.25;
    }
    .jumbotron .btn {
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

<!-- navbar -->
    <div class="masthead">
<!--       <h3 class="muted">Backend</h3>
 -->      <div class="navbar">
        <div class="navbar-inner">
          <div class="container">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="calendar.php">Calendar</a></li>
              <li class="active"><a class="active" href="#">Backend</a></li>
              <li><a href="#">Stuff</a></li>
              <li><a href="#">Around</a></li>
              <li><a href="#">Here</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
    <div class="jumbotron">
        <?php

        // Deletes a table entry
              if(isset($_POST['delete'])){
                $link = mysql_connect("", 'root', 'root') or 
                die("Could not connect : " . mysql_error());
                mysql_select_db("db") or die("Could not select database");
                $pid = $_POST['delete'];
                $query = 
                     "UPDATE appointments
                     SET reserved = 0,
                     approved = 0
                     WHERE P_Id = $pid";
                $result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
                $_POST['delete'] = 1;
              }
        // Approves a table entry
              if(isset($_POST['approve'])){
                  $link = mysql_connect("", 'root', 'root') or 
                  die("Could not connect : " . mysql_error());
                  mysql_select_db("db") or die("Could not select database");
                  $pid = $_POST['approve'];
                  $query = 
                       "UPDATE appointments
                       SET approved = 1
                       WHERE P_Id = $pid;";
                  $result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
                  $_POST['approve'] = 1;
              }
        // Unapproves a table entry
              if(isset($_POST['unapprove'])){
                  $link = mysql_connect("", 'root', 'root') or 
                  die("Could not connect : " . mysql_error());
                  mysql_select_db("db") or die("Could not select database");
                  $pid = $_POST['unapprove'];
                  $query = 
                       "UPDATE appointments
                       SET approved = 0
                       WHERE P_Id = $pid;";
                  $result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
                  $_POST['unapprove'] = 1;
              }

              // Sets Date for comparison (currently one week view)
              date_default_timezone_set('America/Los_Angeles');
              $date = date('Y-m-d H:i:s', strtotime('+1 Week'));

              // Queries for only events older than two weeks from now
              $link = mysql_connect("", 'root', 'root') or 
                die("Could not connect : " . mysql_error());
                mysql_select_db("db") or die("Could not select database");
              $query = 
                "SELECT *
                FROM appointments
                WHERE reserved = 1
                AND dt < \"$date\";";
              $result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
              $num_rows = mysql_num_rows($result);
              echo "<h5>".$num_rows." appointments this week</h5>";

              // Numbers and populates tables
              $currentDay = "";
              $iter = 0;
              while($row = mysql_fetch_array($result)){
                $approved = $row['approved'];
                if($currentDay != date("l", strtotime($row["dt"]))){
                  echo "</table>";
                  $iter = 0;
                  echo "<h3>".date("l, M d", strtotime($row["dt"]))."</h3>";
                  $currentDay = date("l", strtotime($row["dt"]));
                  echo "<table class=\"table table-striped table-hover\">";
                }
                $iter++;
                echo"<tr>
                      <td>$iter</td>
                      <td>Smith, James</td>
                      <td>".date("g:i A", strtotime($row['time']))." - ".date("g:i A", strtotime($row['time']."+1 hour"))."</td>";

                // Populates depending on approved status 
                if($row['approved'] == 0){
                  echo "
                      <form method=POST action=\"\">
                        <td><button type=\"submit\" name=\"approve\" value=\"".$row['P_Id']."\" class=\"btn-small btn-warning\">unapproved</button></td>
                      </form>";
                }
                else{
                  echo "
                      <form method=POST action=\"\">
                        <td><button type=\"submit\" name=\"unapprove\" value=\"".$row['P_Id']."\" class=\"btn-small btn-success\">approved</button></td>
                      </form>";
                }
                echo "
                      <form method=POST action=\"\">
                        <td><button type=\"submit\" name=\"delete\" value=\"".$row['P_Id']."\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button></td>
                      </form>
                    <tr>
                  ";
              }
              mysql_close($link);
          ?>
    </div>


  </div> <!-- /container -->

  <!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script>
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