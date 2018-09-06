<?php

class App
{
    private $config;

    public function __construct()
    {
        global $config;
        $this->config = $config;

        // Get request url and script url
        $request_url = $_SERVER['REQUEST_URI'] ?? '';
        $script_url = $_SERVER['PHP_SELF'] ?? '';

        $url = $this->getUrl($request_url, $script_url);

        $action = $this->getActionName($url);
        $controllerInstance = $this->loadController($this->getControllerName($url));

        // Check the action exists
        if (!method_exists($controllerInstance, $action)) {
            $controller = $config['error_controller'];
            require_once APP_DIR . 'controllers/' . $controller . '.php';
            $action = 'index';
        }

        // Call method with params
        die(call_user_func_array([$controllerInstance, $action], $this->getParams($url)));
    }

    /**
     * Remove Current Path from request
     *
     * @param String $request_url
     * @param String $script_url
     * @return String
     */
    private function getUrl(String $request_url, String $script_url): String
    {
        if ($request_url !== $script_url) {
            $current_index_path = str_replace('index.php', '', $script_url);

            // Regexify current path
            $pattern = '/' . str_replace('/', '\/', $current_index_path) . '/';

            // Remove current index path from request
            $url = preg_replace($pattern,
                '',
                $request_url,
                1
            );

            // Remove trailing slash
            return trim($url, '/');
        }
        return '';
    }

    /**
     * @param String $url
     * @return String
     */
    private function getControllerName(String $url): String
    {
        $segments = $this->splitUrl($url);
        if (isset($segments[0]) && $segments[0] !== '') {
            return $segments[0];
        }
        return $this->config['default_controller'];
    }

    /**
     * @param String $url
     * @return String
     */
    private function getActionName(String $url): String
    {
        $segments = $this->splitUrl($url);
        if (isset($segments[1]) && $segments[1] !== '') {
            return $segments[1];
        }
        return $this->config['default_action'];
    }

    private function loadController(String $controller) {
        $controller_path = APP_DIR . 'controllers/' . $controller . '.php';
        if (file_exists($controller_path)) {
            require_once $controller_path;
        } else {
            $controller = $this->config['error_controller'];
            require_once APP_DIR . 'controllers/' . $controller . '.php';
        }

        return new $controller;
    }

    private function getParams(String $url): array
    {
        return array_slice($this->splitUrl($url), 2);
    }

    private function splitUrl(String $url): array {
        return explode('/', $url);
    }
}
