<?php
	session_start();
  	if(isset($_SESSION['email'])){
		if(isset($_POST["submit"])){
			$id_post = $_POST["id_post"];
			$balasan = $_POST["balasan"];
			require_once('db_login.php');
			$db = new mysqli($db_host, $db_username, $db_password, $db_database); //skala objek, bikin kelas baru
			 
			if ($db->connect_errno){                          //karena objek, maka pakenya panah
			  die ("Could not connect to the database: <br />". $db-> connect_error);
			}

			date_default_timezone_set('Asia/Jakarta');
			$date = date('Y/m/d h:i:s a', time());
			$query = "INSERT INTO forum (id_post,balasan,email,time) VALUES ('$id_post','$balasan','Admin','$date')  ";
			$result = $db->query($query);
			if(!$result){
			  die("Could not query the database: <br />".$db->error);
			}
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	                    </button>
	                    Berhasil !
	                  </div>';

	        header('location:list-forum.php?alert=1');
		}
	}else{
		header('location:login.php');
	}

?>