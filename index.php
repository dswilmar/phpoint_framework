<?php

if (isset($_GET['p'])) {

	$pag = $_GET['p'];
} else {
	$pag = 'home';
}

echo $pag;