<?php
/**
* Интерфейс драйверов Cache
* Определяет функционал Cache
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Cache
*/

 namespace Handy\Core\Cache;

 interface CacheStrategy {

 	/**
    * Получение данных с кеш
    * @access public
    * @param $key - ключ, для получение данных
    * @throws Handy\Core\Exceptions\InvalidArgumentException
    * @throws Handy\Core\Exceptions\LogicException
    * @return mixed 
    */

 	public function get($key);
    
    /**
    * Запись данных в кеш
    * @access public
    * @param $key - ключ, под каким хранить данные
    * @param $val - данные , которые нужно сохранить в кеш
    * @param $time - время хранение данных в кеш, в секундах
    * @return boolean
    */

 	public function save($key, $val, $time);

 	/**
    * Удаление данных с кещ
    * @access public
    * @param $key - ключ для удаленния данных
    * @return boolean
    */

 	public function remove($key);
 }