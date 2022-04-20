<?php declare(strict_types=1);

class Router {
    private $controller = "Messenger";
    private $action = "index";
    private $query_parameters = null;

    private function parse_parameters() {
        if (!$this->query_parameters) {
            return array();
        }
        $request_parameters = explode(':', $this->query_parameters, 2);

        $parameters = [];
        foreach ($request_parameters as $parameter) {
            $parameter = explode('=', $parameter, 2);
            if ($parameter < 2) {
                # param error
                continue;
            }
            $parameters[$parameter[0]] = $parameter[1];
        }
        return $parameters;
    }

    private function find_route() {
        $request = null;
        if (isset($_GET['url'])) {
            $request = $_GET['url'];
        }

        if (isset($request)) {
            $params = array();
            $params = explode("/", $request, 3);

            $this->controller = ucwords($params[0]);

            if (isset($params[1]) && !empty($params[1])) {
                $this->action = $params[1];
            }

            if (isset($params[2]) && !empty($params[2])) {
                $this->query_parameters = $params[2];
            }
        }
    }

    public function setController($controller) {
        $this->controller = $controller;
    }
    public function setAction($action) {
        $this->action = $action;
    }
    public function setQuery_parameters($query_parameters) {
        $this->query_parameters = $query_parameters;
    }

    public function load() {
        $this->find_route();

        $prefix = 'controllers\\';
        $suffix = 'Controller';
        $controller = $prefix . $this->controller . $suffix;
        $load = new $controller();
        # TODO implement a real 404 return
        $answer = "404";

        if (method_exists($load, $this->action)) {
            $action = $this->action;
            $answer = $load->$action($this->parse_parameters());
        }

        return $answer;
    }
}
