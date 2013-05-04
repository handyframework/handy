<?php
$route = new Handy\Core\Route\Router;
$route->route('/',array(
	'OID' => Handy\Modules\Controller\Index::instance(),
	'METHOD' => 'actionIndex'
	)
);