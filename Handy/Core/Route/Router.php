<?php
/** 
* Роутинг.
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Route;
*/

namespace Handy\Core\Route;

use \Handy\Core\Route\RouterInterface;

class Router implements RouterInterface
{
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

    public function route($path, $callback) {
        $args = array();
        if (empty($path)) throw new \Handy\Core\Exceptions\InvalidArgumentException('&#1074;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1096;&#1072;&#1073;&#1083;&#1086;&#1085; &#1088;&#1086;&#1091;&#1090;&#1072;');
        if (!isset($callback['OID'], $callback['METHOD'])) throw new \Handy\Core\Exceptions\InvalidArgumentException('2 &#1087;&#1072;&#1088;&#1072;&#1084;&#1077;&#1090;&#1088; &#1076;&#1086;&#1083;&#1078;&#1077;&#1085; &#1087;&#1088;&#1080;&#1085;&#1080;&#1084;&#1072;&#1090;&#1100; &#1072;&#1089;&#1089;&#1086;&#1094;&#1080;&#1072;&#1090;&#1080;&#1074;&#1085;&#1099;&#1081; &#1084;&#1072;&#1089;&#1089;&#1080;&#1074; &#1089; &#1082;&#1083;&#1102;&#1095;&#1072;&#1084;&#1080; OID , METHOD');
        if (!method_exists($callback['OID'], $callback['METHOD'])) throw new \Handy\Core\Exceptions\BadMethodCallException('&#1084;&#1077;&#1090;&#1086;&#1076; ' . $callback['METHOD'] . ' &#1085;&#1077; &#1089;&#1091;&#1097;&#1077;&#1089;&#1090;&#1074;&#1091;&#1077;&#1090;');
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $path = explode('/', $path);
        $url = array_filter($url, function ($url) {
            if (!empty($url)) return $url;
        });
        $path = array_filter($path, function ($path) {
            if (!empty($path)) return $path;
        });
        if (count($path) != count($url)) return false;
        for ($i = 0;$i <= count($path);$i++) {
            if (preg_match('|^\{(.*)\}$|', $path[$i], $match)) {
                $args[$match[1]] = $url[$i];
            } else {
                if ($url[$i] != $path[$i]) {
                    return false;
                }
            }
        }
        return call_user_func_array(array($callback['OID'], $callback['METHOD']), $args);
    }
}