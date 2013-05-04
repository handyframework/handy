<?php
Handy\Core\Config\ConfigHelper::save('DIRECTORY_CACHE','cache'); 
Handy\Core\Config\ConfigHelper::save('CACHE_TIME_LIFE',500); 
Handy\Core\Config\ConfigHelper::save('CACHE_DRIVER', new Handy\Core\Cache\FileFactory()); 
Handy\Core\Config\ConfigHelper::save('DEVELOPMENT_ENV','development'); // 
Handy\Core\Config\ConfigHelper::save('ACTIVE_RECORD_STATUS',true); // 
Handy\Core\Config\ConfigHelper::save('ACTIVE_RECORD_DRIVER_PRODUCTION','mysql://victor:seregas1f@localhost/victor'); 
Handy\Core\Config\ConfigHelper::save('ACTIVE_RECORD_DRIVER_DEVELOPMENT','mysql://victor:seregas1f@localhost/victor');
Handy\Core\COnfig\ConfigHelper::save('TWIG_STATUS',true); 
Handy\Core\Config\ConfigHelper::save('OTHER_SOLT','hash21'); 



