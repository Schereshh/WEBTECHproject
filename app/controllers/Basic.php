<?php 

    class Basic extends Controller {
        public function __construct(){
            
        }
        
        public function index(){
            $data = [
                'title' => "Home page",
                'name'  => 'Seres',
            ];
            $this->view('pages/index', $data);
        }

        public function about(){
            $this->view('pages/about');
        }
    }