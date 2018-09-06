<?php

namespace Application\Controller;

class Test extends \System\Controller {

    function index()
    {
        $template = $this->loadView('main_view');
        $template->render();
    }
}

