<?php 

    class Posts extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        public function index() {
            $posts = $this->postModel->findAllPosts();

            $data = [
                'posts' => $posts
            ];

            foreach($data['posts'] as $post){

                $username = $this->postModel->getUsernameById($post->user_id);
                $post->body = $username->username;

            }

            $this->view('posts/index', $data);
        }

        public function create() {
            if(!isLoggedIn()) {
                header('Location: ' . URLROOT . '/posts/index');
            }
            $data = [
                'title' => '',
                'body' => '',
                'titleError' => '',
                'bodyError' => '', 
                'fileError' => '',
                'fileName' => '',
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') { 
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'titleError' => '',
                    'bodyError' => '',
                    'fileError' => '',
                    'fileName' => '',
                ];

                //File processing
                if($_FILES['file']['name'] != "") {
                    // Checking for allowed file type
                    $file_type = $_FILES['file']['type'];
                    $allowed = [
                        'image/jpeg', 'image/gif', 'image/png', 'image/jpg',
                    ];
                    if(!in_array($file_type, $allowed)){
                        $data['fileError'] = 'Filetype not supported';
                    } else {
                        // Checking if file exceeds MAX_FILE_SIZE
                        $file_size = $_FILES['file']['size'];
                        if($file_size >= MAX_FILE_SIZE) {
                            $data['fileError'] = 'File is too big (max 10MB)';
                        } else {
                            // Giving file a unique id
                            $file_ext = explode('.', $_FILES['file']['name']);
                            $file_ext = strtolower(end($file_ext));
                            $file_id = uniqid('', true) . '.' . $file_ext;
                            $data['fileName'] = $file_id;
                            $file_destination = FILE_DESTINATION . '/' . $file_id;
                            if(!move_uploaded_file($_FILES['file']['tmp_name'], $file_destination)){
                                die("Something went wrong!"); 
                            }
                        }
                    }
                } else {
                    $data['fileError'] = 'Upload an image!';
                }

                if(empty($data['title'])) {
                    $data['titleError'] = 'The title of a post cannot be empty';
                }

                if(empty($data['body'])) {
                    $data['bodyError'] = 'The body of a post cannot be empty';
                }

                

                if(empty($data['titleError']) && empty($data['bodyError']) && empty($data['fileError'])) {
                    if($this->postModel->addPost($data)) {
                        header('Location: ' . URLROOT . '/posts/index');
                    } else {
                        die('Something went wrong, please try again!');
                    }
                } else {
                    $this->view('posts/create', $data);
                }
            }

            $this->view('posts/create', $data);
        }

        public function update($id) {
            $post = $this->postModel->findPostById($id);

            if(!isLoggedIn()) {
                header('Location: ' . URLROOT . '/posts/index');
            } elseif($post->user_id != $_SESSION['user_id']) {
                header('Location: ' . URLROOT . '/posts/index');
            }

            $data = [
                'id' => $id,
                'post' => $post,
                'title' => '',
                'body' => '',
                'titleError' => '',
                'bodyError' => '',
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $data = [   
                    'post' => $post,
                    'id' => $id,
                    'user_id' => $_SESSION['user_id'],
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'titleError' => '',
                    'bodyError' => '',
                ];

                if(empty($data['title'])){
                    $data['titleError'] = 'The title of a post cannot be empty';
                }

                if(empty($data['body'])){
                    $data['bodyError'] = 'The body of a post cannot be empty';
                }

                if($data['title'] == $this->postModel->findPostById($id)->title) {
                    $data['titleError'] = 'At least change the title!';
                }

                if($data['body'] == $this->postModel->findPostById($id)->body) {
                    $data['bodyError'] = 'At least change the body!';
                }

                if(empty($data['titleError']) && empty($data['bodyError'])) {
                    if($this->postModel->updatePost($data)) {
                        header('Location: ' . URLROOT . '/posts/index');
                    } else {
                        die('Something went wrong, please try again!');
                    }
                } else {
                    $this->view('posts/update', $data);
                }
            }

            $this->view('posts/update', $data);
        }

        public function delete($id) {
            $post = $this->postModel->findPostById($id);

            if(!isLoggedIn()) {
                header('Location: ' . URLROOT . '/posts/index');
            } elseif($post->user_id != $_SESSION['user_id']) {
                header('Location: ' . URLROOT . '/posts/index');
            }

            $data = [
                'post' => $post,
                'title' => '',
                'body' => '',
                'titleError' => '',
                'bodyError' => '',
            ];

            if ($this->postModel->deletePost($id)) {
                header('Location: ' . URLROOT . '/posts/index');
            } else {
                die('Something went wrong!');
            }
        }
    }