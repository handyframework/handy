<?php

/**
* Класс реализующий кеширование в файловой системе
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Cache
*/

namespace Handy\Core\Cache;

class FileFactory implements \Handy\Core\Cache\CacheStrategy {

    /**
    * @var @cache_directory - папка для храненя файлов с кеш
    * @access private
    */

    private $cache_directory;
    
    /**
    * @var $cache_time_life int - время хранение кеш по умолчанию
    * @access private
    */

    private $cache_time_life;
    
    /**
    * Конструктор.
    * Установка дирректории для хранения кеш и установка время кеш по умолчанию
    * @return void
    */

    public function __construct() {
        $this->cache_directory = \Handy\Core\Config\ConfigHelper::get('DIRECTORY_CACHE').'/file/';
        $this->cache_time_life = \Handy\Core\Config\ConfigHelper::get('CACHE_TIME_LIFE');
    }

    /**
    * Запись данных в кеш
    * @access public
    * @param $key - ключ, под каким хранить данные
    * @param $val - данные , которые нужно сохранить в кеш
    * @param $time - время хранение данных в кеш, в секундах
    * @return boolean
    */

    public function save($key, $val, $time) {
        $data = serialize(array('val'=> $val, 'time' => $time));
        if (file_put_contents($this->cache_directory . '/' . $key . '_' . md5($key), $data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
    * Получение данных с кеш
    * @access public
    * @param $key - ключ, для получение данных
    * @throws Handy\Core\Exceptions\InvalidArgumentException
    * @throws Handy\Core\Exceptions\LogicException
    * @return mixed 
    */

    public function get($key) {
        $time = ($time == null) ? $this->cache_time_life : $time;
        if (empty($key)) throw new \Handy\Core\Exceptions\InvalidArgumentException('&#1053;&#1077; &#1091;&#1082;&#1072;&#1079;&#1072;&#1085; &#1082;&#1083;&#1102;&#1095;&#1100; &#1076;&#1083;&#1103; &#1087;&#1086;&#1083;&#1091;&#1095;&#1077;&#1085;&#1080;&#1077; &#1076;&#1072;&#1085;&#1085;&#1099;&#1093;');
        if (!file_exists($this->cache_directory . '/' . $key . '_' . md5($key))) return false;
        $content = unserialize(file_get_contents($this->cache_directory. '/' . $key. '_' . md5($key)));
        if( time() < $content['time'] + filectime($this->cache_directory.'/'.$key.'_'.md5($key))) {
            return $content['val'];
        } else {
            if (!unlink($this->cache_directory . '/' . $key . '_' . md5($key))) throw new \Handy\Core\Exceptions\LogicException('&#1085;&#1077; &#1091;&#1076;&#1072;&#1083;&#1086;&#1089;&#1100; &#1091;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1082;&#1077;&#1096; , &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1100;&#1090;&#1077; &#1087;&#1088;&#1072;&#1074;&#1072;');
            return false;
        }
    }

    /**
    * Удаление данных с кещ
    * @access public
    * @param $key - ключ для удаленния данных
    * @return boolean
    */
    
    public function remove($key) {
        if (empty($key)) throw new \Handy\Core\Exceptions\InvalidArgumentException('&#1085;&#1077; &#1091;&#1082;&#1072;&#1079;&#1072;&#1085; &#1082;&#1083;&#1102;&#1095;&#1100; &#1076;&#1083;&#1103; &#1091;&#1076;&#1072;&#1083;&#1077;&#1085;&#1080;&#1077; &#1082;&#1077;&#1096;');
        return unlink($this->cache_directory . '/' . $key . '_' . md5($key));
    }
}