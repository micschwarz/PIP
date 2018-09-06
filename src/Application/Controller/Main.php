<?php

namespace Application\Controller;

class Main extends \System\Controller {

	public function index()
	{
		$template = $this->loadView('main_view');
		$template->render();
	}

}
