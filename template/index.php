<?php
	require_once 'vendor/autoloader.php';

	$loader = new Twig_Loader_Filesystem('templates');
	$twig  = new Twig_Environment($loader, array(
		'cache' => 'cache',
	));


	$template = $twig->loadTemplate('index.php');
	echo $template->render(array('440' => 'Team Forteress 2', '730' => 'Counter Strike: Global Offensive', '578080' => 'PLAYERUNKNOWNS BATTLEGROUNDS', '271590' => 'Grand Theft Auto V', '4000' => 'Garrys Mod', '252490' => 'Rust'));
?>