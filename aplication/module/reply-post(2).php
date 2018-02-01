<?php
	if(isset($_POST["submit"])){
		$email = $_POST["email"];
		$komentar = $_POST["komentar"];
		$id_post = $_POST["id_post"];
		require_once('db_login.php');
		$db = new mysqli($db_host, $db_username, $db_password, $db_database); //skala objek, bikin kelas baru
		 
		if ($db->connect_errno){                          //karena objek, maka pakenya panah
		  die ("Could not connect to the database: <br />". $db-> connect_error);
		}

		$query = "INSERT INTO forum (id_post,balasan,email) VALUES ('$id_post','$komentar','$email')  ";
		$result = $db->query($query);
		if(!$result){
		  die("Could not query the database: <br />".$db->error);
		}
		echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    Berhasil !
                  </div>';

        header('location:forum.php');
	}
	
?>