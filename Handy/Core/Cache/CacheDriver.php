<?php

/**
* Класс - обвертка для предоставления механизма кеширования
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Cache
*/

namespace Handy\Core\Cache;
class CacheDriver {

    /**
    * @var $cache - указатель драйвера , который выполняет функции кеширования
    * @access private
    */

    private $cache;

    /**
    * Конструктор класса определяет текущий драйвер механизма кеширования
    * @access public
    * @return void
    */

    public function __construct(CacheStrategy $strategy) {
        $this->cache = $strategy;
    }

    /**
    * Обвертка метода для сохранение в кеш
    * @access public
    * @param $key - ключ, под каким хранить данные
    * @param $val - данные , которые нужно сохранить в кеш
    * @param $time - время хранение данных в кеш, в секундах
    * @return boolean
    */

    public function save($key, $val, $time) {
        return $this->cache->save($key, $val, $time);
    }

    /**
    * Обвертка метода для получение данных с кеш
    * @access public
    * @param $key - ключ, для получение данных
    * @throws Handy\Core\Exceptions\InvalidArgumentException
    * @throws Handy\Core\Exceptions\LogicException
    * @return mixed 
    */

    public function get($key) {
        return $this->cache->get($key);
    }

    /**
    * Обвертка метода для удаления данных с кеш
    * @access public
    * @param $key - ключ для удаленния данных
    * @return boolean
    */

    public function remove($key) {
        return $this->cache->remove($key);
    }
}