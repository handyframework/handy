<?php
/**
* Класс конфигурации
* Позволяет удобно управлять настройками системы на протяжение выполнения всей программы
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Config
*/

namespace Handy\Core\Config;

use \Handy\Core\Config\ConfigInterface;

class ConfigHelper implements ConfigInterface {

    /**
    * @var $data - статическое хранилище данных
    * @access private
    * @static
    */

    private static $data = array();

    /**
    * Установка значений конфигурации
    * @access public
    * @param $key string | int - ключ для хранения данных
    * @param $val mixed - значение для хранения данных
    * @static
    * @return void
    */

    public static function save($key, $val) {
        self::$data[$key] = $val;
    }

    /**
    * Получение значения конфигурации
    * @access public
    * @param $key int|string - ключ для полученния данных
    * @static
    * @return mixed
    */

    public static function get($key) {
        return (array_key_exists($key, self::$data) == true) ? self::$data[$key] : false;
    }

    /** 
    * Удаление данных конфигурации
    * @access public
    * @param $key - ключ для удаленния данных
    * @static
    * @return void
    */

    public static function remove($key) {
        unset(self::$data[$key]);
    }
}