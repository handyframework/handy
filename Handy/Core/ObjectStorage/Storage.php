<?php

/**
* Хранилище обьектов .
* Класс позволяет совершать операции с объектами на протяжении работы всей системы.
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\ObjectStorage
*/

namespace Handy\Core\ObjectStorage;

use Handy\Core\ObjectStorage\StorageInterface;

class Storage implements StorageInterface {
    /**
    * @var $storage - статическое хранилище данных
    * @access private
    * @static
    */

    private static $storage = array();

    /**
    * Добавление объекта в систему.
    * Позволяет получить екземпляр объекта в любой точке приложения
    * @access public
    * @param $key string|int - ключ , под каким будет добавлен объект
    * @param $val object - сохраняемый объект
    * @static
    * @return void
    */

    public static function saveObject($key, $val) {
        self::$storage[$key] = (object)$val;
    }
    
    /**
    * Получение объекта
    * Позволяет получить объект в любой точке приложения
    * @access public
    * @param $key - string | int - ключ , под каким обьект был добавлен
    * @static
    * @return object|boolean
    */

    public static function getObject($key) {
        return (array_key_exists($key, self::$storage) == true) ? self::$storage[$key] : false;
    }

    /** 
    * Удаление объекта из системы 
    * Позволяет удалить объект из системы в любой точке приложения.
    * @access public
    * @param $key string|int - ключ , под каким объект был добавлен
    * @static
    * @return void
    */

    public static function removeObject($key) {
        unset(self::$storage[$key]);
    }
}