<?php
/**
* Интерфейс ConfigHelper
* Описывает методы класса Handy\Core\Config\ConfigHelper
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Config;
*/

namespace Handy\Core\Config;

interface ConfigInterface {
  
    /**
    * Установка значений конфигурации
    * @access public
    * @param $key string | int - ключ для хранения данных
    * @param $val mixed - значение для хранения данных
    * @static
    * @return void
    */

    public static function save($key, $val);

    /**
    * Получение значения конфигурации
    * @access public
    * @param $key int|string - ключ для полученния данных
    * @static
    * @return mixed
    */

    public static function get($key);

    /** 
    * Удаление данных конфигурации
    * @access public
    * @param $key - ключ для удаленния данных
    * @static
    * @return void
    */

    public static function remove($key);



}