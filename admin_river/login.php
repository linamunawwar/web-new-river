<?php
  session_start();
  require_once('db_login.php');
  $db = new mysqli($db_host, $db_username, $db_password,$db_database); //skala objek, bikin kelas baru
  $error_email="";
  $error_password="";
  $email ="";
  $password="";
  if ($db->connect_errno){                          //karena objek, maka pakenya panah
    die ("Could not connect to the databse: <br />". $db-> connect_error);
  }
  if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
    if(isset($_POST['submit'])){

      $email = $_POST['email'];
      $password = $_POST['password'];

      if ($username == ''){
        $error_username = "Email is required";
        $valid_username = FALSE;
      }else{
        $valid_username = TRUE;
      }

      if ($password == ''){
        $error_password = "Password is required";
        $valid_password = FALSE;
      }else{
        $valid_password = TRUE;
      }     
      
      //update into database
      //if($valid_username && $valid_password){
      //escape inputs data
      $email = $db->real_escape_string($email);   //real escape biar nggak dibobol, buat mengamankan query
      $password = $db->real_escape_string($password);
      //assign a query
      $query = " SELECT email,username, password FROM admin WHERE email = '".$email."' AND password = '".$password."'";
      //execute the query
      $result = $db->query($query);
      if(!$result){
        die("Could not query the database: <br />".$db->error);
      } 
      if ($result->num_rows == 1){
        $hasil = $result->fetch_assoc();
        $_SESSION['email'] = $hasil['email'];
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['password'] = $hasil['password'];
      
        header('location:index.php');
        $db->close();
      } else {
        if($error_email == "" )
          $error_email = "username atau password tidak cocok";
      }
      
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/logo.png">
    <title>New River </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" name="submit" href="index.html">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div>
                  <h1><img src="images/logo.png" width="25" height="25"></img> New River</h1>
                  <p>©2017 All Rights Reserved. Bootstrap 3 template.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
