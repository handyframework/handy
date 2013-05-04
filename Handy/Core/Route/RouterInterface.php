<?php
/**
* Интерфейс роутера.
* Описывает методы класса Handy\Core\Route\Router
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Route
*/

namespace Handy\Core\Route;

interface RouterInterface {
    /**
    * Условия роутинга.
    * Добавление условия роутинга .
    * @access public
    * @param $path string - строка поиска , данные , заключенные в {} - считаються динамическими и передаются в метод
    * @param $callback array - ассоциативный массив с ключами OID - обьект контроллера , METHOD - метод.
    * @throws Handy\Core\Exceptions\InvalidArgumentException 
    * @throws Handy\Core\Exceptions\BadMethodCallException
    * @return mixed
    */
    public function route($path, $callback);
}