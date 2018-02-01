<?php
  session_start();
  if(isset($_SESSION['email'])){
    require_once('db_login.php');
    $db = new mysqli($db_host, $db_username, $db_password, $db_database); //skala objek, bikin kelas baru
    
    if ($db->connect_errno){                          //karena objek, maka pakenya panah
      die ("Could not connect to the database: <br />". $db-> connect_error);
    }

   
    $query = "SELECT * FROM post";
    $result = $db->query($query);
    if(!$result){
      die("Could not query the database: <br />".$db->error);
    }
    $i=0;
    while ($row = $result->fetch_object()){
          $data[$i]['email']= $row->admin;
          $data[$i]['id_post']=$row->id_post;
          $data[$i]['isi']=$row->isi;
          $data[$i]['time']=$row->time;
          $i++;
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
    <title>PT. New River Logistic</title>

  <style type="text/css">
    .right_col{
      min-height: 100% !important;
    }
  </style>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
      <?php
        if(isset($_GET['alert'])){
          echo'<script type="text/javascript">
              alert("Berhasil!");
            </script>';
            $alert=null;
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
                <h2><?php echo $_SESSION['username'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
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
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['username'];?>
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
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Activities</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="list-unstyled timeline widget">
                    <?php
                      // foreach ($data as $key => $value) {
                      //   $group[$value['id_post']][] = $value;
                      //   $id=$value['id_post'];
                      //   $query2 = "SELECT * FROM forum WHERE id_post = '$id'";
                      //   $result2 = $db->query($query2);
                      //   if(!$result2){
                      //     die("Could not query the database: <br />".$db->error);
                      //   }
                      //   $i=0;
                      //   while ($row2 = $result2->fetch_object()){
                      //         $group[$value['id_post']]['balasan']=$row2->balasan;
                      //         $group[$value['id_post']]['email']=$row2->email;
                      //         $group[$value['id_post']]['time']=$row2->time;
                      //         $i++;
                      //   }

                      // }
                      if(isset($data)){
                        foreach ($data as $key => $value) {
                          $id_post = $key;
                          $isi = $value['isi'];
                          echo'
                              <div class="block">
                                  <div class="block_content">
                                    <p class="title" style="font-size:14px;" ><b>
                                                      '.$value['isi'].'
                                                  </b></p>
                                    <div class="byline">
                                      <span> '.$value['time'].'</span> by <a>'.$value['email'].'</a>
                                    </div>
                                  </div>
                          ';
                          $id=$value['id_post'];
                          $query2 = "SELECT * FROM forum WHERE id_post = '$id'";
                          $result2 = $db->query($query2);
                          if(!$result2){
                            die("Could not query the database: <br />".$db->error);
                          }
                          $i=1;
                          while ($row2 = $result2->fetch_object()){
                                $group[$i]['balasan']=$row2->balasan;
                                $group[$i]['email']=$row2->email;
                                $group[$i]['time']=$row2->time;
                                $i++;
                          }
                          if ($group != null){
                            foreach ($group as $key => $val) {
                              //var_dump($val);
                                echo '
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <p class="title" style="font-size:12px;" >
                                                        '.$val['balasan'].'
                                                    </p>
                                      <div class="byline">
                                        <span> '.$val['time'].'</span> by <a>'.$val['email'].'</a>
                                      </div>
                                      <p></p>
                                    </div>
                                  </div>
                                </li>';
                              //}
                            }
                          }
                            echo '</br>';
                            echo'
                            <form action="reply-forum.php" method="POST">
                              <input type="hidden" value="'.$id.'" name="id_post"></input>
                              <textarea rows="2" cols="48" style="width: auto;" name="balasan"></textarea>
                              <button style="margin-top:15px;" type="submit" name="submit" class="btn btn-primary">Balas</button>
                            </form>
                          ';
                            echo '</br>';
                            echo '</div></br>';
                            $group=null;
                          }
                        }
                      
                    ?>
                   
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6 col-sm-6 col-xs-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Activities</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                        <li>
                        <div class="block">
                          <div class="block_content">
                            <p class="title" style="font-size:12px;" >
                                             Update Info
                                          </p>
                            <p></p>
                            <form method="POST" action="update-forum.php">
                               <textarea rows="4" cols="50" style="width: auto;" name="isi"></textarea>
                              <button style="margin-top:30px;" type="submit" name="submit" class="btn btn-primary">Update</button>
                            </form>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<?php }else{
    header('location:login.php');
  }
?>