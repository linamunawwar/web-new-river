<!DOCTYPE html>
<html lang="en">

<head>
    <title>PT. New River Logistic</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/> 
      <link type="text/css" rel="stylesheet" href="assets/css/materialize-social.css"  media="screen,projection"/>     

      <link rel="icon" href="assets/image/logo.ico" type="image/x-icon"> 

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<header>
  <div class="row">
    <nav class="menu">
      <div class="container">
          <div class="nav-wrapper">
              <div class="col s12 m12 l2">
                  <a href="?page=Home" class="brand-logo">PT. New River Logistic.</a>
              </div>
              <div class="col s12 m12 l12">
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                      <li><a href="?page=Home">Home</a></li>
                      <li><a href="?page=About">About Us</a></li>
                      <li><a href="?page=Service">Services</a></li>
                      <li><a href="?page=Forum">Forum</a></li>
                      <li><a href="?page=Contact">Contact Us</a></li>
                  </ul>
                  <!-- Button mobile -->
                  <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
              </div>
          </div>
      </div>
    </nav>
    <ul id="slide-out" class="side-nav">
        <li><a href="?page=Home">Home</a></li>
        <li><a href="?page=About">About Us</a></li>
        <li><a href="?page=Service">Services</a></li>
        <li><a href="?page=Forum">Forum</a></li>
        <li><a href="?page=Contact">Contact Us</a></li>
    </ul>
  </div>
</header>
<body>
    
    <div class="content">
      <?php include "Case/case.php"; ?>
    </div>

   

<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l5 s12">
        <h5 class="white-text">Home Office</h5>
        <p class="grey-text text-lighten-4 justify">
          <span class="col s1"><i class="material-icons">home</i></span>
          <span class="col s11">
            Jl. Puspanjolo Tengah I/3 RT.2 RW.2 Kel. Cabean, 
            <br>Kec. Semarang Barat Kota Semarang, 
            <br>Jawa Tengah, Indonesia
          </span>
        </p>

        <p class="grey-text text-lighten-4 justify">
          <span class="col s1"><i class="material-icons">phone</i></span>
          <span class="col s6">
            Telp. (+6224) 7616387
            <br>Fax. (+6224) 7616387
          </span>
        </p>
      </div>
      <div class="col l5 offset-l2 s12">
        <h5 class="white-text">Branch office</h5>
        <p class="grey-text text-lighten-4 justify">
          <span class="col s1"><i class="material-icons">home</i></span>
          <span class="col s11">
            Green Lake City Boulevard,
            <br>Rukan Great Wall Blok B-106 Cluster Asia,
            <br>Cengkareng, Jakarta Barat
          </span>
        </p>

        <p class="grey-text text-lighten-4 justify">
          <span class="col s1"><i class="material-icons">phone</i></span>
          <span class="col s6">
            Telp. (+6221) 2230 2000
            <br>Fax. (+6221) 2230 2000 
          </span>
        </p>
      </div>
    </div>
  </div>  
  <div class="footer-copyright">
      <div class="container center">
          PT. New River Logistic &copy; 2017 All Rights Reserved.
      </div>
  </div>
</footer>


    <!--  Scripts-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="assets/js/materialize.js"></script>
    <script src="assets/js/init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
           $('.slider').slider({
              full_width: false,
              interval: 5000,
              transition: 900,
            });
         });

        $(".button-collapse").sideNav();
    </script>

</body>

</html>
