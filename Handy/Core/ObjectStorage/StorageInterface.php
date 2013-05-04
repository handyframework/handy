<?php 

/**
* Интерфейс Handy\Core\ObjectStorage\Storage
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\ObjectStorage
*/ 

namespace Handy\Core\ObjectStorage;

interface StorageInterface {

    /**
    * Добавление объекта в систему.
    * Позволяет получить екземпляр объекта в любой точке приложения
    * @access public
    * @param $key string|int - ключ , под каким будет добавлен объект
    * @param $val object - сохраняемый объект
    * @static
    * @return void
    */
    public static function saveObject($key, $val);

    /**
    * Получение объекта
    * Позволяет получить объект в любой точке приложения
    * @access public
    * @param $key - string | int - ключ , под каким обьект был добавлен
    * @static
    * @return object|boolean
    */
    public static function getObject($key);

    /** 
    * Удаление объекта из системы 
    * Позволяет удалить объект из системы в любой точке приложения.
    * @access public
    * @param $key string|int - ключ , под каким объект был добавлен
    * @static
    * @return void
    */
    public static function removeObject($key);
}