<?php
namespace Handy\Modules\Model;

class MainModel  {

	public function getDate() {
		return date('F j, Y, g:i a',time());
	}
}