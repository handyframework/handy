<?php
/**
* Интерфейс Handy\Core\Crypt\Crypt
* Описывает методы класса Handy\Core\Crypt\Crypt
* @copyright Pahomov.V & Pahomov.S
* @license MIT
* @license http://opensource.org/licenses/MIT 
* @package Handy\Core\Crypt
*/
namespace Handy\Core\Crypt;

interface CryptInterface {

	/**
	* Метод позволяет получить хеш строки
	* @access public
	* @param $string mixed - строка , с которой нужно получить хеш
	* @return string
	*/

	public function hash($string);
	
}