<?php
spl_autoload_extensions(".php");
spl_autoload_register();
require_once 'config.php';
$driver = Handy\Core\Config\ConfigHelper::get('CACHE_DRIVER');
$cache = new Handy\Core\Cache\CacheDriver(Handy\Core\Config\ConfigHelper::get('CACHE_DRIVER'));
Handy\Core\ObjectStorage\Storage::saveObject('cache', $cache);
if (Handy\Core\Config\ConfigHelper::get('ACTIVE_RECORD_STATUS') == true) {
    require_once 'ActiveRecord/ActiveRecord.php';
    ActiveRecord\Config::initialize(function ($config) {
        $config->set_model_directory('Handy/Modules/Model/');
        $config->set_connections(array('development' => Handy\Core\Config\ConfigHelper::get('ACTIVE_RECORD_DRIVER_DEVELOPMENT'), 'production' => Handy\Core\Config\ConfigHelper::get('ACTIVE_RECORD_DRIVER_PRODUCTION')));
        $config->set_default_connection(Handy\Core\Config\ConfigHelper::get('DEVELOPMENT_ENV'));
    });
}
if(Handy\Core\Config\ConfigHelper::get('TWIG_STATUS') == true) {
	require_once 'Twig/Autoloader.php';
	Twig_Autoloader::register();
	$loader = new Twig_Loader_Filesystem('Handy/Modules/View');
	$twig = new Twig_Environment($loader, array(
        'cache' => Handy\Core\Config\ConfigHelper::get('DIRECTORY_CACHE').'/template/',
        'debug' => ((Handy\Core\Config\ConfigHelper::get('DEVELOPMENT_ENV') == 'development') ? true : false)
        )
    );
    Handy\Core\ObjectStorage\Storage::saveObject('twig', $twig);
}
require_once 'routes.php';