<?php

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


//---------- action form--------------------
  if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    $id_post = $_POST["id_post"];
    require_once('db_login.php');
    $db = new mysqli($db_host, $db_username, $db_password, $db_database); //skala objek, bikin kelas baru
     
    if ($db->connect_errno){                          //karena objek, maka pakenya panah
      die ("Could not connect to the database: <br />". $db-> connect_error);
    }
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y/m/d h:i:s a', time());

    $query = "INSERT INTO forum (id_post,balasan,email,time) VALUES ('$id_post','$komentar','$email','$date')  ";
    $query2 = "SELECT * FROM user WHERE email = '$email' ";
    $result = $db->query($query);
    $result2 = $db->query($query2);
    if(!$result){
      die("Could not query the database: <br />".$db->error);
    }
    if(!$result2){
      die("Could not query the database: <br />".$db->error);
    }
    if ($result2->num_rows != 1){
      $query3 = "INSERT INTO user (email) VALUES ('$email')  ";
      $result3 = $db->query($query3);
      if(!$result3){
        die("Could not query the database: <br />".$db->error);
      }
      echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="width:1000px;float:center;padding:5px;margin:auto;">
              <button type="button" style="background-color:Transparent;border:none;"  class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              Berhasil !
            </div>';
    }

    
    

  }
//-----end of action form------------------
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
     <!-- Bootstrap -->
    <link href="assets/css/materialize.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="build/css/custom.css" rel="stylesheet">

    <style type="text/css">
      footer {
        margin-left: 0px !important;
      }
    </style>
    
</head>
<body>
	<div class="section"></div>
	<div class="container">
		<div class="row">
        	<div class="col s12 m12 l7 push-s2">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Activities</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a> 
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
                          $i=0;
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
                              <form action="?page=Forum" method="POST">
                                email :  <input type="email" style="width:200px;" name="email"></input>
                                </br>
                                </br>
                                Komentar : <textarea style="width: 42em; height:11em;" name="komentar"></textarea>
                                </br>
                                <input type="hidden" value="'.$id.'" name="id_post"></input>
                                <button style="margin-top:30px;" type="submit" name="submit" class="btn btn-primary">Balas</button>
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
      	</div>
	</div>
	<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
</body>
</html>