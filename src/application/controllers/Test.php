<?php

class Test extends Controller {

    function index()
    {
        $template = $this->loadView('main_view');
        $template->render();
    }

}

