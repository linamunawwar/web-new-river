<?php	
	switch (@$_GET['page']) {
	default: 
	include 'home.php';
	break; 

	case 'Home':if (!file_exists("home.php"))
	die ("<div class='container center'>
			<div class='row'>
				<div class='maintenance'>
					<h4 style='font-family:GillSans, Trebuchet, Algerian;'> SORRY I'M MAINTENANCE </h4>
				</div>
			</div>
		  </div>");
	include "home.php";
	break;

	case 'About':if (!file_exists("aplication/module/about.php"))
	die ("<div class='container center'>
			<div class='row'>
				<div class='maintenance'>
					<h4 style='font-family:GillSans, Trebuchet, Algerian;'> SORRY I'M MAINTENANCE </h4>
				</div>
			</div>
		  </div>");
	include "aplication/module/about.php";
	break;

	case 'Service':if (!file_exists("aplication/module/service.php"))
	die ("<div class='container center'>
			<div class='row'>
				<div class='maintenance'>
					<h4 style='font-family:GillSans, Trebuchet, Algerian;'> SORRY I'M MAINTENANCE </h4>
				</div>
			</div>
		  </div>");
	include "aplication/module/service.php";
	break;

	case 'Forum':if (!file_exists("aplication/module/forum.php"))
	die ("<div class='container center'>
			<div class='row'>
				<div class='maintenance'>
					<h4 style='font-family:GillSans, Trebuchet, Algerian;'> SORRY I'M MAINTENANCE </h4>
				</div>
			</div>
		  </div>");
	include "aplication/module/forum.php";
	break;
	
	case 'Contact':if (!file_exists("aplication/module/contact.php"))
	die ("<div class='container center'>
			<div class='row'>
				<div class='maintenance'>
					<h4 style='font-family:GillSans, Trebuchet, Algerian;'> SORRY I'M MAINTENANCE </h4>
				</div>
			</div>
		  </div>");
	include "aplication/module/contact.php";
	break;
}
?>