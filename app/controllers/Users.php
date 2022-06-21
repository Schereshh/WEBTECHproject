<?php 

    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function login() {
            $data = [
                'title' => 'Login Page',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => '',
            ];

            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'usernameError' => '',
                    'passwordError' => '',
                ];

                //Validate username
                if(empty($data['username'])) {
                    $data['usernameError'] = 'Please enter a username!';
                }

                //Validate password
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Please enter the password!';
                }

                //Check if all errors are empty
                if(empty($data['usernameError']) && empty($data['passwordError'])) {
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                    if($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                        header('Location: ' . URLROOT . '/posts/index');
                    } else {
                        $data['passwordError'] = 'Password or username is incorrect. Please try again!';

                        $this->view('users/login', $data);
                    }
                }
            } else {
                $data = [
                    'username' => '',
                    'password' => '',
                    'usernameError' => '',
                    'passwordError' => '',
                ];
            }


            $this->view('users/login', $data);
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['email'] = $user->email;
        }

        public function register() {
            $data = [
                'title' => "Register",
                'username' => '',
                'email' => '',
                'password' => '',
                'confirmPassword' => '',
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' =>trim($_POST['confirmPassword']),
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => '',
                ];

                $nameValidation = '/^[a-zA-Z0-9]*$/';
                $passwordValidation = '/^(.{0,7}|[^a-z]*|[^\d]*)$/i';
                //Validate username on letters/numbers
                if(empty($data['username'])){
                    $data['usernameError'] = 'Please enter username!';
                } elseif (!preg_match($nameValidation, $data['username'])) {
                    $data['usernameError'] = 'Name can only contain letters and numbers!';
                } else {
                    if($this->userModel->findUserByName($data['username'])) {
                        $data['usernameError'] = 'Username is already taken!';
                    }
                }

                //Validate email
                if(empty($data['email'])) {
                    $data['emailError'] = 'Please enter an email!';
                } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter a valid email!';
                } else {
                    //Check if email exists
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'Email is already taken!';
                    }
                }

                //Validate password on length and numeric values
                if(empty($data['password'])) {
                    $data['passwordError'] = 'Please enter password';
                } elseif(strlen($data['password']) < 8){
                    $data['passwordError'] = 'Password must be at least 8 characters';
                } elseif(preg_match($passwordValidation, $data['password'])) {
                    $data['passwordError'] = 'Password must have at least one numberic value!';
                }

                //Validate confirm password
                if(empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Please enter password.';
                } else {
                    if($data['password'] != $data['confirmPassword']) {
                        $data['confirmPasswordError'] = 'Passwords do not match, please try again';
                    }
                }

                //Checking if errors are empty
                if(empty($data['usernameError']) && empty($data['emailError']) && empty($data['confirmPasswordError'])) {

                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register user from model function
                    if($this->userModel->register($data)) {
                        //Redirect to the login page
                        header('location: ' . URLROOT . '/users/login');
                    } else {
                        die('Something went wrong.');
                    }
                }
            }

            $this->view('users/register', $data);
        }

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            header('location:'. URLROOT . '/users/login');
        }
    }
?>