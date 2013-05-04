<?php
/**
* Класс для необратимого хеширования
* Позволяет получить хеш строки.
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Crypt
*/
namespace Handy\Core\Crypt;

use \Handy\Core\Crypt\CryptInterface;

class Crypt implements CryptInterface extends \Handy\Patterns\Singleton\Singleton{

	/**
	* Метод позволяет получить хеш строки
	* @access public
	* @param @string mixed - строка , с которой нужно получить хеш
	* @return string
	*/

    public function hash($string) {
        $solt = \Handy\Core\Config\ConfigHelper::get('OTHER_SOLT');
        return md5(crypt(crypt($string,$solt),$solt));
    }
}