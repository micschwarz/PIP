<?php

namespace System;

class View
{
    private $pageVars = [];
    private $template;

    public function __construct($template)
    {
        $this->template = APP_DIR . 'Views/' . $template . '.php';
    }

    public function set($var, $val)
    {
        $this->pageVars[$var] = $val;
    }

    public function render()
    {
        extract($this->pageVars, null);

        ob_start();
        require $this->template;
        echo ob_get_clean();
    }

}
