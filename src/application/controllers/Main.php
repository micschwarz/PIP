<?php

class Main extends Controller {

	public function index()
	{
		$template = $this->loadView('main_view');
		$template->render();
	}

}
