<?php
namespace Handy\Modules\Controller;

class Index extends \Handy\Patterns\Singleton\Singleton {

	private $template;
	private $model; 
    public function __construct() {

    	$this->template =  \Handy\Core\ObjectStorage\Storage::getObject('twig');
    	$this->model = new \Handy\Modules\Model\MainModel; 
    }
	public function actionIndex() {
		$templater = $this->template->loadTemplate('index.html');
		$render_data = $this->model->getDate();
		return $templater->display(array('now' => $render_data));
	}
}