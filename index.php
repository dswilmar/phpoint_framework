<?php

if (isset($_GET['p'])) {

	$pag = $_GET['p'];

} else {
	
	//página default do sistema
	$pag = 'home';
}

if (file_exists('./pages/'.$pag.'.php')) {

	include './pages/'.$pag.'.php';

} else {

	include './pages/404.php';

}