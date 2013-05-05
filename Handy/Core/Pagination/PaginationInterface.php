<?php
/** 
 * Интерфейс определяет методы класса Handy\Core\Pagination\Pagination
 * @copyright Pahomov.V & Pahomov.S
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 * @package Handy\Core\Pagination;
 */
namespace Handy\Core\Pagination;

interface PaginationInterface {

    /**
    * Билдер постраничной навигации, реализация позаимствованая отсюда http://thiswap.com/2010/12/13/funkciya-postranichnoj-navigacii-phpmysql/
    * @access public
    * @param $allpages integer - сколько всего страниц
    * @param $query string - url ссылок , test/{p}/ {p} - идентификатор страницы
    * @param $flp boolean - показывать первую и последнию страницу
    * @param $expanded boolean - рассширеная навигация или нет
    * @return string - возврашает навигационное меню
    */

    public function navigation($allpage, $query, $flp, $expanded);

    /**
    * Возвращает лимиты на выборку данных
    * @access public
    * @return array - возвращает массив с ключами start , end
    */

     public function getLimit();

    /**
    * Метод вовращает навбар
    * @access public
    * @param $query_builder - url ссылок , test/{p}/ {p} - иддентификатор страниц
    * @param $mode_one boolean - показывать первую и последнию страницу или нет
    * @param $mode_two boolean - показывать расширеную навигацию или нет 
    * @return string - возвращает навбар
    */

    public function getLinks($query_builder, $mode_one, $mode_two);

}
