<?php

Class AppController {

    protected function renderView(string $view = null) {
        $path = "data/views/".$view.".html";

        if(file_exists($path)) {
            ob_start();
            include $path;
            $result = ob_get_clean();
            
            print $result;
        } else {
            die("śmierc");
        }
    }
}