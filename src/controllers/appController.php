<?php

Class AppController {

    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD']; 
    }

    protected function isPost(): bool {
        return $this->request === 'POST';
    }

    protected function isGet(): bool {
        return $this->request === 'GET';
    }

    protected function renderView(string $view = null, array $variables = []) {
        $path = "data/views/".$view.".php";

        if(file_exists($path)) {
            extract($variables);
            ob_start();
            include $path;
            $result = ob_get_clean();
            
            print $result;
        } else {
            die("śmierc");
        }
    }
}