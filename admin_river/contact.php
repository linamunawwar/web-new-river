<?php
  session_start();
  require_once('db_login.php');
  $db = new mysqli($db_host, $db_username, $db_password, $db_database); //skala objek, bikin kelas baru
   
  if ($db->connect_errno){                          //karena objek, maka pakenya panah
    die ("Could not connect to the database: <br />". $db-> connect_error);
  } 
  if(isset($_SESSION['email'])){
    $alert=0;
    if(isset($_POST["edit"])){
      $id = $_POST["id"];
      $nama = $_POST["nama$id"];
      $no_hp = $_POST["no_hp$id"];
      $email = $_POST["email$id"];
      $posisi = $_POST["posisi$id"];
      $query_service = "UPDATE contact SET nama='".$nama."', no_hp='".$no_hp."', email='".$email."',posisi='".$posisi."' WHERE id='".$id."'";
      $result_service = $db->query($query_service);
      if(!$result_service){
        die("Could not query the database: <br />".$db->error);
      }else{
        $alert=1;
      }
    }
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/logo.png">
    <title>New River </title>

    <style type="text/css">
    .right_col{
      min-height: 100% !important;
    }
  </style>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
  <?php
        if($alert==1){
          echo'<script type="text/javascript">
              alert("Berhasil!");
            </script>';
            $alert=0;
        }
      ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img  src="images/logo-black.png" width="30px" height="30px"></img> <span><img  src="images/name.png" width="180px" height="20px"></img></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="list-forum.php"><i class="fa fa-comments"></i> Forum </a>
                  </li>
                  <li><a href="service.php"><i class="fa fa-refresh"></i> Service </a>
                  </li>
                  <li><a href="contact.php"><i class="fa fa-user"></i> Contact </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['username']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Contact</h2>
                  <?php
                      $query_contact = "SELECT * FROM contact";
                      $result_contact = $db->query($query_contact);
                      if(!$result_contact){
                        die("Could not query the database: <br />".$db->error);
                      }
                      $i=0;
                      while ($row2 = $result_contact->fetch_object()){
                        $contact[$i]['id']=$row2->id;
                        $contact[$i]['nama']=$row2->nama;
                        $contact[$i]['no_hp']=$row2->no_hp;
                        $contact[$i]['email']=$row2->email;
                        $contact[$i]['posisi']=$row2->posisi;
                        $i++;
                      }
                  ?>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="list-unstyled timeline widget">
                      <div class="block">
                          <div class="block_content">
                          <?php
                          foreach ($contact as $key => $value) {
                            echo'
                            <table style="font-size:15px;" border="0">
                              <form method="POST">
                                <input type="hidden" name="id" value="'.$value["id"].'"/>
                                <tr>
                                  <td style="padding:5px;">Nama</td>
                                  <td style="padding:10px;">:</td>
                                  <td style="padding:10px;"><input type="text" width="200" name="nama'.$value["id"].'" value="'.$value["nama"].'"></></td>
                                </tr>
                                <tr>
                                  <td style="padding:5px;">Nomor HP</td>
                                  <td style="padding:10px;">:</td>
                                  <td style="padding:10px;"><input type="text" width="200" name="no_hp'.$value["id"].'" value="'.$value["no_hp"].'"></></td>
                                </tr>
                                <tr>
                                  <td style="padding:5px;">Email</td>
                                  <td style="padding:10px;">:</td>
                                  <td style="padding:10px;"><input type="text" width="200" name="email'.$value["id"].'" value="'.$value["email"].'"></></td>
                                </tr>
                                <tr>
                                  <td style="padding:5px;">Posisi</td>
                                  <td style="padding:10px;">:</td>
                                  <td style="padding:10px;"><input type="text" width="200" name="posisi'.$value["id"].'" value="'.$value["posisi"].'"></></td>
                                </tr>
                                  <td></td>
                                  <td></td>
                                  <td><button  style= float:right;" type="submit" name="edit" class="btn btn-primary">Edit</button></td>
                                </tr>
                             </form>
                            </table>
                            <br><br>';
                          }
                        ?>
                          </div>
                        </div>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /top tiles -->

          <br />

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<?php }else{
    header('location:login.php');
  }
?>