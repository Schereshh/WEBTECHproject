<?php 

    class Basic extends Controller {
        public function __construct(){
            $this->userModel = $this->model('User');
        }
        
        public function index(){
            $countries = $this->userModel->getUsers();

            $data = [
                'title' => "Home page",
                'users' => $countries,
            ];
            $this->view('pages/index', $data);
        }

        public function about(){
            $this->view('pages/about');
        }
    }