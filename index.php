<?php
session_start();

define('css', './css/');
define('js', './js/');

define('bdd', './../bdd/');

define('incl', './template/include/');
define('pages', './template/pages/');
define('error', './template/error/');

define('global', './../template/include/');

$link = mysqli_connect("localhost" , "root" , "root" , "jeudistance");
//$link = mysqli_connect("pahdidsjeux.mysql.db" , "pahdidsjeux" , "P8ot807b" , "pahdidsjeux");
mysqli_set_charset($link , 'utf8');

$page = pages . $_GET['page'] . '.php';

if (isset($_GET['page'])) {

	if (file_exists($page)) {
	    require_once($page); 
	} else {
	    require_once(error . '404.php'); 
	}

} else {
	require_once(pages . 'home.php');
}



?>

				


