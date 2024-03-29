<?php 

    // Core App Class
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->getUrl();

            // Check if that controller exists, which was given in the url
            if (isset($url)) {
                if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                    $this->currentController = ucwords($url[0]);    // Sets a new controller;
                    unset($url[0]);
                }

                // Require the controller
                require_once '../app/controllers/' . $this->currentController . '.php';
                $this->currentController = new $this->currentController;

                // Check for the second part of the URL
                if (isset($url[1])) {
                    if (method_exists($this->currentController, $url[1])) {
                        $this->currentMethod = $url[1];
                        unset($url[1]);
                    }
                }
                // Get parameters
                $this->params = $url ? array_values($url) : [];
            } 
            // If url is empty, load the default controller, which is 'Basic'
            else {
                require_once '../app/controllers/' . $this->currentController . '.php';
                $this->currentController = new $this->currentController;
            }

            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

        public function getUrl(){
            if(isset($_GET["url"])){
                $url = rtrim($_GET['url'], '/');
                // Allows you to filter variables as string/number
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // Breaking the url into array
                $url = explode('/', $url);
                return $url;
            }
        }
    }