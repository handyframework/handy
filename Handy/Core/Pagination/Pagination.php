<?php
/** 
 * Класс пространичной навигации
 * @copyright Pahomov.V & Pahomov.S
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 * @package Handy\Core\Pagination;
 */
namespace Handy\Core\Pagination;

use Handy\Core\Pagination\PaginationInterface;

class Pagination implements PaginationInterface {

    /**
    * @var $DIV_STYLE_PAGINATION - хранит див навигации
    * @access private
    */

    private $DIV_STYLE_PAGINATION = '<div class="pager">';

    /**
    * @var $DIV_STYLE_LINK_PAGINATION - хранит класс ссылки постраничной навигации
    * @access private
    */

    private $DIV_STYLE_LINK_PAGINATION = 'link';

    /**
    * @var $count - колличество записей в таблице
    * @access private
    */

    private $count = 0;

    /**
    * @var $onepage - колличество выводимых записей на 1 страницу
    * @access private
    */

    private $onepage = 1;

    /**
    * @var $segment_worker - та переменная , которая хранит текущую страницу
    * @access private
    */

    private $segment_worker = null;

    /**
    * @var $allpage - колличество страниц всего
    * @access private
    */
    private $allpage;
    
    /**
    * @var $limit - текущий лимит
    * @access private
    */

    private $limit;

    /** 
    * Конструктор определяет опции при инициализации 
    * @access public
    * @param $option - массив с данными count - сколько всего записей, onepage - сколько на 1 страницу,$segment_worker - текущий идентификатор страницы
    * @return void
    */

    public function __construct($option = array()) {
        $this->count = $option['count'];
        $this->onepage = $option['onepage'];
        $this->segment_worker = $option['segment_worker'];
        $this->DIV_STYLE_PAGINATION = isset($option['div_style']) ? $option['div_style'] : $this->DIV_STYLE_PAGINATION;
        $this->DIV_STYLE_LINK_PAGINATION = isset($option['class_link']) ? $option['class_link'] : $this->DIV_STYLE_LINK_PAGINATION;
        $this->allpage = ceil($option['count'] / $option['onepage']);
        $segment = isset($this->segment_worker) ? $this->segment_worker : 1;
        if ($segment < 1 || $segment > $this->allpage) $segment = 1;
        $this->limit = $segment * $this->onepage - $this->onepage;
    }

    /**
    * Билдер постраничной навигации, реализация позаимствованая отсюда http://thiswap.com/2010/12/13/funkciya-postranichnoj-navigacii-phpmysql/
    * @access public
    * @param $allpages integer - сколько всего страниц
    * @param $query string - url ссылок , test/{p}/ {p} - идентификатор страницы
    * @param $flp boolean - показывать первую и последнию страницу
    * @param $expanded boolean - рассширеная навигация или нет
    * @return string - возврашает навигационное меню
    */

    public function navigation($allpage, $query, $flp, $expanded) {
        $this_page = $this->segment_worker;
        if ($this_page < 1 || $this_page > $allpage) $this_page = 1;
        $prev_page = $this_page - 1;
        $pprev_page = $this_page - 2;
        $next_page = $this_page + 1;
        $nnext_page = $this_page + 2;
        $var = $this->DIV_STYLE_PAGINATION;
        if ($this_page > 2 && $flp == 1) $var.= "<a href='" . str_replace('{p}', 1, $query) . "'>1</a> ... ";
        if ($pprev_page > 1 && $expanded == 1) $var.= "<a href='" . str_replace('{p}', $pprev_page, $query) . "'>$pprev_page</a> ";
        $var.= ($prev_page < 1) ? "" : "<a href='" . str_replace('{p}', $prev_page, $query) . "'>$prev_page</a> ";
        $var.= "<strong>$this_page</strong>";
        $var.= ($next_page > $allpage) ? "" : " <a href='" . str_replace('{p}', $next_page, $query) . "'>$next_page</a>";
        if ($nnext_page < $allpage && $expanded == 1) $var.= " <a href='" . str_replace('{p}', $nnext_page, $query) . "'>$nnext_page</a>";
        if ($this_page < $allpage - 1 && $flp == 1) $var.= " ... <a href='" . str_replace('{p}', $allpage, $query) . "'>$allpage</a>";
        $var.= "</div> ";
        return $var;
    }

    /**
    * Возвращает лимиты на выборку данных
    * @access public
    * @return array - возвращает массив с ключами start , end
    */

    public function getLimit() {
        return array('start' => (integer)$this->limit, 'end' => (integer)$this->onepage);
    }

    /**
    * Метод вовращает навбар
    * @access public
    * @param $query_builder - url ссылок , test/{p}/ {p} - иддентификатор страниц
    * @param $mode_one boolean - показывать первую и последнию страницу или нет
    * @param $mode_two boolean - показывать расширеную навигацию или нет 
    * @return string - возвращает навбар
    */

    public function getLinks($query_builder, $mode_one, $mode_two) {
        $response = $this->navigation($this->allpage, $query_builder, $mode_one, $mode_two);
        $response = str_replace("<a href='", "<a class='" . $this->DIV_STYLE_LINK_PAGINATION . "' href='", $response);
        return $response;
    }
}